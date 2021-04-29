@extends('admin.template')

@section('breadcrumb')
        إضافة مستخدم جديد
@endsection

@section('content')

    <div class="container-fluid">
      <div class="card mb-3">
        @include('alerts.success')
        <div class="card-header">
          <i class="fa fa-table"></i>  
          <form method="post" action="{{ route('user.store') }}">
          @csrf
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" name="name" placeholder="الإسم">
            </div>
            <div class="col">
              <input type="text" class="form-control" name="email" placeholder="الإيميل">
            </div>
            <div class="col">
              <input type="password" class="form-control" name="password" placeholder="كلمة السر">
            </div>
            <div class="col">
                <select name="role_id" class="form-control">
                    @include('lists.roles')
                </select>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary">حفظ </button>
            </div>
          </div>
        </form>
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>الرقم</th>
                  <th>الإسم</th>
                  <th>الإيميل </th>
                  <th>تاريخ التفعيل </th>
                  <th>الدور  </th>
                  <th>تاريخ الإنشاء  </th>
                  <th>تاريخ التعديل  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->email_verified_at}}</td>
                  <td>{{$user->role->role}}</td>
                  <td>{{$user->created_at}}</td>
                  <td>{{$user->updated_at}}</td>
                  <td>
                    <a href="#">
                        <i class="fa fa-edit fa-2x"></i>     
                    </a>
                  </td>
                  <td>
                    <form method="post" action="{{ route('user.destroy',$user->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-link"><i class="fa fa-trash fa-2x"></i></button>       
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
 
@endsection

@section('script')

@endsection