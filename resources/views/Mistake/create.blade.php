@foreach ($errors->all() as $error)
    <div class='error_msg'>
        {{$error}}
    </div>
@endforeach
<form method="POST" action="{{route('mistake.store')}}" clas='row hidden'>
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
        <input type='button' class='cancel-button btn btn-primary' id='hide-create-mistake' value='Cancel'/>
    </div>
</form>
<input type='button' class='hide-button btn btn-primary' id='hide-create-mistake' value='New Mistake'/>
