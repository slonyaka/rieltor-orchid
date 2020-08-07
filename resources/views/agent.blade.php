@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="top py-5">
            <h1 class="text-center">{{ $user->meta->firstname }} {{ $user->meta->lastname }}</h1>
        </div>

        <div class="agent-info">
            <div class="row">
                <div class="details col-sm-6">
                    <div class="row">
                        <div class="avatar col-sm-4">
                            <img class="img-responsive" loading="lazy" width="500" height="500" src="{{ $user->meta->avatar }}" alt="{{ $user->meta->firstname }} {{ $user->meta->lastname }}">
                        </div>
                        <div class="data col-sm-8">
                            <p class="full-name">
                                {{ $user->meta->firstname }} {{ $user->meta->lastname }}
                            </p>
                            <p class="email">
                                {{ $user->email }}
                            </p>
                            <p class="phone">
                                {{ $user->meta->phone }}
                            </p>
                            <p class="company">{{ $user->meta->company }}</p>
                            <p class="address">{{ $user->meta->address }}</p>
                        </div>
                    </div>
                </div>
                <div class="contact-form col-sm-6">
                    <form action="">
                        <div class="form-group">
                            <label for="">{{ __('Your name') }}</label>
                            <input type="text" name="name">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection()