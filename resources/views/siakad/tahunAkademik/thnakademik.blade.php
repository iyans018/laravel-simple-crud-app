@extends('layouts.app')

@section('title', 'Informasi Tahun Akademik')

@section('page_heading')
    Tahun Akademik
@endsection

@section('content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-info mb-3" data-toggle="modal" data-target="#tambahModal">
    <i class="fas fa-edit"></i> Tahun Akademik
</button>
@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{session()->get('message')}}
    </div>
@endif
<hr>
<table class="table">
    <thead class="thead-info">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Kode</th>
        <th scope="col">Tahun Akademik</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        @foreach ($thn_akademik as $data)
            <tr>
                <th scope="row"><?= $i ?></th>
                <td>{{$data['kode']}}</td>
                <td>{{$data['thn_akademik']}}</td>
                <td>{{$data['status']}}</td>
                <td>
                    <a class="btn btn-primary rounded-circle" href="/thnakademik/{{$data['id']}}/edit"><i class="fas fa-pen"></i></a>
                    <form class="d-inline" action="/thnakademik/{{$data['id']}}" method="post" onsubmit="return confirm('Anda yakin ingin delete data ini?');">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger rounded-circle" type="submit"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
        @endforeach
    </tbody>
</table>
  
<!-- Modal Insert -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Akademik</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
            <form action="/thnakademik" method="post">
                @csrf
                <div class="form-group">
                  <label for="kode">Kode</label>
                  <input type="text" class="form-control" id="kode" name="kode">
                </div>
                <div class="form-group">
                    <label for="thn_akademik">Tahun Akademik</label>
                    <input type="text" class="form-control" id="thn_akademik" name="thn_akademik">
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="custom-select" name="status">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Tambah</button>
                </div>
            </form>              
        </div>
      </div>
    </div>
</div>
@endsection