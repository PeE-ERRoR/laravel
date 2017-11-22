@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Status View
      </div>
      <div class="card-body">
        @foreach ($types as $type)
          <a href="{{ url('status', [$type->id]) }}" class="btn btn-primary"><i class="fa fa-search"></i> {{ $type->type_name }}</a>
        @endforeach

      </div>
    </div>
    <a href="{{ url('/form') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection
