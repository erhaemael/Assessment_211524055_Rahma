@extends('layout.template')

@section('konten')
<form action='{{ url('barang/'.$data->id) }}' method='post'>
    @csrf
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('barang') }}' class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="KodeBarang" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='KodeBarang' value="{{ old('KodeBarang', $data->KodeBarang) }}" id="KodeBarang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="NamaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='NamaBarang' value="{{ old('NamaBarang', $data->NamaBarang) }}" id="NamaBarang">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Satuan" class="col-sm-2 col-form-label">Satuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Satuan' value="{{ old('Satuan', $data->Satuan) }}" id="Satuan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="HargaSatuan" class="col-sm-2 col-form-label">Harga Satuan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='HargaSatuan' value="{{ old('HargaSatuan', $data->HargaSatuan) }}" id="HargaSatuan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Stok" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Stok' value="{{ old('Stok', $data->Stok) }}" id="Stok">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>
@endsection
