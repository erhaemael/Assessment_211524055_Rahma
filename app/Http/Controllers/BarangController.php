<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;

        if (strlen($katakunci)) {
            $data = barang::where('id', 'like', "%$katakunci%")
                ->orWhere('KodeBarang', 'like', "%$katakunci%")
                ->orWhere('NamaBarang', 'like', "%$katakunci%")
                ->orWhere('Satuan', 'like', "%$katakunci%")
                ->orWhere('HargaSatuan', 'like', "%$katakunci%")
                ->orWhere('Stok', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = barang::orderBy('id', 'desc')->paginate($jumlahbaris);
        }

        return view('barang.index')->with('data', $data);
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        Session::flash('KodeBarang', $request->KodeBarang);
        Session::flash('NamaBarang', $request->NamaBarang);
        Session::flash('Satuan', $request->Satuan);
        Session::flash('HargaSatuan', $request->HargaSatuan);
        Session::flash('Stok', $request->Stok);

        $validator = Validator::make($request->all(), [
            'KodeBarang' => 'required|string|max:255',
            'NamaBarang' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect("barang/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'Satuan' => $request->Satuan,
            'HargaSatuan' => $request->HargaSatuan,
            'Stok' => $request->Stok,
        ];

        barang::create($data);

        return redirect()->to('barang')->with('success', 'Berhasil menambahkan data barang');
    }

    public function show($id)
    {
        $data = barang::find($id);

        return view('barang.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = barang::where('id', $id)->first();
        return view('barang.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Session::flash('KodeBarang', $request->KodeBarang);
        Session::flash('NamaBarang', $request->NamaBarang);
        Session::flash('Satuan', $request->Satuan);
        Session::flash('HargaSatuan', $request->HargaSatuan);
        Session::flash('Stok', $request->Stok);

        $validator = Validator::make($request->all(), [
            'KodeBarang' => 'required|string|max:255',
            'NamaBarang' => 'required|string|max:255',
            'Satuan' => 'required|string|max:255',
            'HargaSatuan' => 'required|regex:/^[0-9]+(\.[0-9]{1,2})?$/',
            'Stok' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect("barang/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'KodeBarang' => $request->KodeBarang,
            'NamaBarang' => $request->NamaBarang,
            'Satuan' => $request->Satuan,
            'HargaSatuan' => $request->HargaSatuan,
            'Stok' => $request->Stok,
        ];

        barang::where('id', $id)->update($data);
        return redirect()->to('barang')->with('success', 'Berhasil melakukan update data');
    }

    public function destroy($id)
    {
        barang::where('id', $id)->delete();
        return redirect()->to('barang')->with('success', 'Berhasil melakukan delete data');
    }
}