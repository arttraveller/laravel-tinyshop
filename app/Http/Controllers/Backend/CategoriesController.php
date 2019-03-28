<?php

namespace App\Http\Controllers\Backend;

use App\Shop\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends BackendController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::defaultOrder()->withDepth();
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($categories, $searchStr, ['id', 'name', 'slug']);
        }

        return view('backend.categories.index', ['categories' => $categories->paginate(10)]);
    }

}
