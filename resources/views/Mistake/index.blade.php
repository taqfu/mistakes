@extends ('master')

@section('content')
    @include ("Mistake.create")
    @forelse ($mistakes as $mistake)
        <div class='row'>
            <div>
                {{$mistake->name}} - ${{$mistake->iteration}}
                <input type='button' class='btn btn-primary show-button' value='New'
                  id='show-create-incident{{$mistake->id}}' />
                <input type='button' class='btn-link show-button' value='[ + ]'
                  id='show-incidents{{$mistake->id}}'/>
                <input type='button' class='btn-link hidden hide-button' value='[ - ]'
                  id='hide-incidents{{$mistake->id}}'/>
            </div>
            @include ('Incident.create')
            <div id='incidents{{$mistake->id}}' class='margin-left hidden'>
                @foreach($mistake->incidents as $incident)
                    <div class='well'>
                        <strong>{{date('m/d/y g:i', strtotime($incident->when))}}</strong>
                        - {{$incident->description }}
                        @include ('Incident.destroy')
                        <input type='button' class='btn btn-primary show-button' value='Edit' id='show-edit-incident{{$incident->id}}'/>
                    </div>
                    @include ('Incident.edit')
                @endforeach
            </div>
        </div>
    @empty
        You have no mistakes at this time.
    @endforelse
@endsection
