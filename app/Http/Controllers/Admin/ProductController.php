<?php

namespace App\Http\Controllers\admin;

use App\CategoryModel;
use App\Http\Controllers\Controller;
use App\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->products = ProductModel::all();
        $this->categories = CategoryModel::pluck('name', 'id');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->products;
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categories;
        $products = $this->products;
        return view('admin.products.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek_product = ProductModel::where('name', ucwords($request->name))->count();
        if ($cek_product > 0) {
            return redirect()->back()->with(['error' => 'Produk: <strong>' . ucwords($request->name) . '</strong> Sudah Ada']);
        }else{
            try {
                DB::beginTransaction();
                $produk = ProductModel::create([
                    'name' => ucwords($request->name),
                    'stock' => $request->stok,
                    'price' => $request->harga,
                    'category_id' => $request->category_id,
                    'description' => $request->description
                ]);
                DB::commit();
                return redirect()->back()->with(['success' => 'Produk: <strong>' . $produk->name . '</strong> Ditambahkan']);
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->back()->with(['error' => $th->getMessage()]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categories;
        $product = ProductModel::find($id);
        $products = $this->products;
        return view('admin.products.edit', compact('categories', 'product', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $product = ProductModel::find($id);
            $product->update([
                'name' => ucwords($request->name),
                'stock' => $request->stock,
                'price' => $request->harga,
                'category_id' => $request->category_id,
                'description' => $request->description
            ]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Kategori: <strong>' . $product->name . '</strong> Diganti Dengan <strong>' . $request->name . '</strong>']);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::findOrFail($id);
        if ($product != null) {
            try {
                DB::beginTransaction();
                $product->delete();
                DB::commit();
                return redirect()->route('admin.products.index')->with(['success' => 'Produk: <strong>' . $product->name . '</strong> Dihapuskan']);
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->back()->with(['error' => $th->getMessage()]);
            }
        }else{
            return redirect()->back()->with(['error' => 'Produk: <strong>' . $product->name . '</strong> Dihapuskan']);
        }
    }
}
