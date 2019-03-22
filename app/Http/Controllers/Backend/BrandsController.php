<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\BrandsRequest;
use App\Shop\Models\Brand;
use App\Shop\Services\Brands\BrandsManageService;

class BrandsController extends BackendController
{

    /**
     * @var BrandsManageService service for brand management
     */
    private $bmService;


    /**
     * Create a new controller instance.
     *
     * @param  BrandsManageService  $bmService
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
    public function index()
    {
        $brands = Brand::sortable(['id' => 'desc'])->paginate(10);

        return view('backend.brands.index', compact('brands'));
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
     * @param  BrandsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {
        $this->bmService->create($request->all());

        return redirect()->route('admin.brands.index')->withSuccess(__('Brand was successfully created'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Shop\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', ['brand' => $brand]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BrandsRequest  $request
     * @param  \App\Shop\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandsRequest $request, Brand $brand)
    {
        $this->bmService->update($brand, $request->all());

        return redirect()->route('admin.brands.index')->withSuccess(__('Brand was successfully updated'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $this->bmService->delete($brand);

        return redirect()->route('admin.brands.index')->withSuccess(__('Brand was successfully deleted'));
    }

}
