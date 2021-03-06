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
                    
                    <form action="" method="post" class="contact-form">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="{{ __('Your name') }}">
                        </div>

                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="{{ __('Your phone') }}">
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('Your email') }}">
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="obgect-page">
        <div class="container">
            <div class="object-description">
                <h2 class="pt-5 pb-3 mb-4">{{ __('Description') }}</h2>

                <div class="object-content">
                    {!! strip_tags($object->description, '<p>') !!}
                </div>
            </div>

            @if($images->count())
                <div class="object-gallery">
                    <h2 class="pt-5 pb-3 mb-4">{{ __('Gallery') }}</h2>

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

        <div class="object-details">
            <div class="container">

                <h2  class="pt-5 pb-3 mb-4">{{ __('Details') }}</h2>

                <div class="object-details-content">
                    <div class="row justify-content-center">
                        <div class="col-sm-3 text-center py-4">
                            <h3>{{__('Room count')}}</h3>
                            <p>
                                {{ $object->room_count }}
                            </p>
                        </div>
                        <div class="col-sm-3 text-center py-4">
                            <h3>{{__('Floor')}}</h3>
                            <p>
                                {{ $object->floor }}
                            </p>
                        </div>
                        <div class="col-sm-3 text-center py-4">
                            <h3>{{__('Full square')}}</h3>
                            <p>
                                {{ $object->square_full }} м<sup>2</sup>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="embed-toggle">
            <h2 class="header">
                @if(!empty($object->street_view))
                    <span class="embed-toggler active" data-toggle=".toggle-item-street-view">{{ __('Panorum') }}</span>
                @endif
                    @if(!empty($object->street_view) && !empty($object->youtube_link))
                        /
                    @endif
                @if(!empty($object->youtube_link))
                        <span class="embed-toggler @if(empty($object->street_view)) active @endif" data-toggle=".toggle-item-youtube">{{ __('Video') }}</span>
                @endif
            </h2>

            <div class="toggle-content">
                @if(!empty($object->street_view))
                <div class="toggle-item toggle-item-street-view active">
                    <div class="container py-5">
                        <div class="toggle-view text-center">
                            <iframe class="embed-responsive" src="{{ $object->street_view }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                @endif
                @if(!empty($object->youtube_link))
                <div class="toggle-item toggle-item-youtube @if(empty($object->street_view)) active @endif">
                    <div class="container py-5">
                        <div class="toggle-view text-center">
                            <iframe class="embed-responsive" src="{{ $object->youtube_link }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>

        {{-- One bi contac section left part agent right part form --}}

        <div class="contact-section py-5">
            <div class="container">
                <div class="object-agent-info">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="details col-sm-8 col-12">
                                <div class="row">
                                    <div class="avatar col-sm-4">
                                        <img class="img-responsive" loading="lazy" width="500" height="500" src="{{ $object->user->meta->avatar }}" alt="{{ $object->user->meta->full() }}">
                                    </div>
                                    <div class="data col-sm-8">
                                        <h3 class="full-name">
                                            {{ $object->user->meta->full() }}
                                        </h3>
                                        <p class="email">
                                            <b>{{ __('Email') }}:</b> {{ $object->user->email }}
                                        </p>
                                        <p class="phone">
                                            <b>{{ __('Phone') }}:</b> {{ $object->user->meta->phone }}
                                        </p>
                                        <p class="company"><b>{{ __('Company') }}:</b> {{ $object->user->meta->company }}</p>
                                        <p class="address"><b>{{ __('Address') }}:</b> {{ $object->user->meta->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form col-sm-4 col-12">
                                <h3>{{ __('Contact agent') }}</h3>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="{{ __('Your name') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="phone" class="form-control" placeholder="{{ __('Your phone') }}">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="{{ __('Your email') }}">
                                    </div>

                                    <div class="form-group text-center">
                                        <button class="btn btn-primary" type="submit">{{ __('Submit') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()