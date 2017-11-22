@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="alert alert-primary" role="alert">
      <h1>HOME</h1>
    </div>
  </div>
  <div class="col-6">
    <div class="card">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <i class="fa fa-file"></i>
          Excel File
          <a href="{{ url('/excel') }}" class="btn btn-danger btn-sm float-right"><i class="fa fa-share"></i></a>
        </li>
        <li class="list-group-item">
          <i class="fa fa-upload"></i>
          Upload File
          <a href="{{ url('/file') }}" class="btn btn-danger btn-sm float-right"><i class="fa fa-share"></i></a>
        </li>
        <li class="list-group-item">
          <i class="fa fa-sticky-note-o"></i>
          Input Form
          <a href="{{ url('/form') }}" class="btn btn-danger btn-sm float-right"><i class="fa fa-share"></i></a>
        </li>
      </ul>
    </div>
  </div>

  <div class="col-6">
    <div class="card">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <i class="fa fa-key"></i>
          Foreign Key
          <a href="{{ url('/type') }}" class="btn btn-danger btn-sm float-right"><i class="fa fa-share"></i></a>
        </li>
        <li class="list-group-item">
          <i class="fa fa-search"></i>
          Select Status
          <a href="{{ url('/statuslist') }}" class="btn btn-danger btn-sm float-right"><i class="fa fa-share"></i></a>
        </li>
        <li class="list-group-item">
          <i class="fa fa-sticky-note-o"></i>
          Input Form
          <a href="{{ url('/form') }}" class="btn btn-danger btn-sm float-right"><i class="fa fa-share"></i></a>
        </li>
      </ul>
    </div>
  </div>




@endsection
