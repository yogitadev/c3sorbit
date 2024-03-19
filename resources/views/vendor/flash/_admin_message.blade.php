@push('page_js')
    @foreach (session('flash_notification', collect())->toArray() as $message)
        @if ($message['overlay'])
            @include('flash::modal', [
                'modalClass' => 'flash-modal',
                'title'      => $message['title'],
                'body'       => $message['message']
            ])
        @else
            <script type="text/javascript">
                $.notify({
                    title: '',
                    message: '{!! $message['message'] !!}',
                },{
                    type: '{{ $message['level'] }}',
                    allow_dismiss: true,
                    delay: 10000,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                });
            </script>
        @endif
    @endforeach
    {{ session()->forget('flash_notification') }}
@endpush
