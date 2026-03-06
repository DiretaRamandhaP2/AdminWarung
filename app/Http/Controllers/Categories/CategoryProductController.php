<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\CategoriesProduct;
use App\Repositories\CategoriesProduct\Interface\CategoriesRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    protected $categoriesProduct;

    public function __construct(
        CategoriesRepositoryInterface $categoriesProduct
    ) {
        $this->categoriesProduct = $categoriesProduct;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->categoriesProduct->getAll();
        $categories = $this->categoriesProduct->getMainCategories();
        return view('pages.categories.category-product.main-pages', compact('data', 'categories'));
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
        // return json_encode($request->all());
        $rules = [
            'category_name' => 'required|string|max:255',
            'main_category' => 'nullable|exists:categories_products,id',
            'active' => 'required|boolean',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            toast('Data tidak valid', 'error');
            return json_encode($validator->errors());
            return redirect()->back();
        }

        $this->categoriesProduct->create($data);

        toast('Berhasil Menambahkan Kategori Produk', 'success');
        return redirect()->route('management.categories-products.index');
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
        $rules = [
            'category_name' => 'required|string|max:255',
            'main_category' => 'nullable|exists:categories_products,id',
            'active' => 'required|boolean',
        ];

        $data = $request->all();

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            toast('Data tidak valid', 'error');
            return json_encode($validator->errors());
            return redirect()->back();
        }

        $this->categoriesProduct->update($id, $data);

        toast('Berhasil Menambahkan Kategori Produk', 'success');
        return redirect()->route('management.categories-products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->categoriesProduct->delete($id);

        toast('Berhasil Menghapus Kategori Produk', 'success');
        return redirect()->route('management.categories-products.index');
    }
}
