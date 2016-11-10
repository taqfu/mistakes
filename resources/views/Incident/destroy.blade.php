<form method="POST" action="{{route('incident.destroy', ['id'=>$incident->id])}}" class='inline'>
    {{csrf_field()}}
    {{method_field("DELETE")}}    
    <input type='submit' class='btn btn-danger show-button' value='Delete' />
</form>
