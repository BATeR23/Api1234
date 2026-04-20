<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request){
        User::create($request->validated());
        return redirect()->route('login')->with('success', 'Успешно');
    }

    public function login(LoginRequest $request){
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password, 'role' => 'user'])) {
            return redirect()->route('showCabinet');
        }
        else if (Auth::attempt(['login' => $request->login, 'password' => $request->password, 'role' => 'admin'])) {
            return redirect()->route('showAdmin');
        }
        return back()->withErrors(['login'=> 'еверный логин или пароль'])->onlyInput('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showCabinet()
    {
        $user = Auth::user()->id;
        $orders = Order::where('user_id', $user)->orderBy('id', 'desc')->get();
        return view('cabinet', compact('orders'));
    }

    public function showAdmin(Request $request)
    {
        $status = ['Новая', 'Идёт обучение', 'Закончено'];
        $orders = Order::query()
        ->filterByStatus($request->status)
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('admin', compact('orders', 'status'));
    }
}
