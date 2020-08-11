<div class="py-3 d-block">
    <div class="row">
        @foreach($objects as $object)
            <div class="col-12 col-sm-4 pb-3 object-item">
                <div class="image">
                    <a href="{{ route('platform.object.edit', ['id' => $object->id]) }}">
                        <img class="img img-responsive" src="{{ $object->image }}" alt="">
                    </a>
                </div>
                <div class="name"><a href="{{ route('platform.object.edit', ['id' => $object->id]) }}">{{ $object->name }}</a></div>
                <div class="price">@lang('Price'): {{ number_format($object->price) }}  {{ __('rur.') }}</div>

                <div class="data small">
                    @lang('Floor'): {{ $object->floor }}
                </div>
                <div class="data small">
                    @lang('Room count'): {{ $object->room_count }}
                </div>

                <div class="actions pt-2">
                    <a href="{{ $object->getRoute()  }}" title="@lang('View')">
                        <i class="icon-eye mr-2"></i>
                    </a>
                    <a data-turbolinks="true" href="{{ route('platform.object.edit', ['id' => $object->id]) }}"  title="@lang('Edit')">
                        <i class="icon-pencil mr-2"></i>
                    </a>

                    <button type="button" class="object-modal-link"
                            title="@lang('Get link')"
                            data-action="screen--base#targetModal"
                            data-modal-title="@lang('Get link')"
                            data-modal-key="linkModals"
                            data-modal-async="asyncGetObjectLink"
                            data-modal-params='@json(['object_id' => $object->id])'
                            data-modal-action="">
                        <i class="icon-link mr-2"></i>
                    </button>

                </div>
            </div>
        @endforeach
    </div>
</div>