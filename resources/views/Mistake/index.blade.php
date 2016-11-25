<?php
    use App\Mistake;
 ?>
@extends ('master')

@section('content')
    <div class='lead'>
    @include ("Mistake.create")
        ${{$total_due}} This Week
    </div>
    @include ('TagType.create')
    @include('TagType.index')
    <div class='lead text-center'><strong>
        Current Week - {{date("m/d/y", strtotime('last Sunday'))}} to {{date("m/d/y", strtotime('next Sunday'))}}
    </strong></div>
    @forelse ($mistakes as $mistake)
        <?php
            $all_mistakes_for_this_week = Mistake::fetch_all_mistakes_this_week();
            $this_date = date("m/d/y", strtotime($mistake->updated_at));
            $total_for_mistake = \App\Mistake::total_due_for_mistake($mistake->id);
        ?>
        @if (count($all_mistakes_for_this_week)==0 && !$this_week_cleared)
            <div class='text-center'>None.</div>
        @endif
        @if ((count($all_mistakes_for_this_week)==0 || !in_array($mistake->id, $all_mistakes_for_this_week)) && !$this_week_cleared)
            <hr>
            <?php $this_week_cleared=true; ?>
        @endif
        @if ($this_date!=$last_date)
            <div class='lead text-center'><strong>
                {{$this_date}}
            </strong></div>
            <?php
                $last_date = $this_date;
            ?>
        @endif
            <div>
                {{$mistake->name}} - ${{$mistake->total}}
                (+${{$total_for_mistake}})
                <input type='button' class='btn-link show-button' value='[ + ]'
                  id='show-incidents{{$mistake->id}}'/>
                <input type='button' class='btn-link hidden hide-button' value='[ - ]'
                  id='hide-incidents{{$mistake->id}}'/>
                <input type='button' class='btn btn-primary show-button' value='Incident'
                  id='show-create-incident{{$mistake->id}}' />
                <input type='button' class='btn btn-primary show-button' value='Tag'
                  id='show-create-tag{{$mistake->id}}' />
            </div>
            @include ('Incident.create')
            <div id='incidents{{$mistake->id}}' class='margin-left hidden'>
                @foreach($mistake->incidents as $incident)
                    <div class='well'>
                            @include ('Incident.destroy')
                            <strong>
                                {{date('m/d/y g:i', strtotime($incident->when))}}
                                - ${{$incident->iteration}}
                            </strong>
                            {{$incident->description }}
                            <input type='button' class='btn btn-primary show-button' value='Edit' id='show-edit-incident{{$incident->id}}'/>
                    </div>
                    @include ('Incident.edit')
                @endforeach
            </div>
    @empty
        You have no mistakes at this time.
    @endforelse
@endsection
