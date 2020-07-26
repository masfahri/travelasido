<?php

namespace App\Http\Controllers\admin\settings;

use App\Http\Controllers\Controller;
use App\SellingOptionModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SellingOptionController extends Controller
{
    public function __construct()
    {
        $this->data = SellingOptionModel::find(1);
    }

    public function index()
    {
        $data = $this->data;
        return view('admin.settings.selling', compact('data'));
    }

    public function store(Request $request)
    {
        try {
            $data = SellingOptionModel::find(1);
            $data->commission_type = ''.$request->commission_type.'';
            $data->commission = $request->commission;
            $data->created_at = Carbon::now()->toDateTimeString();
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->save();
            return array(
                'success' => true,
                'message' => 'Sukses Ubah Komisi'
            );
        } catch (\Throwable $th) {
            return array(
                'success' => false,
                'message' => $th->getMessage()
            );
        }
    }
}
