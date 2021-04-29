<div>
    <div class="form-group">
        <textarea class="form-control" rows="5"  wire:model="body" ></textarea>
    </div>
    <button type="submit" wire:click="store({{ $post->id }})" class="btn btn-primary">إرسال</button>
    @foreach($comments as $comment)
        <div id="comments" class="card my-3">
            <div class="card-body">
            <img class="avatar" src="{{ asset('/storage/avatars/avatar.png') }}" alt="">
            <h5 class="card-title">{{$comment->user->name}}</h5>
            {{$comment->created_at = strtotime('created_at')}}
            <h6 class="card-subtitle mb-2 text-muted">{{$comment->created_at->diffForHumans()}} - {{ date('d-m-Y') }}</h6>
            <p class="card-text">{{$comment->body}}</p>
            </div>
        </div>
    @endforeach 
</div>
