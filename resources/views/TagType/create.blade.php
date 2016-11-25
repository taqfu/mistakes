<form method="POST" action="{{route('TagType.store')}}">
    {{csrf_field()}}
    <input type='text' name='newTagType' required/>
    <input type='submit' value='New Tag'/>
</form>
