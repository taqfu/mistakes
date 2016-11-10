<form method="POST" action="{{route('incident.update', ['id'=>$incident->id])}}" id='edit-incident{{$incident->id}}' class='hidden'>
    {{csrf_field()}}
    {{method_field("PUT")}}
    <textarea>{{$incident->description}}</textarea>
    <input type='submit' class='btn btn-primary' />
    <input type='button' class='btn btn-primary' class='btn-cancel' id='cancel-edit-incident{{$incident->id}}'/>
</form>
