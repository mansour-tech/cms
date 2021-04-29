@extends('admin.template')

@section('breadcrumb')
         المنشورات
@endsection

@section('content')

    <div class="container-fluid">
      <div class="card mb-3">
        @include('alerts.success')
        <div class="card-header">
          <i class="fa fa-table"></i>  المنشورات
          </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>الرقم</th>
                  <th>العنوان</th>
                  <th>الإسم اللطيف</th>
                  <th> المحتوى</th>
                  <th>الكاتب  </th>
                  <th>نشر  </th>
                  <th>التصنيف  </th>
                </tr>
              </thead>
              <tbody>
              @foreach($posts as $post)
                <tr>
                  <td>{{$post->id}}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{$post->slug}}</td>
                  <td>{{\Illuminate\Support\str::limit($post->body, 100 ,"...")}}</td>
                  <td>{{$post->user->name}}</td>
                  <td><input type="checkbox" value="{{$post->approved}}" {{$post->approved ? 'checked' : ''}}></td>
                  <td>{{$post->category->title}}</td>
                  <td>
                    <a href="{{ route('posts.edit',$post->id) }}">
                      <i class="fa fa-edit fa-2x"></i>                                
                    </a>
                  </td>
                  <td>
                    <form method="post" action="{{ route('posts.destroy',$post->id) }}">
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
          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            {{$posts->links('pagination::bootstrap-4')}}
          </ul>
        </div>
        <div class="card-footer small text-muted"></div>
      </div>
    </div>
 
@endsection

@section('script')

@endsection