@extends('layouts.app')

@section('navigation')

  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Library</a></li>
  <li class="breadcrumb-item active" aria-current="page">Data</li>

@endsection

@section('content')

  <div class="col-12">

    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-success fade show" role="alert">
        {{ $message }} <strong>!!!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="card">
      <div class="card-header">
        <h2>Form</h2>
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Date</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-right">
                <a href="{{ url('/type/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-user"></i> Type Form</a>
                <a href="{{ url('/form/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Input Form</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($forms as $form)
              {{-- {{ dd($file) }} --}}
            <tr>
              <th scope="row"></th>
              <td>{{ $form->name }}</td>
              <td>{{ $form->date }}</td>
              <td>{{ $form->type_name }}</td>
              <td class="text-right">
                <form class="" action="" method="delete">
                  <a href="{{ url('./form/'.$form->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-search"></i></a>
                  <a href="{{ url('./form/'.$form->id.'/edit') }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a>
                  <a href="{{ url('/') }}" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <a href="{{ url('/home') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>


  </div>
@endsection
