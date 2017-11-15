@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2">
            <div class="panel panel-default">
              <div class="card">
                <div class="card-header">
                  Featured
                </div>
                <div class="card-body">
                  <form class="" action="/file" method="post">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <input type="file" name="avata" class="file-control" value="">
                        </li>
                        <li class="list-group-item">
                          <button type="submit" name="button" class="btn btn-success btn-block">save</button>
                        </li>
                    </ul>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
