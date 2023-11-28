<?php

namespace App\Http\Controllers;

use App\Models\Tenan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TenanController extends Controller
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
            $data = Tenan::where('KodeTenan', 'like', "%$katakunci%")
                ->orWhere('NamaTenan', 'like', "%$katakunci%")
                ->orWhere('HP', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = Tenan::orderBy('KodeTenan', 'asc')->paginate($jumlahbaris);
        }

        return view('tenan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tenan.create');
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
            'KodeTenan' => 'required|string|max:255',
            'NamaTenan' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('tenan/create')
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        Tenan::create($data);

        return redirect()->to('tenan')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Tenan::where('id', $id)->first();
        return view('tenan.edit')->with('data', $data);
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
            'KodeTenan' => 'required|string|max:255',
            'NamaTenan' => 'required|string|max:255',
            'HP' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect("tenan/{$id}/edit")
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        Tenan::where('id', $id)->update($data);

        return redirect()->to('tenan')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Tenan::where('id', $id)->first();
        return view('tenan.show')->with('data', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tenan::where('id', $id)->delete();
        return redirect()->to('tenan')->with('success', 'Berhasil melakukan delete data');
    }
}
