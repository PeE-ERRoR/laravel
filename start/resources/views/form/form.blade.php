@extends('layouts.app')

@section('content')
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Input Form
      </div>
      <div class="card-body">
        @isset($form)
          <form class="" action="{{ url('/form') }}" method="put" enctype="multipart/form-data">
        @else
          <form class="" action="{{ url('/form') }}" method="post" enctype="multipart/form-data">
        @endif

          {{ csrf_field() }}

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="">Name</label>
              <input type="text" class="form-control is-valid" name="name" id="" placeholder="name" value="{{ $form->name or old('name') }}" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Last name</label>
              <input type="text" class="form-control is-valid" name="" id="" placeholder="Last name" value="" required>
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Type</label>
              <select class="form-control custom-select is-valid" name="type" required>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="col-md-6 mb-3">
              <label for="">Date</label>
              <input type="date" class="form-control is-valid" name="date" id="" placeholder="date" value="{{ $form->name or old('name') }}" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="validationServer03">City</label>
              <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City">
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer04">State</label>
              <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State">
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="validationServer05">Zip</label>
              <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip">
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
          </div>
          <button type="submit" name="button" class="btn btn-success float-right">Save</button>

        </form>

      </div>
    </div>
    <a href="{{ url('/form') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection
