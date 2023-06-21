<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\ApiModel;

class ApiController extends Controller
{
    public function getData(Request $request)
    {
        $data = ApiModel::where("kode_verifikasi", $request->token)->first();

        return response()->json([
            'success' => "sukses",
            'pendaftaran' => $data
        ]);
    }

    public function insertData(Request $request)
    {
        $token = Str::random(6);

        $data = new ApiModel();
        $data->nama = $request->nama;
        $data->kampus = $request->kampus;
        $data->kode_verifikasi = $token;
        $data->save();

        return response()->json([
            'success' => "sukses",
            'pendaftaran' => $data
        ]);
    }
}
