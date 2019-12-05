<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\AttributesRequest;
use App\Models\Attribute;
use App\Services\AttributesManageService;
use Illuminate\Http\Request;

class AttributesController extends BackendController
{

    /**
     * @var AttributesManageService service for attributes management
     */
    private $amService;



    /**
     * Create a new controller instance.
     *
     * @param AttributesManageService $amService
     * @return void
     */
    public function __construct(AttributesManageService $amService)
    {
        $this->amService = $amService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chars = Attribute::sortable(['id' => 'desc']);
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($chars, $searchStr, ['id', 'name']);
        }

        return view('backend.attributes.index', ['attributes' => $chars->paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attributes.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param AttributesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributesRequest $request)
    {
        $this->amService->create($request->all());

        return redirect()->route('admin.attributes.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(Attribute $attribute)
    {
        return view('backend.attributes.show', ['attribute' => $attribute]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('backend.attributes.edit', ['attribute' => $attribute]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param AttributesRequest $request
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(AttributesRequest $request, Attribute $attribute)
    {
        $this->amService->update($attribute, $request->all());

        return redirect()->route('admin.attributes.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Attribute $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attributes.index');
    }

}
