@extends('layout.template')

@section('konten')
<form action='{{ url('kasir/'.$data->id) }}' method='post'>
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
        <a href='{{ url('kasir') }}' class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="KodeKasir" class="col-sm-2 col-form-label">Kode Kasir</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='KodeKasir' value="{{ old('KodeKasir', $data->KodeKasir) }}" id="KodeKasir">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='Nama' value="{{ old('Nama', $data->Nama) }}" id="Nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="HP" class="col-sm-2 col-form-label">HP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='HP' value="{{ old('HP', $data->HP) }}" id="HP">
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
