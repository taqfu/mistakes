@foreach ($errors->all() as $error)
    <div class='error_msg'>
        {{$error}}
    </div>
@endforeach
<form method="POST" action="{{route('mistake.store')}}" class='row hidden' id='create-mistake'>
    {{csrf_field()}}
    <div class='col-xs-12'>
        Name:
    </div><div class='col-xs-12'>
        <input type='text' name='name' class='col-xs-12 col-md-6'/>
    </div>
    <div class='col-xs-12'>
        Description:
    </div><div class='col-xs-12'>
        <textarea name='incident' class='col-xs-12 col-md-6'></textarea>
    </div><div class='col-xs-12'>
        <input type='submit' class='btn btn-primary'/>
        <input type='button' class='cancel-button btn btn-primary' id='cancel-create-mistake' value='Cancel'/>
    </div>
</form>
<input type='button' class='show-button btn btn-primary' id='show-create-mistake' value='New Mistake'/>
