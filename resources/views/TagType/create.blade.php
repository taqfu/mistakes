<form method="POST" action="{{route('TagType.store')}}" class='hidden' id='create-tag-type'>
    <div class='col-md-3'

    {{csrf_field()}}
    <div class='form-group'>
        <label>Tag:</label>
        <input type='text'  class='form-control' name='newTagType' required/>
    </div>
    <div class='form-group text-right'>
        <input type='button' class='btn btn-primary cancel-button' id='cancel-create-tag-type' value='Cancel'/>
        <input type='submit' value='New Tag' class='btn btn-primary' />
    </div>
    </div>
    <div class='col-md-9'></div>
    @include('TagType.index')
</form>
