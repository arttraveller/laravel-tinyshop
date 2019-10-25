<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoriesRequest;
use App\Helpers\Categories;
use App\Models\Category;
use App\Services\CategoriesManageService;
use Illuminate\Http\Request;

class CategoriesController extends BackendController
{

    /**
     * @var CategoriesManageService service for categories management
     */
    private $cmService;



    /**
     * Create a new controller instance.
     *
     * @param CategoriesManageService $tmService
     * @return void
     */
    public function __construct(CategoriesManageService $cmService)
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
        $categories = Category::defaultOrder()
                                ->withDepth()
                                ->withCount('mainProducts');
        $searchStr = $request->input('search');
        if (strlen($searchStr) > 0) {
            $this->addSearchConditions($categories, $searchStr, ['id', 'name', 'slug']);
        }

        return view('backend.categories.index', ['categories' => $categories->paginate(10)]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::pluckAllCategories();

        return view('backend.categories.create', ['categories' => $categories]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $this->cmService->create($request->all());

        return redirect()->route('admin.categories.index');
    }


    /**
     * Display the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.categories.show', ['category' => $category]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Categories::pluckAllCategories();
        // Remove current category from categories
        unset($categories[$category->id]);

        return view('backend.categories.edit', ['category' => $category, 'categories' => $categories]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesRequest $request
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, Category $category)
    {
        $this->cmService->update($category, $request->all());

        return redirect()->route('admin.categories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index');
    }

}
