@extends('layout.default')
    @section('title')
        {{ 'View Book' }}
    @endsection
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
              <div class="row">
                    <div class="col-sm-8">
                        <div class="p-6 text-gray-900">
                            @if(!empty($bookDetail))
                                <h3>{{$bookDetail->title}} </h3><span>Rating: </span>
                                <p>Price: {{$bookDetail->price}}</p>
                                <p>Category: {{$bookDetail->category->category_name}}</p>
                                <p>Author: </p>
                                <p>{{$bookDetail->description}}</p>
                            @endif

                            <h4>Reviews</h4><span>Avg Rating: {{$bookDetail->avgRating()}}</span>
                                @foreach(($reviews) as $review)
                                    <p>{{$review->review}} <strong>Given By</strong>:{{$review->givenBy->name}}</p>
                                @endforeach
                        </div>
                    </div>
                    @if(empty($reviewDone))
                    @if(!empty(Auth::check()))
                    <div class="col-sm-4">
                        <div class="p-6 text-gray-900">
                            <h3>Add Reviews</h3>
                            <p>Write Your Honest Review</p>
                                <form action="{{ route('review-add') }}" method="POST">
                                    @csrf
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Rating<span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" placeholder="Rating" required name="rating">
                                    </div>
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label">Comment<span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="textarea-input" rows="5" name="review" required placeholder="Write Your Review"></textarea>
                                        <input class="form-control" type="hidden" value="{{$bookDetail->id}}" name="bookId">
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card card-body border-0 shadow-sm p-2 mb-4">
                                            <section class="d-sm-flex justify-content-between pt-2">
                                                <button class="btn btn-primary btn-lg d-block mb-2" type="submit">Save</button>
                                            </section>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
                    

                </div>
            </div>
        </div>
    </div>
                        
                    </div>
                </div>
          </div>
      </div>
  </div>
</main>
@endsection