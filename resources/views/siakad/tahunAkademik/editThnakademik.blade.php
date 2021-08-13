@extends('layouts.app')

@section('title', 'Informasi Tahun Akademik')

@section('page_heading')
    Tahun Akademik / Edit
@endsection

@section('content')
<form action="/thnakademik/{{$thn_akademik['id']}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="kode">Kode</label>
      <input type="text" class="form-control" id="kode" name="kode" value="{{$thn_akademik['kode']}}">
    </div>
    <div class="form-group">
        <label for="thn_akademik">Tahun Akademik</label>
        <input type="text" class="form-control" id="thn_akademik" name="thn_akademik" value="{{$thn_akademik['thn_akademik']}}">
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select class="custom-select" name="status">
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
        </select>
    </div>
    <div class="modal-footer">
        <a class="btn btn-secondary" href="/thnakademik">Kembali</a>
        <button type="submit" class="btn btn-info">Update Data</button>
    </div>
</form>   
@endsection