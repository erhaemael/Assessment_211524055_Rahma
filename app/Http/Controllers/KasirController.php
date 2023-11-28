<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KasirController extends Controller
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
            $data = Kasir::where('KodeKasir', 'like', "%$katakunci%")
                ->orWhere('Nama', 'like', "%$katakunci%")
                ->orWhere('HP', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Kasir::orderBy('KodeKasir', 'asc')->paginate($jumlahbaris);
        }

        return view('kasir.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kasir.create');
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
            'KodeKasir' => 'required|string|max:255',
            'Nama' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('kasir/create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        Kasir::create($data);

        return redirect()->to('kasir')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kasir::where('id', $id)->first();
        return view('kasir.edit')->with('data', $data);
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
            'KodeKasir' => 'required|string|max:255',
            'Nama' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("kasir/{$id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        Kasir::where('id', $id)->update($data);

        return redirect()->to('kasir')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Kasir::where('id', $id)->first();
        return view('kasir.show')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kasir::where('id', $id)->delete();
        return redirect()->to('kasir')->with('success', 'Berhasil melakukan delete data');
    }
}
