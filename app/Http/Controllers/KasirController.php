<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;

        if (strlen($katakunci)) {
            $data = Kasir::where('id', 'like', "%$katakunci%")
                ->orWhere('KodeKasir', 'like', "%$katakunci%")
                ->orWhere('Nama', 'like', "%$katakunci%")
                ->orWhere('HP', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Kasir::orderBy('id', 'desc')->paginate($jumlahbaris);
        }

        return view('kasir.index')->with('data', $data);
    }

    public function create()
    {
        return view('kasir.create');
    }

    public function store(Request $request)
    {
        Session::flash('KodeKasir', $request->KodeKasir);
        Session::flash('Nama', $request->Nama);
        Session::flash('HP', $request->HP);

        $validator = Validator::make($request->all(), [
            'KodeKasir' => 'required|string|max:255',
            'Nama' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("kasir/create")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'KodeKasir' => $request->KodeKasir,
            'Nama' => $request->Nama,
            'HP' => $request->HP,
        ];

        Kasir::create($data);

        return redirect()->to('kasir')->with('success', 'Berhasil menambahkan data kasir');
    }

    public function show($id)
    {
        $data = Kasir::find($id);

        return view('kasir.show')->with('data', $data);
    }

    public function edit($id)
    {
        $data = Kasir::where('id', $id)->first();
        return view('kasir.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        Session::flash('KodeKasir', $request->KodeKasir);
        Session::flash('Nama', $request->Nama);
        Session::flash('HP', $request->HP);

        $validator = Validator::make($request->all(), [
            'KodeKasir' => 'required|string|max:255',
            'Nama' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("kasir/{$id}/edit")
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'KodeKasir' => $request->KodeKasir,
            'Nama' => $request->Nama,
            'HP' => $request->HP,
        ];

        Kasir::where('id', $id)->update($data);
        return redirect()->to('kasir')->with('success', 'Berhasil melakukan update data');
    }

    public function destroy($id)
    {
        Kasir::where('id', $id)->delete();
        return redirect()->to('kasir')->with('success', 'Berhasil melakukan delete data');
    }
}
