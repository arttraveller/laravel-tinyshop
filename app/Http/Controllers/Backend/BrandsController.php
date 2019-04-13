<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BrandsRequest;
use App\Shop\Models\Brand;
use App\Shop\Services\BrandsManageService;
use Illuminate\Http\Request;

class BrandsController extends BackendController
{

    /**
     * @var BrandsManageService service for brand management
     */
    private $bmService;


    /**
     * Create a new controller instance.
     *
     * @param BrandsManageService $bmService
     * @return void
     */
    public function __construct(BrandsManageService $bmService)
    {
        $this->bmService = $bmService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $brands = Brand::sortable(['id' => 'desc'])->withCount('products');
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($brands, $searchStr, ['id', 'name', 'slug']);
        }

        return view('backend.brands.index', ['brands' => $brands->paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BrandsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {
        $this->bmService->create($request->all());

        return redirect()->route('admin.brands.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('backend.brands.show', ['brand' => $brand]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', ['brand' => $brand]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param BrandsRequest $request
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandsRequest $request, Brand $brand)
    {
        $this->bmService->update($brand, $request->all());

        return redirect()->route('admin.brands.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('admin.brands.index');
    }

}
