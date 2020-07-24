<?php

namespace App\Http\Controllers\admin;

use App\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    
    public function __construct()
    {
        $this->categories = CategoryModel::all();
        $this->middleware('auth');

    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categories;
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek_categories = CategoryModel::where('name', ucwords($request->kategori))->count();
        if ($cek_categories > 0) {
            return redirect()->back()->with(['error' => 'Kategori: <strong>' . ucwords($request->kategori) . '</strong> Sudah Ada']);
        }else{
            try {
                DB::beginTransaction();
                $categories = CategoryModel::create([
                    'name' => ucwords($request->kategori),
                    'description' => $request->description
                ]);
                DB::commit();
                return redirect()->back()->with(['success' => 'Kategori: <strong>' . $categories->name . '</strong> Ditambahkan']);
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
        $category = CategoryModel::find($id);
        return view('admin.categories.edit', compact('categories', 'category'));
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
            $category = CategoryModel::find($id);
            $category->update([
                'name' => $request->kategori,
                'description' => $request->description
            ]);
            DB::commit();
            return redirect()->back()->with(['success' => 'Kategori: <strong>' . $category->name . '</strong> Diganti Dengan <strong>' . $request->kategori . '</strong>']);
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
        $categories = CategoryModel::findOrFail($id);
        if ($categories != null) {
            if ($categories->Products->count() == 0) {
                try {
                    DB::beginTransaction();
                    $categories->delete();
                    DB::commit();
                    return redirect()->back()->with(['success' => 'Kategori: <strong>' . $categories->name . '</strong> Dihapuskan']);
                } catch (\Throwable $th) {
                    DB::rollback();
                    return redirect()->back()->with(['error' => $th->getMessage()]);
                }
            }else{
                return redirect()->back()->with(['error' => 'Kategori: <strong>' . $categories->name . '</strong> Ada Produk Lain']);
            }
        }
    }
}
