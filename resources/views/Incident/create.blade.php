<form method="POST" action="{{route('incident.store')}}" id='create-incident{{$mistake->id}}' class='hidden'>
    {{csrf_field()}}
    <input type='hidden' name='mistake_id' value="{{$mistake->id}}"/>
    <div class='row'>
        <textarea name='description' class='col-xs-6'></textarea>
    </div><div>
        <input type='submit' class='btn btn-primary'/>
    </div>
</form>
