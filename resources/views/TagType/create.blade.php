<div class='hidden' id='create-tag-type'>
    <form method="POST" action="{{route('TagType.store')}}">
                {{csrf_field()}}
        <div class='row'>
            <div class='col-md-3'>
    
                <div class='form-group'>
                    <label>Tag:</label>
                    <input type='text'  class='form-control' name='newTagType' required/>
                </div>
                <div class='form-group text-right'>
                    <input type='button' class='btn btn-primary cancel-button' id='cancel-create-tag-type' value='Cancel'/>
                    <input type='submit' value='New Tag' class='btn btn-primary' />
                </div>
            </div>
        </div>
    </form>
    @include('TagType.index')
</div>
