


@extends('layout.default')
@section('title')
            {{ 'books' }}
        @endsection
  @section('content')
  <main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(!empty(Auth::user()))
                    <div class="card-header">Books <a href="{{ route('create.books') }}"><button class="btn btn-success" style="float: right;">Add books</button></a></div>
                    @endif 
                        <div class="card-body">
    
                            <div class="container">
        
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">View Book</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($books as $book)
                                            <tr>
                                                <td>{{$book->title}}</td>
                                                <td>{{$book->price}}</td>
                                                <td>{{$book->category->category_name}}</td>
                                                <td></td>
                                                <td>{{$book->description}}</td>
                                                <td>
                                                    <a class="btn btn-primary" href="{{route('books.view',[$book->id])}}">View</a> 
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3">There are no books.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            @if ($pagination['totalPages'] > 1)
    <div class="row align-items-center justify-content-center">
        <div class="col-lg-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li
                        class="page-item btn btn-outline-primary py-1 me-3 @if ($pagination['page'] == 1) disabled @endif">
                        <a class=""
                            href="{{ route('books', ['page' => $pagination['previousPage']]) }}">
                            <i class="fa fa-angle-left pe-2"></i> Previous
                        </a>
                    </li>
                    @foreach ($pagination['pageButtonArray'] as $paginationlink)
                    <li class="page-item @if ($paginationlink['page_number'] == $pagination['page']) active @endif">
                        <a class="page-link"
                            href="{{ $paginationlink['pageLink'] }}">{{ $paginationlink['page_number'] }}</a>
                    </li>
                    @endforeach
                    <li class="page-item btn btn-outline-primary py-1 ms-3 @if ($pagination['page'] == $pagination['totalPages']) disabled @endif">
                        <a class="" href="{{ route('books', ['page' => $pagination['nextPage']]) }}">
                            Next <i class="fa fa-angle-right ps-2"></i>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
  @endsection