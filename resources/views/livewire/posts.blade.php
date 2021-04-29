<div>    
  <!-- Search Box -->
  <div class="input-group col-sm-12 w-50 w-sm-100 m-auto my-4">
      <input type="text" class="form-control form-control-sm" wire:model.defer="keyword" placeholder="بحث"/>
      <button class="btn btn-sm btn-secondary mx-1" wire:click="search" type="submit">
          <i class="fa fa-search"></i>
      </button>                        
  </div>
  <br>
  <!-- the word is searched -->
  @isset($keyword)
    <p class="text-white bg-success p-2">{{$keyword}}</p>
  @endisset
  <!-- Blog Post -->
  {{-- @includeWhen(!count($posts), 'alerts.empty', ['msg' => 'لإتوجد منشورات']) --}}
  @forelse ($posts as $post)
    <div class="card mb-4">
      <img class="card-img-top w-50 m-auto pt-3" src="{{$post->image_path }}" alt="{{$post->title }}">
      <div class="card-body">
        <h3 class="card-title">{{ $post->title }}</h3>
        <p class="card-text">
          {!! Illuminate\Support\str::limit($post->body, 200 ,"...") !!}
        </p>
        <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary">المزيد </a>
      </div>
      <div class="card-footer text-muted">
        نشر  {{ $post->created_at->diffForHumans() }} - 
        بواسطة <i class="fab fa-algolia"></i><a href="{{ route('getByUser',$post->user->id)  }}">{{$post->user->name }}</a>
      </div>
    </div>
  @empty
    @isset($keyword)
     <p class="text-white bg-warning p-2">لإيوجد مقالة بهذا النص : {{$keyword}}</p>
    @endisset
    <h2 class="alert alert-secondary text-center">لإتوجد منشورات</h2>
  @endforelse 

  <!-- Pagination -->
  <ul class="pagination justify-content-center mb-4">
    {{$posts->links('pagination::bootstrap-4')}}
  </ul>
</div>
