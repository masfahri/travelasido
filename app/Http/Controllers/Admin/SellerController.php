<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\SellerModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SellerController extends Controller
{
    public $initialPage = 'Penjual';
    public function __construct()
    {
        $this->seller = SellerModel::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = $this->seller;
        $initialPage = $this->initialPage;
        return view('admin.seller.index', compact('sellers', 'initialPage'));
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
        try {
            DB::beginTransaction();
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt('12345678'),
                'status'    => 1
            ]);
            $user->assignRole('seller');
            $request['user_id'] = $user->id;
            $request['status'] = 1;
            $insert = $this->bindInsert(array(
                'request' => $request->except('_token'), 
                'class' => SellerModel::class,
                'message' => array('success' => $this->initialPage.': <strong>' . $request->email . '</strong> Ditambahkan'),
                )
            );
            DB::commit();
            return redirect()->back()->with($insert);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back()->with(['error' => 'users: '.$th->getMessage()]);
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
        $seller = SellerModel::find($id);
        $sellers = SellerModel::all();
        $initialPage = $this->initialPage;
        return view('admin.seller.edit', compact('seller', 'sellers', 'initialPage'));
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
        $update = $this->bindUpdate(array(
            'id'    => $id,
            'request' => $request->except('_token'),
            'class' => SellerModel::class,
            'message' => array('success' => $this->initialPage.': <strong>' . $request->email . '</strong> Diubah'),
        ));
        return redirect()->back()->with($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
