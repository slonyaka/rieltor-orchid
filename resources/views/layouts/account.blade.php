<div class="row py-3">
    @if(!empty($avatar))
    <div class="col-sm-3">
        <div class="avatar">

            <img src="{{$avatar}}" alt="">

        </div>
    </div>
    @endif
    <div class="col-sm-9">
        <p>
            {{ $full_name }}
        </p>
        <p>
            {{ $email }}
        </p>
        <p>
            {{ $phone }}
        </p>
        <p>
            {{ $company }}
        </p>
        <p>
            {{ $address }}
        </p>
    </div>
</div>