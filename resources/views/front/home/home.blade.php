@extends('front.master')

@section('title')
    Home
@endsection

@section('body')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                @foreach($sliders as $slider)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} " style="background-image: url('{{ asset($slider->slider_image) }}')">
                        <div class="carousel-caption d-none d-md-block">
                            <h3>{{ $slider->slider_title }}</h3>
                            <p>{{ $slider->slider_para }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <h1 class="my-4">Welcome to Our Blog</h1>

        <!-- Marketing Icons Section -->
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_title }}" class="card-img-top" height="250"/>
                    <h4 class="card-header">{{ $blog->blog_title }}</h4>
                    <div class="card-body">
                        <p class="card-text">{{ $blog->blog_short_description }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('blog-details', ['id'=>$blog->id]) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.row -->

        <!-- Portfolio Section -->
        <h2>Popular Blog</h2>

        <div class="row">
            @foreach($popularBlogs as $popularBlog)
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($popularBlog->blog_image) }}" alt="{{ $popularBlog->blog_title }}" class="card-img-top" height="250"/>
                        <h4 class="card-header">{{ $popularBlog->blog_title }}</h4>
                        <div class="card-body">
                            <p class="card-text">{{ $popularBlog->blog_short_description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('blog-details', ['id'=>$popularBlog->id]) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->

        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-6">
                <h2>Modern Business Features</h2>
                <p>The Modern Business template by Start Bootstrap includes:</p>
                <ul>
                    <li>
                        <strong>Bootstrap v4</strong>
                    </li>
                    <li>jQuery</li>
                    <li>Font Awesome</li>
                    <li>Working contact form with validation</li>
                    <li>Unstyled page elements for easy customization</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>
            </div>
            <div class="col-lg-6">
                <img class="img-fluid rounded" src="http://placehold.it/700x450" alt="">
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
            </div>
            <div class="col-md-4">
                <a class="btn btn-lg btn-secondary btn-block" href="#">Call to Action</a>
            </div>
        </div>

    </div>

@endsection