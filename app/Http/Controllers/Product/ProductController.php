<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\CategoriesProduct\Interface\CategoriesRepositoryInterface;
use App\Repositories\Product\Interface\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $product;
    protected $categories;
    public function __construct(
        ProductRepositoryInterface $productRepositoryInterface,
        CategoriesRepositoryInterface $categoriesRepositoryInterface
    ) {
        $this->product = $productRepositoryInterface;
        $this->categories = $categoriesRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->getAll();
        $categories = $this->categories->getMainCategories();
        return view('pages.product.main', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories_products,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            toast('Data tidak valid', 'error');
            // return json_encode($validator->errors());
            return redirect()->back();
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images/products', $imageName);
            $product->thumbnail = "images/products/{$imageName}";
        }
        $product->user_id = auth()->id();
        $product->save();

        toast('Product created successfully', 'success');
        return redirect()->route('management.products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(), [
            'product_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories_products,id',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validate->fails()) {
            toast('Data tidak valid', 'error');
            // return json_encode($validator->errors());
            return redirect()->back();
        }

        $validated = $validate->validated();
        $product = $this->product->findById($id);
        $product->product_name = $validated['product_name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        $product->stock = $validated['stock'];
        $product->category_id = $validated['category_id'];
        if ($request->hasFile('thumbnail')) {
            // Delete old thumbnail if exists
            if ($product->thumbnail && \Storage::exists($product->thumbnail)) {
            \Storage::delete($product->thumbnail);
            }

            $image = $request->file('thumbnail');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images/products', $imageName);
            $product->thumbnail = "images/products/{$imageName}";
        }
        $product->user_id = auth()->id();
        $product->save();

        toast('Product updated successfully', 'success');
        return redirect()->route('management.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = $this->product->findById($id);
        if ($product->thumbnail && \Storage::exists($product->thumbnail)) {
            \Storage::delete($product->thumbnail);
        }
        $this->product->delete($id);

        toast('Product deleted successfully', 'success');
        return redirect()->route('management.products.index');
    }
}
