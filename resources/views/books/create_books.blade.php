@extends('layout.default')
@section('title')
     {{ 'Create-Story' }}
@endsection
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Create Books</div>
                    <div class="card-body">
  
                        <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                             @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label class="form-label">Title<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Title"
                                    value="@if (!empty($book)){{ $book->title }}@endif" required name="title">
                                        @error('title')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label class="form-label">Book Category<span class="text-danger">*</span></label>
                                        <select class="form-control" name="category" required>
                                            <option value=" ">Select Book Category</option>
                                            @foreach($bookCategory as $value)
                                                <option value="{{$value->id}}">{{$value->category_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Price<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" placeholder="Price"
                                    value="@if (!empty($book)){{ $book->price }}@endif" required name="price">
                                    @error('price')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label class="form-label">Book Author<span class="text-danger">*</span></label>
                                    <select class="form-control" name="author" required>
                                    <option value=" ">Select Book Author</option>
                                    @foreach($bookAuthors as $author)
                                        <option value="{{$author->id}}">{{$author->name}}</option>
                                    @endforeach
                                    </select>
                                    @error('author')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label" for="ap-title">Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="textarea-input" rows="5" name="description">@if (!empty($book)){{ $book->description }}@endif</textarea>
                                    @error('description')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
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