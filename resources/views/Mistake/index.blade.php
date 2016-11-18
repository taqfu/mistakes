
@extends ('master')

@section('content')
    <div class='lead'>
    @include ("Mistake.create")
        ${{$total_due}} This Week
    </div>
    @forelse ($mistakes as $mistake)
        <?php
            $this_date = date("m/d/y", strtotime($mistake->updated_at));
            $total_for_mistake = \App\Mistake::total_due_for_mistake($mistake->id);
        ?>
        @if ($this_date!=$last_date)
            <h2 class='text-center'><strong>
                {{$this_date}}
            </strong></h2>
            <?php 
                $last_date = $this_date;
            ?> 
        @endif
            <div>
                {{$mistake->name}} - {{$mistake->total}}
                (+${{$total_for_mistake}})
                <input type='button' class='btn-link show-button' value='[ + ]'
                  id='show-incidents{{$mistake->id}}'/>
                <input type='button' class='btn-link hidden hide-button' value='[ - ]'
                  id='hide-incidents{{$mistake->id}}'/>
                <input type='button' class='btn btn-primary show-button' value='New'
                  id='show-create-incident{{$mistake->id}}' />
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
    @empty
        You have no mistakes at this time.
    @endforelse
@endsection
