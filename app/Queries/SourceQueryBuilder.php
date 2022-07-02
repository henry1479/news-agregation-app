<?php
declare(strict_type=1);

namespace App\Queries;

use  App\Models\Source;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
}