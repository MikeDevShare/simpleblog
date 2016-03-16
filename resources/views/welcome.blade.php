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
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>@yield('title')</h2>
                    @yield('title-meta')
                </div>
                    <div class="panel-body">
                    @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
