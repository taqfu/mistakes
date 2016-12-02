<div id='create-tag{{$mistake->id}}' class='create-tag hidden'>
    @foreach ($tag_types as $tag_type)
        <form method="POST" action="{{route('tag.store')}}" class='inline'>
            {{csrf_field()}}
            <input type='hidden' name='tagType' value='{{$tag_type->id}}' />
            <input type='hidden' name='mistakeID' value='{{$mistake->id}}' />
            <input type='submit' value='{{$tag_type->name}}' class='btn btn-default'/>
        </form>
    @endforeach
</div>
