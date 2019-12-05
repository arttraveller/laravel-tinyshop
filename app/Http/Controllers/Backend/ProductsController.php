<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Categories;
use App\Http\Requests\Backend\ProductRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Tag;
use App\Services\Product\ProductsManageService;
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
        $allBrands = Arr::pluck(Brand::all(), 'name', 'id');
        $allCategories = Categories::pluckAllCategories();
        $allTags = Arr::pluck(Tag::all(), 'name', 'id');
        $allAttributes = Attribute::all();

        return view('backend.products.create', [
            'allBrands' => $allBrands,
            'allCategories' => $allCategories,
            'allAttributes' => $allAttributes,
            'allTags' => $allTags,
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $allBrands = Arr::pluck(Brand::all(), 'name', 'id');
        $allCategories = Categories::pluckAllCategories();
        $allTags = Arr::pluck(Tag::all(), 'name', 'id');
        $allAttributes = Attribute::all();

        $currentAttributes = [];
        foreach ($product->attributesValues->all() as $pavModel) {
            $currentAttributes[$pavModel->attribute_id] = $pavModel->value;
        }

        return view('backend.products.edit', [
            'allBrands' => $allBrands,
            'allCategories' => $allCategories,
            'allAttributes' => $allAttributes,
            'allTags' => $allTags,
            'currentAttributes' => $currentAttributes,
            'product' => $product
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param ProductRequest $request
     * @param Product $tag
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->productsManageService->update($product, $request->all());

        return redirect()->route('admin.products.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }

}
