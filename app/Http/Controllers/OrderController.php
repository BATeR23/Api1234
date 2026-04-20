<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function formOrder(){

        $payment_method = ['Наличные', 'Карта'];
        $name = ['Основы алгоритмизации', 'Основы веб-дизайна'];
        return view('order.index', compact('name','payment_method'));
    }

    public function storeOrder(ForRequest $request){
        $userId = Auth::user()->id;
        $orders= Order::create($request->validated() + ['user_id'=>$userId]);
        return redirect()->route('showCabinet')->with('success', 'Заявка оформлена');
    }

    public function updateStatus(Request $request,$id)
    {
           $order = Order::findOrFail($id);
            $order->status = $request->status;
            $order->save();
            return redirect()->back()->with('success', 'Статус обновлён');
    }

    public function addComment(Request $request,$id)
    {
        $order = Order::findOrFail($id);
        $order->comment = $request->comment;
        $order->save();
        return redirect()->back()->with('success', 'Коммент добавлен');
    }
}
