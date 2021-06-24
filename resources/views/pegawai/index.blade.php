@extends('pegawai.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Testing Code Darya Varya</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pegawai.create') }}"> Create New Pegawai</a>
            </div>
        </div>
    </div>
    
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-striped table-hovered table-bordered">
        <tr>
            <th>No</th>
            <th>Nik</th>
            <th>Nama</th>
            <th>Agama</th>
            <th>Jabatan</th>
            <th>Tgl Pegawai</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $value)

        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $value->nik }}</td>
            <td>{{ $value->nama }}</td>
            <td>{{ $value->agama->nama }}</td>
            <td>{{ $value->jabatan->nama }}</td>
            <td>{{ date('d F Y',strtotime($value->tgl_pegawai)) }}</td>
            <td>
                <form action="{{ route('pegawai.destroy',$value->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('pegawai.show',$value->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('pegawai.edit',$value->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>  
    {!! $data->links() !!}      
@endsection