


@extends('layout.default')
@section('title')
     {{ 'Users' }}
@endsection
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">User List</div>
                    <div class="card-body">
  
                  <div class="container">
  
  <table class="table table-bordered data-table">
      <thead>
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>UserName</th>
              <th>Last Login</th>
          </tr>
      </thead>
      <tbody>
          @forelse($users as $user)
              <tr>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->username }}</td>
                  <td>@if($user->last_login!= ''){{ date('d-m-Y', strtotime($user->last_login)) }} @endif</td>
              </tr>
          @empty
              <tr>
                  <td colspan="3">There are no users.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
  {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection