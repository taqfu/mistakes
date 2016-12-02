<?php
    use App\Mistake;
    $last_week = 0;
 ?>
@extends ('master')

@section('content')
    <div class='lead'>
        <input type='button' class='show-button btn btn-primary' id='show-create-mistake' value='New Mistake'/>
        <input type='button' class='show-button btn btn-primary' id='show-create-tag-type' value='New Tag'/>
    </div>
    @include ("Mistake.create")
    @include ('TagType.create')
    @forelse ($mistakes as $mistake)
        <?php
            $all_mistakes_for_this_week = Mistake::fetch_all_mistakes_this_week();
            $this_date = date("m/d/y", strtotime($mistake->updated_at));
            $this_week = date("W", strtotime($mistake->updated_at));
            $year = date("Y", strtotime($mistake->updated_at));
            $total_for_mistake = \App\Mistake::total_due_for_mistake($mistake->id);
            $week_start = date('m/d/y', strtotime($year . 'W' . sprintf('%02d', $this_week-1) . 7));
            $week_end = date('m/d/y', strtotime($year . 'W' . sprintf('%02d', $this_week) . 6));   
            $num_of_incidents = $mistake->iteration + 1;
        ?>
        @if (count($all_mistakes_for_this_week)==0 && !$this_week_cleared)
            <div class='text-center'>None.</div>
        @endif
        @if ((count($all_mistakes_for_this_week)==0 || !in_array($mistake->id, $all_mistakes_for_this_week)) && !$this_week_cleared)
            <?php $this_week_cleared=true; ?>
        @endif
        @if ($this_week!=$last_week)
            <hr>
            <div class='lead text-center'><strong>
                Week #{{date('W', strtotime($mistake->updated_at))}}
                 - {{$week_start}} to {{$week_end}} - ${{Mistake::fetch_total_due_for_week($this_week, $year)}}
            </strong></div>
            <?php $last_week = $this_week; ?>
        @endif
        @if ($this_date!=$last_date)
            <div class='lead text-center'><strong>
                {{$this_date}}
            </strong></div>
            <?php
                $last_date = $this_date;
            ?>
        @endif
            <div class='margin-top'>
                {{$mistake->name}} - ${{$mistake->total}}
                (+${{$total_for_mistake}})
                - {{$num_of_incidents}} 
                @if ($num_of_incidents==1)
                    incident
                @else 
                    incidents
                @endif
                <input type='button' class='btn-link show-button' value='[ + ]'
                  id='show-incidents{{$mistake->id}}'/>
                <input type='button' class='btn-link hidden hide-button' value='[ - ]'
                  id='hide-incidents{{$mistake->id}}'/>
                <input type='button' class='btn btn-primary show-button'
                  value='Incident' id='show-create-incident{{$mistake->id}}' />
                <input type='button' class='btn btn-info hide-button hidden'
                  id='hide-create-incident{{$mistake->id}}' value='Incident '/>
                <input type='button' class='btn btn-primary show-button' value='Tag'
                  id='show-create-tag{{$mistake->id}}' />
                <input type='button' class='btn btn-info hide-button hidden'
                  value='Tag' id='hide-create-tag{{$mistake->id}}' />
                <input type='button' class='btn btn-primary show-button'
                  value='Delete' id='show-destroy-mistake{{$mistake->id}}' />
                <input type='button' class='btn btn-info hide-button hidden'
                  value='Hide' id='hide-destroy-mistake{{$mistake->id}}' />
                @include ('Mistake.destroy')
            </div>
            @include ('Tag.create')
            @include ('Incident.create')
            <div id='mistake-tags{{$mistake}}' class='mistake-tags' >
                @foreach ($mistake->tags as $tag)
                    @include ("Tag.destroy")
                @endforeach
            </div>
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
