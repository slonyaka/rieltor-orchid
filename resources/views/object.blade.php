@extends('layouts.app')

@section('content')
    <div class="object-top" style="background: url({{$object->image}}) center center no-repeat;">
        <div class="container">
            <div class="row align-items-center">
                <div class="left-content col">
                    <h1>{{ $object->name }}</h1>
                    <div class="address">
                <span class="icon">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                </span>
                        {{ $object->address }}
                    </div>
                </div>
                <div class="right-content col">
                    <h3>{{ __('Contact agent') }}</h3>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="" class="form-label">{{ __('Your name') }}</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{ __('Your phone') }}</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label">{{ __('Your email') }}</label>
                            <input type="email" name="email" class="form-control">
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="object-description">
            <h2 class="pt-5 pb-3 mb-4 border-bottom">{{ __('Description') }}</h2>

            <div class="object-content">
                {!! strip_tags($object->description, '<p>') !!}
            </div>
        </div>

        <div class="object-gallery">
            <h2 class="pt-5 pb-3 mb-4 border-bottom">{{ __('Gallery') }}</h2>

            <div class="object-gallery-content">
                <div class="slick-carousel" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "dots": true, "arrows": false,"centerMode": true, "variableWidth": true, "infinite": true}'>
                @foreach($images as $key => $image)
                    <div>
                        <img class="carousel-image" src="{{ $image->url }}" alt="{{$image->alt ?? $object->name }}">
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="object-details">
            <h3>{{ __('Details') }}</h3>
        </div>
    </div>
@endsection()