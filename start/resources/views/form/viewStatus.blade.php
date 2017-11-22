@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Form View
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
          Name : {{   $forms->name }}
          </li>
          <li class="list-group-item">
          Status : {{   $forms->type_name }}
          </li>
          <li class="list-group-item">
          Date : {{   $forms->date }}
          </li>
        </ul>
      </div>
    </div>
    <a href="{{ url('/form') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection
