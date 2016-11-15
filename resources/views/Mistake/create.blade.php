@foreach ($errors->all() as $error)
    <div class='error_msg'>
        {{$error}}
    </div>
@endforeach
<form method="POST" action="{{route('mistake.store')}}" clas='row'>
    {{csrf_field()}}
    <div class='col-xs-12'>
        Name:
    </div><div class='col-xs-12'>
        <input type='text' name='name' class='col-xs-6'/>
    </div>
    <div class='col-xs-12'>
        Description:
    </div><div class='col-xs-12'>
        <textarea name='incident' class='col-xs-6'></textarea>
    </div><div class='col-xs-12'>
        <input type='submit' class='btn btn-primary'/>
    </div>
</form>
