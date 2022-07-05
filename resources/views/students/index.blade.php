@extends('layout.master')
     
@section('content')
    
   
    
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create</a>
            </div>
            
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Menu</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Nama Pegawai</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->rombel }}</td>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->absen }}</td>
            <td>{{ $student->rayon }}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
           
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    <a href="students/print" class="btn btn-primary" target="_blank">CETAK PDF</a>
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   
    
    {!! $students->links() !!}
        
@endsection