@extends ('master')

@section('content')
    @include ("Mistake.create")
    @forelse ($mistakes as $mistake)
        <div>{{$mistake->name}} - ${{$mistake->iteration}}</div>
    @empty
        You have no mistakes at this time.
    @endforelse
@endsection
