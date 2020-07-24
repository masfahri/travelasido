<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function bindInsert($params) {
        try {
            DB::beginTransaction();
            $params['class']::create($params['request']);
            DB::commit();
            return $params['message'];
        } catch (\Throwable $th) {
            DB::rollback();
            return array('error' => $th->getMessage());
        }
    }

    public function bindUpdate($params)
    {
        try {
            DB::beginTransaction();
            $params['class']::find($params['id']);
            $params['class']->update([
                'name' => $request->kategori,
                'description' => $request->description
            ]);
            DB::commit();
            return $params['message'];
        } catch (\Throwable $th) {
            DB::rollback();
            return array('error' => $th->getMessage());
        }
    }

    public function bindInsertId($params)
    {
        try {
            DB::beginTransaction();
            $data = $params['class']::create($params['request']);
            DB::commit();
            return $data->id;
        } catch (\Throwable $th) {
            DB::rollback();
            return array('error' => $th->getMessage());
        }
    }
}
