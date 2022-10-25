


@extends('layout.default')
@section('title')
            {{ 'Stories' }}
        @endsection
  @section('content')
  <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Stories <a href="{{ route('create.stories') }}"><button class="btn btn-success" style="float: right;">Add Stories</button></a></div>
                        <div class="card-body">
    
                            <div class="container">
        
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>UserName</th>
                                            <th>Publish Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($stories as $story)
                                            <tr>
                                                <td>{{ $story->title }}</td>
                                                <td>{{ $story->slug }}</td>
                                                <td>{{$story->user->username}}</td>
                                                <td>@if($story->publish_date!= ''){{ date('d-m-Y', strtotime($story->publish_date)) }} @endif </td>
                                                <td>
                                                <a class="btn btn-primary" href="{{ route('stories.edit',$story->slug) }}">Edit</a>
                                                <a class="btn btn-primary" href="{{route('stories.delete',$story->id)}}">delete</a> 
                                                <a class="btn btn-primary" href="{{route('stories.view',[$story->user->username,$story->slug])}}">View</a> 
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">There are no users.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {!! $stories->withQueryString()->links('pagination::bootstrap-5') !!}
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  @endsection