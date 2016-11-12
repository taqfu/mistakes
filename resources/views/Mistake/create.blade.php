@foreach ($errors->all() as $error)
    <div class='error_msg'>
        {{$error}}
    </div>
@endforeach
<form method="POST" action="{{route('mistake.store')}}">
    {{csrf_field()}}
    <div>
    Name:
    </div><div>
        <input type='text' name='name' class='col-xs-6'/>
    </div><div>
    Description:
    </div><div>
        <textarea name='incident' class='col-xs-6'></textarea>
    </div><div>
    </div><div>
        <input type='submit' />
    </div>
</form>
