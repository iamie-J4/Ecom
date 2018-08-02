<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Models\Product;
use Image;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     * @return Response
     */
    
    public function index(Request $request)
    {
       
        $this->productRepository->pushCriteria(new RequestCriteria($request));
        $products = $this->productRepository->all();

        $categories = Category::all();

        return view('products.index')
            ->with('products', $products)->withCategories($categories);
    }


    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        if (auth::check()) {
        
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $kats =array();
        foreach ($categories as $category) {
            $kats[$category->id] = $category->name;
        }
        return view('products.create')->with('categories', $kats)->with('subcategories', $subCategories);

        }
        return view('auth.login');
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {

        if (auth::check()) {

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time(). '.'.$image->getClientOriginalextension();
                $path = public_path('images/'.$filename);
                Image::make($image)->save($path);

                //'image' = $filename;
            }

            $Product = Product::create([
                'image' => $filename,
                'user_id' => auth::user()->id,
                'name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'price' => $request->input('price'),
                'qty' => $request->input('qty'),
                'o_qty' => $request->input('o_qty'),
                'category_id' => $request->input('category_id'),
                'postage' => $request->input('postage'),
                'source' => $request->input('source')

            ]);

            if($Product){
                Flash::success('Product created successfully.');
                return redirect()->route('products.show', ['product'=> $Product->id]);
            }

        return redirect(route('products.index'));

        }
        return view('auth.login');
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if ($product->user_id == auth::user()->id) {

        $categories = Category::all();
        $kats =array();
        foreach ($categories as $category) {
            $kats[$category->id] = $category->name;
        }

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product)->with('categories', $kats);
        }

        Flash::error('Unauthorized access');
        return back();
        
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        if (auth::check()) {

            $Product = Product::find($product->id);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time(). '.'.$image->getClientOriginalextension();
                $path = public_path('images/'.$filename);
                Image::update($image)->save($path);

                //'image' = $filename;
            }

            $Product->update([
                'image' => $filename,
                'user_id' => auth::user()->id,
                'name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'price' => $request->input('price'),
                'qty' => $request->input('qty'),
                'o_qty' => $request->input('o_qty'),
                'category_id' => $request->input('category_id'),
                'postage' => $request->input('postage'),
                'source' => $request->input('source')

            ]);

            if($Product){
                Flash::success('Product Updated successfully.');
                return redirect()->route('products.show', ['product'=> $Product->id]);
            }

        return redirect(route('products.index'));

        }
        return view('auth.login');
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->findWithoutFail($id);

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
