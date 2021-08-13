@extends('layouts.app')

@section('page_heading')
    Informasi Kampus
@endsection

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session()->get('message')}}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/informasi" method="post">
    @csrf
    @method('PUT')
    @foreach ($informasi_kampus as $data)
    <div class="row">
        <div class="form-group col-sm">
            <label for="nama_universitas">Nama Universitas</label>
        <input type="text" class="form-control" id="nama_universitas" name="nama_universitas" value="{{$data['nama_universitas']}}">
        </div>
        <div class="form-group col-sm">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$data['email']}}">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm">
            <label for="alamat_web">Alamat Web</label>
            <input type="text" class="form-control" id="alamat_web" name="alamat_web" value="{{$data['alamat_web']}}">
        </div>
        <div class="form-group col-sm">
            <label for="no_telepon">No Telepon</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{$data['no_telepon']}}">
        </div>
        <div class="form-group col-sm">
            <label for="fax">FAX</label>
            <input type="text" class="form-control" id="fax" name="fax" value="{{$data['fax']}}">
        </div>
    </div>
    <div class="form-group">
        <label for="alamat">Alamat Kampus</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$data['alamat']}}">
    </div>
    <button type="submit" class="btn btn-info">Update Data</button>
    @endforeach

</form>
@endsection