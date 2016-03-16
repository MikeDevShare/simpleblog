@include('header')
<div class="container">
    @if (Session::has('message'))
        <div class="flash alert-info">
            <p class="panel-body">
               {{ Session::get('message') }}
            </p>
    </div>
    @endif
    @if ( isset($errors) && $errors->any() )
        <div class='flash alert-danger'>
            <ul class="panel-body">
            @foreach ( $errors->all() as $error )
                <li>
                    {{ $error }}
                </li>
            @endforeach
            </ul>
        </div>
    @endif
</div>
@include('footer')
