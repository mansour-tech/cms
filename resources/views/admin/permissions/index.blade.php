@extends('admin.template')

@section('breadcrumb')
        تعيين الصلاحيات إلى الأدوار 
@endsection

@section('content')
    <div class="container-fluid">
      <div class="card mb-3">
      @include('alerts.success')
      <form method="post" action="{{ route('permissions') }}">
          @csrf
          <div class="card-header">
            <div class="col-lg-6 form-group">
                <label for="role_id">حدد الدور </label>
                <select name="role_id" id="role_id" class="form-control">
                  @include('lists.roles')
                </select>
            </div>
          </div>
          <div class="card-body row">
              @foreach($permissions as $permission)
                <div class="col-lg-4"> 
                  <label for="permission"> {{-- [] <-- علشان تختار اكثر من دور بدونهم بيتم اختيار دور واحد فقط --}}
                    <input type="checkbox" class="" name="permission[]" value="{{$permission->id}}" {{$permission->roles()->find(1)? 'checked' : ''}}>
                    {{$permission->desc}}
                  </label>
                </div>
              @endforeach
          </div>
          <div class="card-footer small text-muted">
              <input type="submit" class="btn btn-primary" name=""  value="حفظ" >
          </div>
        </form>
      </div>
    </div>
@endsection

@section('script')
<script src ="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  $('#role_id').on('change', function(event){
    var role_id = $(this).val();
      $.ajax({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: '{{ route("permission_byRole") }}',
          type: 'post',
          data: {
            'id': role_id
          },
          success: function(data)
          {
            $('input[type=checkbox]').each(function () {
                var ThisVal =parseInt(this.value) ; 
                if(data.includes(ThisVal))
                  this.checked = true;
                else
                  this.checked = false;
            }); 
          }               
      })
  });
</script>
@endsection