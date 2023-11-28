<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $data = Barang::where('KodeBarang', 'like', "%$katakunci%")
                ->orWhere('NamaBarang', 'like', "%$katakunci%")
                ->orWhere('Satuan', 'like', "%$katakunci%")
                ->orWhere('HargaSatuan', 'like', "%$katakunci%")
                ->orWhere('Stok', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Barang::orderBy('KodeBarang', 'asc')->paginate($jumlahbaris);
        }

        return view('barang.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'KodeBarang' => 'required|string|max:255',
            'NamaBarang' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|numeric',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect('barang/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        Barang::create($data);

        return redirect()->to('barang')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Barang::where('id', $id)->first();
        return view('barang.edit')->with('data', $data);
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
        $validator = Validator::make($request->all(), [
            'KodeBarang' => 'required|string|max:255',
            'NamaBarang' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|numeric',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect("barang/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = $request->all();

        Barang::where('id', $id)->update($data);

        return redirect()->to('barang')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Barang::where('id', $id)->first();
        return view('barang.show')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('id', $id)->delete();
        return redirect()->to('barang')->with('success', 'Berhasil melakukan delete data');
    }
}
