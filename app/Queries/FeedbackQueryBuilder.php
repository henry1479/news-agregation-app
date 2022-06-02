<?php
declare(strict_type=1);

namespace App\Queries;

use  App\Models\Feedback;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FeedbackQueryBuilder implements  QueryBuilder
{
    public function getBuilder():Builder
    {
        return Feedback::query();
    }

    public function getFeedbacks():LengthAwarePaginator
    {
        return Feedback::select('id','user_name','feedback_body')->paginate(10);
    }


    public function getFeedbackById(int $id)
    {
        return Feedback::select('id','user_name','feedback_body')
            ->findOrFail($id);
    }
}
