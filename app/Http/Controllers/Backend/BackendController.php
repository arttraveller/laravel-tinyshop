<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;

abstract class BackendController extends Controller
{

    /**
     * Adds search conditions to specified fields.
     *
     * @param Builder $builder
     * @param string $searchStr
     * @param array $fields
     * @return void
     */
    protected function addSearchConditions(Builder $builder, string $searchStr, array $fields): void
    {
        foreach ($fields as $fieldName) {
            $builder->orWhere($fieldName, 'ILIKE', $searchStr . '%');
        }
    }

}
