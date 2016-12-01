<form method="POST" action="{{route('TagType.destroy', ['id'=>$tag_type->id])}}" class='inline'>
    {{csrf_field()}}
    {{method_field('DELETE')}}
    <input type='submit' value='X' class='btn btn-danger' />
    {{$tag_type->name}}
</form>
