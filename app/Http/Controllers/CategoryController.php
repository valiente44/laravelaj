<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Events;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // $zones = Zone::all();
        return view('category.index',['categories' =>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $request->validate([
            'title' => 'required',
          
        ]);

        Category::create([
            'title' => $request->input('title'),
            
        ]);

        $categories = Category::all();

        return view('category.index',['categories'=>$categories]);

        // $category = Category::create($request->only('title'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        foreach($category->events as $event){
            $event->delete();
        }

        $category->delete();
        Session::flash('mensaje', 'categoria eliminada satisfactoriamente');
        // return redirect()->route('category.index');
        // $categories = Category::all();
        return redirect()->route('category.create');
     
        // return view('category.index',['categories' =>$categories]);
      
    }
}
