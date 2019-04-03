<?php

namespace App\Http\Controllers\Backend;

use App\Shop\Models\Characteristic;
use Illuminate\Http\Request;

class CharacteristicsController extends BackendController
{

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

}
