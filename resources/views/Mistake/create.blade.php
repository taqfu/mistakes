@foreach ($errors->all() as $error)
    <div class='error_msg'>
        {{$error}}
    </div>
@endforeach
<form method="POST" action="{{route('mistake.store')}}">
    {{csrf_field()}}
    <div class='row'>
    Name:
    </div><div class='row'>
        <input type='text' name='name' class='col-xs-6'/>
    </div><div class='row'>
    Description:
    </div><div class='row'>
        <textarea name='incident' class='col-xs-6'></textarea>
    </div><div>
        <input type='submit' />
    </div>
</form>
