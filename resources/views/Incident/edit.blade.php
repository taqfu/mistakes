<form method="POST" action="{{route('incident.update', ['id'=>$incident->id])}}" id='edit-incident{{$incident->id}}' class='hidden'>
    {{csrf_field()}}
    {{method_field("PUT")}}
    <div class='row'>
      <textarea class='col-xs-6'>{{$incident->description}}</textarea>
    </div>
    <input type='submit' class='btn btn-primary' />
    <input type='button' class='btn btn-primary cancel-button' id='cancel-edit-incident{{$incident->id}}'/>
</form>
