<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CharacteristicsRequest;
use App\Models\Characteristic;
use App\Services\CharacteristicsManageService;
use Illuminate\Http\Request;

class CharacteristicsController extends BackendController
{

    /**
     * @var CharacteristicsManageService service for characteristics management
     */
    private $cmService;



    /**
     * Create a new controller instance.
     *
     * @param CharacteristicsManageService $cmService
     * @return void
     */
    public function __construct(CharacteristicsManageService $cmService)
    {
        $this->cmService = $cmService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $chars = Characteristic::sortable(['id' => 'desc']);
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($chars, $searchStr, ['id', 'name']);
        }

        return view('backend.characteristics.index', ['characteristics' => $chars->paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.characteristics.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CharacteristicsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CharacteristicsRequest $request)
    {
        $this->cmService->create($request->all());

        return redirect()->route('admin.characteristics.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Characteristic $characteristic
     * @return \Illuminate\Http\Response
     */
    public function show(Characteristic $characteristic)
    {
        return view('backend.characteristics.show', ['characteristic' => $characteristic]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Characteristic $characteristic
     * @return \Illuminate\Http\Response
     */
    public function edit(Characteristic $characteristic)
    {
        return view('backend.characteristics.edit', ['characteristic' => $characteristic]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CharacteristicsRequest $request
     * @param Characteristic $characteristic
     * @return \Illuminate\Http\Response
     */
    public function update(CharacteristicsRequest $request, Characteristic $characteristic)
    {
        $this->cmService->update($characteristic, $request->all());

        return redirect()->route('admin.characteristics.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Characteristic $characteristic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Characteristic $characteristic)
    {
        $characteristic->delete();

        return redirect()->route('admin.characteristics.index');
    }

}
