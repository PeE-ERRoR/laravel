@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Input Form
      </div>
      <div class="card-body">
        @isset($type)
          <form class="" action="{{ url('/type') }}" method="put" enctype="multipart/form-data">
        @else
          <form class="" action="{{ url('/type') }}" method="post" enctype="multipart/form-data">
        @endif

          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="">Type Name</label>
              <input type="text" class="form-control is-valid" name="type_name" id="" placeholder="name" value="{{ $type->type_name or old('type_name') }}" required>
            </div>
          </div>

          <button type="submit" name="button" class="btn btn-success float-right">Save</button>

        </form>

      </div>
    </div>
    <a href="{{ url('/type') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection
