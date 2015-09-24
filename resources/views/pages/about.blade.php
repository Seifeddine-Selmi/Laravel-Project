@extends("default")

@section('title', $title)
@section("content")
    <h1>{{$title}}</h1>
    <!--<h1>{!!$title!!}</h1>  pour passer du code html-->
    <p>Un framework PHP élégant puissant et robuste</p>

    <ul>
        @foreach($numbers as $number)
            <li>
                {{$number}}
            </li>
        @endforeach

            @forelse($numbers as $number)
                <li>
                    {{$number}}
                </li>
            @empty
                <li>
                    Aucun chiffre
                </li>
            @endforelse
    </ul>
@endsection

@section("slidebar")
      @parent
    <p>Un framework PHP élégant puissant et robuste</p>
@endsection