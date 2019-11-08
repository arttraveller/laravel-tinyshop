<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\ProductRequest;
use App\Helpers\Categories;
use App\Models\Brand;
use App\Models\Product;
use App\Services\ProductsManageService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProductsController extends BackendController
{

    /**
     * @var ProductsManageService service for products management
     */
    private $productsManageService;



    /**
     * Create a new controller instance.
     *
     * @param ProductsManageService $pmService
     * @return void
     */
    public function __construct(ProductsManageService $pmService)
    {
        $this->productsManageService = $pmService;
    }


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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = Categories::pluckAllCategories();
        $productBrands = Arr::pluck(Brand::all(), 'name', 'id');

        return view('backend.products.create', [
            'productCategories' => $productCategories,
            'productBrands' => $productBrands,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $this->productsManageService->create($request->all());

        return redirect()->route('admin.products.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

}
