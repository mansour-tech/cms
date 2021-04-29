<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Http\Request;

class Comments extends Component
{
    public $body;
    public $post;
    public $post_id;



    public function store($postId)
    {

        $body = $this->body;
        $user = auth()->user()->id;
        $post = $postId;

        $data = 
        [
            'body'      =>$body,
            'user_id'   =>$user,
            'post_id'   =>$post,
        ];

        auth()->user()->comments()->create($data);
        return $this->body=null;
    }
    
    public function index()
    {
        return Comment::with('user:id,name')->wherePost_id($this->post_id)->latest()->get();
    }
    public function render()
    {
        return view('livewire.comments' ,['comments' => $this->index()]);
    }

    
}
