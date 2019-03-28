<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\TagsRequest;
use App\Shop\Models\Tag;
use App\Shop\Services\TagsManageService;
use Illuminate\Http\Request;

class TagsController extends BackendController
{

    /**
     * @var TagsManageService service for tags management
     */
    private $tmService;


    /**
     * Create a new controller instance.
     *
     * @param TagsManageService $tmService
     * @return void
     */
    public function __construct(TagsManageService $tmService)
    {
        $this->tmService = $tmService;
    }


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



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tags.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param TagsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        $this->tmService->create($request->all());

        return redirect()->route('admin.tags.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('backend.tags.show', ['tag' => $tag]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', ['tag' => $tag]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param TagsRequest $request
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagsRequest $request, Tag $tag)
    {
        $this->tmService->update($tag, $request->all());

        return redirect()->route('admin.tags.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index');
    }

}
