@extends('pegawai.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Pegawai</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pegawai.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th width="200px" class="table-active">Nik</th>
                    <th width="20px">:</th>
                    <td>{{$pegawai->nik}}</td>
                </tr>
                <tr>
                    <th  class="table-active">Nama</th>
                    <th >:</th>
                    <td>{{$pegawai->nama}}</td>
                </tr>
                <tr>
                    <th  class="table-active">Agama</th>
                    <th >:</th>
                    <td>{{$pegawai->agama->nama}}</td>
                </tr>
                <tr>
                    <th  class="table-active">Jabatan</th>
                    <th >:</th>
                    <td>{{$pegawai->jabatan->nama}}</td>
                </tr>
                <tr>
                    <th  class="table-active">Tgl Pegawai</th>
                    <th >:</th>
                    <td>{{ date('d F Y',strtotime($pegawai->tgl_pegawai)) }}</td>
                </tr>
            </table>
            <h3>Keluarga {{$pegawai->nama}}</h3>
            <a href="{{ route('keluarga_pegawai.create', ['id'=>$pegawai->id]) }}" class="btn btn-info">Tambah Keluarga {{$pegawai->nama}}</a>
            <br /><br />
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-striped table-hovered table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Keluarga</th>
                    <th>Hubungan</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($pegawai->keluarga as $key => $kl)

                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $kl->nama }}</td>
                        <td>{{ $kl->hubungan }}</td>
                        <td>
                            <form action="{{ route('keluarga_pegawai.destroy',$kl->id) }}" method="POST">   
                                <a class="btn btn-primary" href="{{ route('keluarga_pegawai.edit',$kl->id) }}">Edit</a>   
                                @csrf
                                @method('DELETE')      
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection