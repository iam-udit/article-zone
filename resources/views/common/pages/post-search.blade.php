
<!--========================== extend-master-blade ==========================-->
@extends('layouts.frontend.app')

@section('title')
    {{ $query }}
@endsection

<!--========================== include content ==========================-->
@section('content')
    <!--============================== slider-area-start ================================-->
    <section class="slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="slider-content-2 text-center">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h1 class="display-flex">Searched Item : "{{ $query }}"</h1>
                                        <p class="lead">{{ $searchedPosts->total() }} posts found !</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========================== categories-area-start ==========================-->
    <section class="categories-area">
        @include('common.base.pages.post-list', ['posts' => $searchedPosts])
    </section>
@endsection
