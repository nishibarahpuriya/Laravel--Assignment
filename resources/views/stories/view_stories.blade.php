@extends('layout.default')
    @section('title')
        {{ 'View Story' }}
    @endsection
@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">{{ $storyDetail->title }}</div>
                    <div class="card-body">
  
                        <h6 class="text-2xl"> Published Date: @if($storyDetail->publish_date!= ''){{ date('d-m-Y', strtotime($storyDetail->publish_date)) }} @endif </h6>
                        <div class="prose lg:prose-xl">{!! $storyDetail->content !!}</div>
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