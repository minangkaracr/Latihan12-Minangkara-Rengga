<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response =  Biodata::orderBy('id', 'asc')->get();
        return view("biodata.list")->with("biodata", $response);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("biodata.index");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $nik = $request->nik;
        $umur = $request->umur;
        $alamat = $request->alamat;
        $image = $request->file("image");

        if($image){
            $imagePath = $image->store("images", "public");
            if ($imagePath){
                $imageUrl = Storage::disk('public')->url($imagePath);
                $imageName = basename($imageUrl);
            } else {
                return redirect()->back()->with('error','Failed to upload image');
            }
        }

        Biodata::insert([
            'name' => $name,
            'nik'=> $nik,
            'umur'=> $umur,
            'alamat'=> $alamat,
            'image_path'=> $imageName,
            'created_at'=> now()->format('Y-m-d H:i:s'),
            'updated_at'=> now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('biodata.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Biodata::find($id);
        return view('biodata.update')->with("biodata", $response);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $name = $request->name;
        $nik = $request->nik;
        $umur = $request->umur;
        $alamat = $request->alamat;

        Biodata::where('id', $id)->update([
            'name' => $name,
            'nik'=> $nik,
            'umur'=> $umur,
            'alamat'=> $alamat,
            'updated_at'=> now()->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('biodata.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Biodata::where('id', $id)->delete();

        return redirect()->route('biodata.index');
    }
}
