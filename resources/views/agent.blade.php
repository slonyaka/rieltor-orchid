@extends('layouts.app')

@section('content')

    <div class="agent-top" style="background: url({{$user->meta->profile_image}}) center center no-repeat;">
        <h1 class="text-center">{{ $user->meta->firstname }} {{ $user->meta->lastname }}</h1>
    </div>

    <div class="container">
        <div class="agent-info">
            <div class="container-fluid">
                <div class="row">
                    <div class="details col-sm-8 col-12">
                        <div class="row">
                            <div class="avatar col-sm-4">
                                <img class="img-responsive" loading="lazy" width="500" height="500" src="{{ $user->meta->avatar }}" alt="{{ $user->meta->firstname }} {{ $user->meta->lastname }}">
                            </div>
                            <div class="data col-sm-8">
                                <h2 class="full-name">
                                    {{ $user->meta->firstname }} {{ $user->meta->lastname }}
                                </h2>
                                <p class="email">
                                    <b>{{ __('Email') }}:</b> {{ $user->email }}
                                </p>
                                <p class="phone">
                                    <b>{{ __('Phone') }}:</b> {{ $user->meta->phone }}
                                </p>
                                <p class="company"><b>{{ __('Company') }}:</b> {{ $user->meta->company }}</p>
                                <p class="address"><b>{{ __('Address') }}:</b> {{ $user->meta->address }}</p>
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

    <div class="container">
        <h2 class="about-me pt-5 pb-3 mb-4 border-bottom">{{ __('About me') }}</h2>

        <div class="agent-content">
            {!! strip_tags($user->meta->description, '<p>') !!}
        </div>
    </div>

    <div class="container">
        <div class="about-me pt-5 pb-3 mb-4 border-bottom">
            <h2>{{ __('My objects') }}</h2>
        </div>

        <div class="agent-objects row">
            @foreach($user->objects as $object)
            <div class="col-sm-6 col-md-6 col-xl-4">
                <div class="single-object">
                    <a class="img-holder" href="{{ route('object.view', ['slug' => $object->getUrlAlias()]) }}">
                        <img class="img img-responsive" src="{{ $object->image }}" alt="">
                    </a>

                    <div class="content">
                        <h3>
                            <a href="{{ route('object.view', ['slug' => $object->getUrlAlias()]) }}">{{ $object->name }}</a>
                        </h3>

                        <div class="location">
                        <span class="icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-geo-alt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            </svg>
                        </span>
                            <span class="place">{{$object->address}}</span>
                        </div>

                        <div class="row features py-3">
                            <div class="col-sm-6">
                                <b>{{ __('Square') }}: </b>
                                <span>{{ $object->square_full }} м<sup>2</sup></span>
                            </div>
                            <div class="col-sm-6">
                                <b>{{ __('Rooms') }}: </b>
                                <span>{{ $object->room_count }}</span>
                            </div>
                            <div class="col-sm-6">
                                <b>{{ __('Floor') }}: </b>
                                <span>{{ $object->floor }}</span>
                            </div>
                        </div>

                        <div class="price mt-2 border-top pt-2 text-right">
                            {{ number_format($object->price) }} {{ __('rur.') }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection()