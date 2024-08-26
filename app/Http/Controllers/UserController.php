<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchUser(Request $request){
        $nama = $request->query('name');
        $email = $request->query('email');

        $response = response()->json([
            "nama" => $nama,
            "email"=> $email,
            "dataAlamat" => [
                [
                    "kota" => "Tangerang Selatan",
                    "perumahan" => "Paradise Serpong City"
                ],[
                    "kota" => "Tangerang Selatan",
                    "perumahan" => "Vanya Park BSD"
                ]
            ]
        ]);
        return $response;
    }

    public function findUser($id){
        return "{$id} ini ada di database";
    }
}
