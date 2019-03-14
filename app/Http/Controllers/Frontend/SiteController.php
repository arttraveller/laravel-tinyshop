<?php

namespace App\Http\Controllers\Frontend;

class SiteController extends FrontendController
{

    /**
     * Show the main page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.site.index');
    }



    /**
     * Home page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        // TODO temporary dummy
        return redirect()->route('main_page');
    }

}
