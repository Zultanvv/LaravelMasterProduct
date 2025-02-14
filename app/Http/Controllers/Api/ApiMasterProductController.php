<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterProduct;
use App\Http\Controllers\Controller;

class ApiMasterProductController extends Controller
{
    public function getMasterProduct()
    {
        $product = MasterProduct::all();
        $res['status'] = 200;
        $res['product'] = $product;
        return response()->json($res);
    }
}
