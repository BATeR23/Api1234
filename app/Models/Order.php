<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'date', 'payment_method', 'user_id', 'status', 'comment'])]
class Order extends Model
{
    public function scopeFilterByStatus($query, $status)
    {
        return $query->when($status, fn($q)=> $q->where('status', $status));
    }
    protected $casts =[
        'date' => 'date',
        ];
}
