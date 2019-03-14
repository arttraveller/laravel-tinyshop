<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

abstract class BackendController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // TODO access only for admin
        $this->middleware('auth');
    }

}
