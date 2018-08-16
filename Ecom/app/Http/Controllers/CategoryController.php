<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateCategoryRequest;
use App\Category;
use App\Models\Product;
use Gate;
use Image;
use Flash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with('categories', $categories);
    }

    public function prods()
    {
        return view('notAdmin.userProducts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }

        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }

        if (auth::check()) {
        return view('categories.create');
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
        if($request->hasfile('image')){
            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $path = public_path('images/categories/'. $filename);
            Image::make($image)->save($path)->resize(200,150);
        }

        $category = Category::create([
        'name' => $request->input('name'),
        'image' => $filename

        ]);

        if($category){
          return redirect()->route('categories.show', ['category'=> $category->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Product $product)
    {

        $category = Category::find($category->id);
        // $products = Product::where($product->category_id = $category->id)->paginate(8);

        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }
        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }

        $category = Category::find($category->id);

        if (empty($category)) {
            Flash::error('Category not found');
            return view('categories.index');
        }
        return view('categories.edit', ['category' =>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if($request->hasfile('image')){
            $image = $request->file('image');
            $filename = time().".".$image->getClientOriginalExtension();
            $path = public_path('images/categories/'. $filename);
            Image::make($image)->save($path)->resize(200,150);
        }

        $categoryUpdate = Category::where('id', $category->id)->update([
            'name' => $request->input('name'),
            'image' => $filename
        ]);

        if ($categoryUpdate) {
            Flash::success('Category Updated Successifully');
            return redirect()->route('categories.show', ['category' =>$category->id]);
        }
        return back()->withImput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Unauthorized Access');
        }
        if (!Gate::allows('isAdmin')) {
            abort(404,'Cannot perform this Action');
        }
        if($category->delete()){
            return redirect()->route('categories.index');
            Flash::success('Category deleted Successifully');
        }
    else{
            Flash::error('Category Could not be deleted');
            return back()->withImput();
            
        }
    }
}