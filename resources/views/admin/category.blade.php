@extends('admin.template')

@section('breadcrumb')
        إضافة تصنيف
@endsection

@section('content')

    <div class="container-fluid">
      <div class="card mb-3">
        @include('alerts.success')
        <div class="card-header">
        <i class="fa fa-table"></i> إضافة التصنيفات
          <form method="post" action="{{ route('category.store') }}">
          @csrf
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="الرقم">
            </div>
            <div class="col">
              <input type="text" class="form-control" name="title" placeholder="التصنيف">
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
                  <th>التصنيف</th>
                  <th>الإسم اللطيف</th>
                  <th>تاريخ الإنشاء</th>
                  <th>تاريخ التعديل </th>
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr>
                  <td>{{$category->id}}</td>
                  <td>{{ $category->title }}</td>
                  <td>{{$category->slug}}</td>
                  <td>{{$category->created_at}}</td>
                  <td>{{$category->updated_at}}</td>
                  <td>
                    <a href="#">
                      <i class="fa fa-edit fa-2x"></i>       
                    </a>
                  </td>
                  <td>
                    <form method="post" action="{{ route('category.destroy',$category->id) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-link"><i class="fa fa-trash fa-2x"></i> </button>       
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