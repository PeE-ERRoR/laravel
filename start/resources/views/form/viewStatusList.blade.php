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
        <div class="row">
          <div class="col-4">
            <select class="form-control" name="" id="province" onchange="select.getDistrict()">
              @foreach ($provinces['province'] as $province)
                <option value="{{ $province['pid'] }}">{{ $province['name'] }}</option>
              @endforeach
            </select>
          </div>

          <div class="col-4">
            <select class="form-control" name="" id="district" onchange="select.getSubDistrict()">
              <option value="">เลือกอำเภอ</option>
            </select>
          </div>

          <div class="col-4">
            <select class="form-control" name="" id="subdistrict">
              <option value="">เลือกตำบล</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <a href="{{ url('/home') }}" class="btn btn-secondary mt-2"><i class="fa fa-reply"></i> Back</a>
  </div>
@endsection

@push('scripts')
  <script>

    var BASE_URL = '{{ url("/") }}';

    var select = {
      getDistrict: function(){
        var url = '/getDistrict/'+$("#province").val();
        $.get(BASE_URL+url, function(data, status){
          console.log(data);
          var STR = '';
          for (a of data.district) {
            STR += '<option value="'+a.pid+'">'+a.name+'</option>';
          }
          $('#district').html(STR);
          $('#subdistrict').html('<option value="">เลือกตำบล</option>');
        });
      },
      getSubDistrict: function(){
        var url = '/getSubDistrict/'+$("#district").val();
        $.get(BASE_URL+url, function(data, status){
          console.log(data);
          var STR = '';
          for (a of data.subdistrict) {
            STR += '<option value="'+a.pid+'">'+a.name+'</option>';
          }
          $('#subdistrict').html(STR);
        });
      },
    }

  </script>
@endpush
