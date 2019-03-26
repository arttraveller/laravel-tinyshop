<?php

namespace App\Http\Controllers\Backend;

use App\Shop\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends BackendController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tags = Tag::sortable(['id' => 'desc']);
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($tags, $searchStr, ['id', 'name', 'slug']);
        }

        return view('backend.tags.index', ['tags' => $tags->paginate(10)]);
    }

}
