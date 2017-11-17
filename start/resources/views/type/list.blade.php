@extends('layouts.app')

@section('navigation')

  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Library</a></li>
  <li class="breadcrumb-item active" aria-current="page">Data</li>

@endsection

@section('content')

  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h2>Type</h2>
      </div>
      <div class="card-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Date</th>
              <th scope="col" class="text-right">
                <a href="{{ url('/type/create') }}" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Input Type</a>
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($types as $type)
              {{-- {{ dd($file) }} --}}
            <tr>
              <th scope="row">{{ $type->index }}</th>
              <td>{{ $type->type_name }}</td>
              <td>{{ $type->created_at }}</td>
              <td class="text-right">
                <form class="" action="{{ url('./type/'.$type->id) }}" method="post">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <a href="{{ url('./type/'.$type->id) }}" class="btn btn-outline-info btn-sm"><i class="fa fa-search"></i></a>
                  <a href="{{ url('./type/'.$type->id.'/edit') }}" class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></a>
                  <a href=""><button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button></a>
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
