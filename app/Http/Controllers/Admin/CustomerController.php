<?php

namespace App\Http\Controllers\Admin;

use App\CustomersModel;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public $initialPage = 'Pelanggan';
    public function __construct()
    {
        $this->customer = CustomersModel::all(); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = $this->customer;
        $initialPage = $this->initialPage;
        return view('admin.customer.index', compact('customers', 'initialPage'));
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
            $user->assignRole('buyer');
            $request['user_id'] = $user->id;
            $request['status'] = 0;
            $request['level'] = 'ppk';
            $insert = $this->bindInsert(array(
                'request' => $request->except('_token'), 
                'class' => CustomersModel::class,
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
        $customer = CustomersModel::find($id);
        $customers = CustomersModel::all();
        $initialPage = $this->initialPage;
        return view('admin.customer.edit', compact('customer', 'customers', 'initialPage'));
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
            'class' => CustomersModel::class,
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
        $data = CustomersModel::find($id);
        $this->bindDelete(array(
            'id' => $id,
            'data' => $data,
            'message' => array('success' => $this->initialPage.': <strong>' . $data->email . '</strong> Dihapus'),
        ));
        return redirect()->route('admin.customers.index')->with($data);
    }
}
