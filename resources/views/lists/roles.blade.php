@foreach($roles as $role)
    <option value="{{$role->id}}"> {{$role->role}} </option>
@endforeach