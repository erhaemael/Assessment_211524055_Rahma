@extends('layout.template')

@section('konten')
<form action='{{ url('tenan') }}' method='post'>
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
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url("tenan") }}' class="btn btn-secondary"><< Kembali</a>
        <div class="mb-3 row">
            <label for="KodeTenan" class="col-sm-2 col-form-label">Kode Tenan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='KodeTenan' value="{{ old('KodeTenan') }}" id="KodeTenan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="NamaTenan" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='NamaTenan' value="{{ old('NamaTenan') }}" id="NamaTenan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="HP" class="col-sm-2 col-form-label">HP</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='HP' value="{{ old('HP') }}" id="HP">
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
