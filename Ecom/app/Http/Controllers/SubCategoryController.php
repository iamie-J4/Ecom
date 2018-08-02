<?php

namespace App\Http\Controllers;

use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Category;
use Gate;
use Flash;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('subcategories.index')->with('subcategories', $subCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }

        if (auth::check()) {
                    $categories = Category::all();
                    $subCategories = SubCategory::all();
                    $kkats =array();
                    foreach ($categories as $category) {
                        $kkats[$category->id] = $category->name;
                    }
                return view('subcategories.create')->with('categories', $kkats);
            }
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = SubCategory::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name')
        ]);

        if($subcategory){
          return redirect()->route('subcategories.show', ['subcategory'=> $subcategory->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        // $subCategory = SubCategory::find($subCategory->id);
        $subcategory = SubCategory::where('id', $subcategory->id)->first();

        return view('subcategories.show', ['subcategory'=> $subcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }
        
        $subcategory = SubCategory::find($subcategory->id);
        $categories = Category::all();
        $kkats =array();
            foreach ($categories as $category) {
                $kkats[$category->id] = $category->name;
            }

        if (empty($subcategory)) {
            Flash::error('SubCategory not found');
            return view('subcategories.index');
        }
        return view('subcategories.edit')->with('subcategory', $subcategory)->with('categories', $kkats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategoryRequest $request, SubCategory $subcategory)
    {
         $subCategoryUpdate = SubCategory::where('id', $subcategory->id)->update([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name')
        ]);

        if ($subCategoryUpdate) {
            Flash::success('SubCategory Updated Successifully');
            return redirect()->route('subcategories.show', ['subcategory' =>$subcategory->id]);
        }
        // $subcategory = SubCategory::findorFail($id);
        // $subcategory->update($request->all(), $id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\subCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Cannot perform this Action');
        }
        if($subcategory->delete()){
            Flash::success('SubCategory deleted Successifully');
            return redirect()->route('subcategories.index');
        }
    else{
            Flash::error('SubCategory Could not be deleted');
            return back()->withImput();
            
        }
    }
}
