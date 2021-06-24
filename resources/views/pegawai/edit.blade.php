@extends('pegawai.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Pegawai</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pegawai.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')
   
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nik:</strong>
                    <input type="text" name="nik" class="form-control" value={{$pegawai->nik}} required >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama" class="form-control" value={{$pegawai->nama}} required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Agama:</strong>
                    <select class="form-control" name="agama_id" required>
                        <option value="">Pilih Agama</option>
                        
                        @foreach ($agama as $key => $ag)
                            @php
                                if($ag->id == $pegawai->agama_id){
                                    $selected = 'selected';
                                }else {
                                    $selected = false;
                                }
                            @endphp
                            <option value={{$ag->id}} {{$selected}} >{{$ag->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jabatan:</strong>
                    <select class="form-control" name="jabatan_id" required>
                        <option value="">Pilih Jabatan</option>
                        
                        @foreach ($jabatan as $key => $jb)
                            @php
                                if($jb->id == $pegawai->jabatan_id){
                                    $selected = 'selected';
                                }else {
                                    $selected = false;
                                }
                            @endphp
                        <option value={{$jb->id}} {{$selected}} >{{$jb->nama}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tgl Pegawai:</strong>
                    <input type="date" name="tgl_pegawai" class="form-control" value={{$pegawai->tgl_pegawai}} required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection