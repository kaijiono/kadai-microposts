@if (Auth::user()->id != $user->id)
    @if (Auth::user()->is_favorited($microposts->id))
    {!! Form::open(['route' => ['user.unfavorite', $microposts->id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => "btn btn-danger btn-block"]) !!}
        {!! Form::close() !!}
    
    @else
        {!! Form::open(['route' => ['user.favorite', $user->id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-block"]) !!}
        {!! Form::close() !!}
    @endif
@endif