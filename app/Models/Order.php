<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    protected $fillable = [
        'user_name', 'user_phone', 'user_email', 'order_info'
    ];
}
