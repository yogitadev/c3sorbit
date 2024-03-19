@push('page_js')
    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if ($message['overlay'])
            @include('flash::modal', [
                'modalClass' => 'flash-modal',
                'title' => $message['title'],
                'body' => $message['message'],
            ])
        @else
            <script type="text/javascript">
                $.notify({
                    // options

                    message: '{!! $message['message'] !!}',

                }, {
                    // settings
                    element: 'body',
                    position: null,
                    type: "{{ $message['level'] }}",
                    allow_dismiss: false,
                    newest_on_top: false,
                    showProgressbar: false,
                    placement: {
                        from: "bottom",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 9999,
                    delay: 3300,
                    timer: 5000,
                    url_target: '_blank',
                    mouse_over: null,
                    animate: {
                        enter: 'animated bounceInUp',
                        exit: 'animated bounceOutDown'
                    },
                    onShow: null,
                    onShown: null,
                    onClose: null,
                    onClosed: null,
                    icon_type: 'class',
                });
            </script>
            <?php /*<div class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
            role="alert">
            @if ($message['important'])
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @endif
            {!! $message['message'] !!}
        </div>*/
            ?>
        @endif
    @endforeach

    {{ session()->forget('flash_notification') }}
@endpush
