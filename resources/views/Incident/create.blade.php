<form method="POST" action="{{route('incident.store')}}" id='create-incident{{$mistake->id}}' class='hidden'>
    {{csrf_field()}}
    <input type='hidden' name='mistake_id' value="{{$mistake->id}}"/>
    <div>
        <textarea name='description'></textarea>
    </div><div>
        <input type='submit' />
    </div>
</form>
