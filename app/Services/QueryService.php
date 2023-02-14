<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class QueryService
{
    /**
     * @var Builder
     * @return Builder
     */
    public function betweenDate($model, $fallbackCurrentDate = false)
    {
        return $model->when(filled(request('from_date')), function ($query) {
            $query->whereDate("created_at", ">=", date("Y-m-d", strtotime(request('from_date'))));
        })
            ->when(filled(request('to_date')), function ($query) {
                $query->whereDate("created_at", "<=", date("Y-m-d", strtotime(request('to_date'))));
            })
            ->when(!filled(request('to_date')) && !filled(request('to_date')), function ($query) use ($fallbackCurrentDate) {
                $query->when($fallbackCurrentDate, function ($query) {
                    $query->whereDate("created_at", ">=", date("Y-m-d", strtotime(Carbon::now())));
                })
                    ->whereDate("created_at", "<=", date("Y-m-d", strtotime(Carbon::now())));
            });
    }

    public function orderBy($default = "created_at:desc")
    {
        $orderBy = mb_split(':', request('sort_by') ?? $default);
        return "$orderBy[0] $orderBy[1]";
    }

    public function customBetweenDate($model, $field, $fallbackCurrentDate = false)
    {
        return $model->when(filled(request('from_date')), function ($query) use ($field) {
            $query->whereDate($field, ">=", date("Y-m-d", strtotime(request('from_date'))));
        })
            ->when(filled(request('to_date')), function ($query)  use ($field) {
                $query->whereDate($field, "<=", date("Y-m-d", strtotime(request('to_date'))));
            })
            ->when(!filled(request('to_date')) && !filled(request('to_date')), function ($query) use ($fallbackCurrentDate, $field) {
                $query->when($fallbackCurrentDate, function ($query) use ($field) {
                    $query->whereDate($field, ">=", date("Y-m-d", strtotime(Carbon::now())));
                })
                    ->whereDate($field, "<=", date("Y-m-d", strtotime(Carbon::now())));
            });
    }

    public function collectionGet($model, $status,  $default = "id:desc")
    {
        return $model
            ->whereStatus($status)
            ->orderByRaw($this->orderBy($default));
    }

    public function collectionFirst($model, $status, $field)
    {
        return $model->whereStatus($status)
                ->when(filled($field), function ($query) use ($field) {
                    $field = mb_split(':', $field);
                    $query->where($field[0], $field[1]);
                })
                ->first();
    }
}