<form method='POST' action="{{route('tag.destroy', ['id'=>$tag->id])}}" class='inline'>
    {{csrf_field()}}
    {{method_field("DELETE")}}
    <input type="submit" class='btn btn-danger' value='X' />
    {{$tag->type->name}}
</form>
