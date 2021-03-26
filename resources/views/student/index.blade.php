@extends('student.layout')
@section('content')
    <div class="row">
    <div class="col-lg-12 margin-tb">
    <div class="pull-left mt-2">
    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
    </div>
    <div class="float-right my-2">
    <a class="btn btn-success" href="{{ route('student.create') }}"> Input Student Data</a>
    </div>
    </div>
    </div>
    <!-- Start kode form pencarian-->
    <form class="form" method="get" action="{{ route('search') }}">
    <div class="form-group w-100 mb-3">
        <label for="search" class="d-block mr-2">Pencarian</label>
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </div>
    </form>
<!-- Start kode form pencarian-->  
@if ($message = Session::get('success'))
    <div class="alert alert-success">
    <p>{{ $message }}</p>
    </div>
@endif
    <table class="table table-bordered">
    <tr>
    <th>Nim</th>
    <th>Name</th>
    <th>Class</th>
    <th>Major</th>
    <th>Address</th>
    <th>Date of Birth</th>
    <th width="280px">Action</th>
    </tr>
@foreach ($student as $mhs)
    <tr>
    <td>{{ $mhs ->nim }}</td>
    <td>{{ $mhs ->name }}</td>
    <td>{{ $mhs ->class }}</td>
    <td>{{ $mhs ->major }}</td>
    <td>{{ $mhs ->address }}</td>
    <td>{{ $mhs ->dateOfBirth }}</td>
    <td>
        <form action="{{ route('student.destroy',['student'=>$mhs->nim]) }}" method="POST">
        <a class="btn btn-info" href="{{ route('student.show',$mhs->nim) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('student.edit',$mhs->nim) }}">Edit</a>
@csrf
@method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </td>
    </tr>
    
@endforeach
    </table>
    {{$student->links()}}
@endsection