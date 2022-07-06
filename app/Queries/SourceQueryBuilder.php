<?php
declare(strict_type=1);

namespace App\Queries;

use App\Models\Order;
use  App\Models\Source;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\Database\Eloquent\Builder;

class SourceQueryBuilder implements  QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Source::query();
    }

    public function getSource($category): Source
    {
        return Source::where('source_name', $category)->first();
    }


    public function getSourceUrlByOrderInfo()
    {
        $order = Order::latest('created_at')->first();
        return Source::where('source_name', $order->order_info)
            ->first()
            ->source_url;
    }
}