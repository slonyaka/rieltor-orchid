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
                    <div class="price">
                        {{ number_format($object->price) }} {{__('rur.')}}
                    </div>
                </div>
                <div class="right-content col">
                    
                    <div class="agent py-3">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <img class="img-responsive" src="{{ $object->user->meta->avatar  }}" alt="">
                            </div>
                            <div class="col-8">
                                <a href="{{ route('agent.landing', ['slug' => $object->user->getUrlAlias()]) }}"> <b> {{ $object->user->meta->full()  }}</b></a>
                                <br>
                                {{ $object->user->meta->company ?? '' }}
                            </div>
                        </div>
                    </div>

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

        @if($images->count())
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
        @endif
    </div>

    <div class="container">
        <div class="object-details">
            <h2  class="pt-5 pb-3 mb-4 border-bottom">{{ __('Details') }}</h2>

            <div class="object-details-content">
                <div class="row">
                    <div class="col-sm-4 text-center py-4">
                        <h3>{{__('Room count')}}</h3>
                        <p>
                            {{ $object->room_count }}
                        </p>
                    </div>
                    <div class="col-sm-4 text-center py-4">
                        <h3>{{__('Floor')}}</h3>
                        <p>
                            {{ $object->floor }}
                        </p>
                    </div>
                    <div class="col-sm-4 text-center py-4">
                        <h3>{{__('Full square')}}</h3>
                        <p>
                            {{ $object->square_full }} м<sup>2</sup>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($object->street_view))
    <div class="container py-5">
        <h2 class="pt-5 pb-3 mb-4 border-bottom">{{ __('Panorum') }}</h2>
        <div class="street-view text-center">
            <iframe class="embed-responsive" src="{{ $object->street_view }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    @endif

    @if(!empty($object->youtube_link))
        <div class="container py-5">
            <h2 class="pt-5 pb-3 mb-4 border-bottom">{{ __('Video') }}</h2>
            <div class="street-view text-center">
                <iframe class="embed-responsive" src="{{ $object->youtube_link }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    @endif

@endsection()