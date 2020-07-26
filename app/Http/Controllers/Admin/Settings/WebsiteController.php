<?php

namespace App\Http\Controllers\admin\settings;

use App\AboutSiteModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    
    public function __construct()
    {
        $this->data = AboutSiteModel::find(1);
    }
    
    public function index()
    {
        $data = $this->data;
        return view('admin.settings.website', compact('data'));
    }

    public function update(Request $request)
    {
        $this->data->update($request);
        return redirect()->back()->with(['success' => '<strong>Website Info Has Been Updated</strong>']);
    }
}
