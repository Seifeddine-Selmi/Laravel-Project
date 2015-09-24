@extends("default")

@section('content')

    <h1>Bravo !</h1>

    <p>
        <a class="btn btn-primary" href="{{ action('LinksController@show', ['id' => $link->id]) }}">
            {{ route('link.show', $link) }}
            <!-- /r/ : redirect -->
            <!--/r/{{$link->id}} -->

        </a>
    </p>

@stop