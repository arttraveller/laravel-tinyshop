<?php

namespace App\Http\Controllers\Backend;

use App\Shop\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends BackendController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::sortable(['id' => 'desc'])->with(['brand']);
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($products, $searchStr, ['id', 'code', 'name']);
        }

        return view('backend.products.index', ['products' => $products->paginate(10)]);
    }

}
