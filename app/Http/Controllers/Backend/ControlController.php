<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class ControlController extends BackendController
{

    /**
     * Display admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('backend.control.dashboard');
    }

}
