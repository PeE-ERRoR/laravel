@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Status View
      </div>
      <div class="card-body">
        @foreach ($types as $type)
          <a href="{{ url('listview', $type->id) }}" class="btn btn-primary"><i class="fa fa-search"></i> {{ $type->type_name }}</a>
        @endforeach

      </div>
    </div>

    <div class="card">
      <div class="card-header">
        Select JSON
      </div>
      <div class="card-body">
        <select class="form-control col-4" name="">
          @foreach ($provinces['province'] as $province)
            <option value="{{ $province['pid'] }}">{{ $province['name'] }}</option>
          @endforeach
        </select>
      </div>
    </div>
    <a href="{{ url('/home') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection
