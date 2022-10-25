@extends('layout.default')
@section('title')
     {{ 'Edit-Story' }}
@endsection
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Edit Story</div>
                    <div class="card-body">
  
                        <form action="{{ route('story.update',$storyDetail->slug) }}" method="POST" enctype="multipart/form-data">
                             @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Story Title:</strong>
                                        <input type="text" name="title" class="form-control" placeholder="Story Title" value="{{$storyDetail->title}}">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Slug:</strong>
                                        <input type="text" name="slug" class="form-control" placeholder="Story Slug" value="{{$storyDetail->slug}}">
                                        @error('slug')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Description:</strong>
                                        <textarea id="markdown-editor" class="block w-full mt-1 rounded-md" name="description" rows="3">{!! $storyDetail->content !!}</textarea>
                                        @error('description')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
          </div>
      </div>
  </div>
</main>
@endsection