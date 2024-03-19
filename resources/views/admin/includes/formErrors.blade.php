@if ($errors->any())
    <div class="alert alert-danger">
        <div class="alert-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </div>
        <div class="clear"></div>
    </div>
@endif
