<?php
declare(strict_type=1);

namespace App\Queries;

use  App\Models\Order;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderQueryBuilder implements  QueryBuilder
{
    public function getBuilder():Builder
    {
        return Order::query();
    }

    public function getOrders():LengthAwarePaginator
    {
        return Order::select(
            'id',
            'user_name',
            'user_phone',
            'user_email',
            'order_info'
            )
            ->paginate(10);
    }


    public function getOrderById(int $id)
    {
        return Order::select(
             'id',
            'user_name',
            'user_phone',
            'user_email',
            'order_info')
            ->findOrFail($id);
    }
}
