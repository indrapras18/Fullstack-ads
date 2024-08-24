<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CutiResource;
use App\Http\Resources\KaryawanResource;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::orderBy('tanggal_bergabung', 'asc')->take(3)->get();
        return KaryawanResource::collection($karyawans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function karyawanPernahCuti()
    {
        $karyawans = Karyawan::whereHas('cutis')->with('cutis')->get();
        return KaryawanResource::collection($karyawans);
    }

    public function sisaCutiKaryawan()
    {
        $karyawans = Karyawan::all();
        
        return CutiResource::collection($karyawans);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required|string|unique:karyawans,nomor_induk',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'tanggal_bergabung' => 'required|date',
        ]);

        $karyawan = Karyawan::create([
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tanggal_bergabung' => $request->tanggal_bergabung,
        ]);

        return new KaryawanResource($karyawan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return new KaryawanResource($karyawan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $karyawan = Karyawan::find($id);
        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }
    
        try {
            $validatedData = $request->validate([
                'nomor_induk' => 'required|string|unique:karyawans,nomor_induk,' . $karyawan->id,
                'nama' => 'required|string|max:255',
                'alamat' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'tanggal_bergabung' => 'required|date',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json($e->errors(), 422);
        }
        $karyawan->update($validatedData);
    
        return response()->json(['message' => 'Karyawan berhasil diperbarui', 'data' => $karyawan], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);

        if (!$karyawan) {
            return response()->json(['message' => 'Karyawan tidak ditemukan'], 404);
        }
        $karyawan->delete();
        return response()->json(['message' => 'Karyawan berhasil dihapus'], 200);
    }
}
