@extends('base')

@section('content')

<style>
    .position-relative{
        
        border-bottom-right-radius: 15px;
        background-color: #92959a;
    }
</style>
    <!-- Featured Start -->
    <div class="container-fluid pt-5">

        <div class="row px-xl-5 pb-3 position-relative text-center text-md-right text-white mb-1 py-5 px-5">
            @foreach ($booksres as $book)
            <div class="col-lg-2 col-md-6 col-sm-6 col-12">
                <div class="product-categories-wrap product-categories-border mb-15">
                    <blockquote class="blockquote" style="text-align: center;">
                    <a href="{{ route('book.detail', $book->id)}}">
                        <img class="margin-right-15 width-hight" width="95" height="95" align="left" src="{{url('images/books/'.$book->image)}}"
                        title="{{ $book->title }}">
                    </a>
                    </blockquote>
                </div>
            </div>
            @endforeach
        </div>

    </div>
    <!-- Featured End -->

     <!-- Footer Start -->
     <div class="container-fluid bg-secondary mt-1 pt-1">
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left">
                    &copy; <a class="font-weight-semi-bold text-white" href="#">Your Site Name</a>. All Rights Reserved. Designed
                    by
                    <a class="font-weight-semi-bold" href="https://htmlcodex.com">HTML Codex</a><br>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
    </div>
    <!-- Footer End -->

@endsection