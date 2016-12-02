<form method="POST" action="{{route('mistake.destroy', ['id'=>$mistake->id])}}" 
  class='inline hidden margin-left' id='destroy-mistake{{$mistake->id}}'>
    {{csrf_field()}}
    {{method_field('delete')}}
            <label>Why?</label>
            <input type='text' class='' name='deactivation_reason' />
            
            <input type='submit' value='Delete' class='btn btn-danger ' />
</form>
