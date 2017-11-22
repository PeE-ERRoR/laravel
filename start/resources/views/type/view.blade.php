@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Type View
      </div>
      <div class="card-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
          {{   $types->type_name }}
          </li>
        </ul>
      </div>
    </div>
    <a href="{{ url('/type') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection
