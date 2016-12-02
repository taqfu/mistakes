@foreach ($errors->all() as $error)
    <div class='error_msg'>
        {{$error}}
    </div>
@endforeach
<div class='row hidden' id='create-mistake'>
    <form method="POST" action="{{route('mistake.store')}}" class='col-md-3'>
        {{csrf_field()}}
        <div class='form-group'>
            <label>
                Name:
            </label>
            <input type='text' name='mistakeName' class='form-control'/>
        </div>
        <div class='form-group'>
            <label>
                Description:
            </label>
            <textarea name='incident' class='form-control' rows='4'></textarea>
        </div><div class='form-group text-right'>
            <input type='button' class='cancel-button btn btn-primary' id='cancel-create-mistake' value='Cancel'/>
            <input type='submit' class='btn btn-primary'/>
        </div>
    </form>
</div>
