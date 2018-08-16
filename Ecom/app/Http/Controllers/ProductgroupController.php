<?php

namespace App\Http\Controllers;

use App\Productgroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use Gate;
use Flash;

class ProductgroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productgroups = Productgroup::all();
        return view('productgroups.index')->with('productgroups', $productgroups);
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
                    $kkats =array();
                    foreach ($categories as $category) {
                        $kkats[$category->id] = $category->name;
                    }
                return view('productgroups.create')->with('categories', $kkats);
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
        $productgroup = Productgroup::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name')
        ]);

        if($productgroup){
          return redirect()->route('productgroups.show', ['productgroup'=> $productgroup->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\subCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function show(Productgroup $productgroup)
    {

        // $subCategory = SubCategory::find($subCategory->id);

        $productgroup = Productgroup::where('id', $productgroup->id)->first();
        if (auth::check()) {
            
            if (auth::user()->role_id == 'WksbTsjfbkYYSjsn') {
            return view('productgroups.show', ['productgroup'=> $productgroup]);
            }
            else

            return view('notAdmin.userProducts', ['productgroup'=> $productgroup]);
            }
            else

        return view('notAdmin.userProducts', ['productgroup'=> $productgroup]);

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
        
        $productgroup = Productgroup::find($productgroup->id);
        $categories = Category::all();
        $kkats =array();
            foreach ($categories as $category) {
                $kkats[$category->id] = $category->name;
            }

        if (empty($productgroup)) {
            Flash::error('productgroup not found');
            return view('productgroups.index');
        }
        return view('productgroups.edit')->with('productgroup', $productgroup)->with('categories', $kkats);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subCategories  $subCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productgroup $productgroup)
    {
         $productgroupUpdate = Productgroup::where('id', $productgroup->id)->update([   'category_id' => $request->input('category_id'),
                'name' => $request->input('name')
        ]);

        if ($productgroupUpdate) {
            Flash::success('Product group Updated Successifully');
            return redirect()->route('productgroups.show', ['productgroup' =>$productgroup->id]);
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
    public function destroy(Productgroup $productgroup)
    {
        if (!Gate::allows('isAdmin')) {
            abort(404,'Cannot perform this Action');
        }
        if($productgroup->delete()){
            Flash::success('productgroup deleted Successifully');
            return redirect()->route('productgroups.index');
        }
    else{
            Flash::error('product group Could not be deleted');
            return back()->withImput();
            
        }
    }
}
