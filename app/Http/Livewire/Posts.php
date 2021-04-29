<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class Posts extends Component
{
    public $keyword;
    public function search()
    {
      return Post::where('body','LIKE','%'.$this->keyword.'%')->with('user:id,name')->approved()->paginate(10);
    }
    public function render()
    {
        return view('livewire.posts',
        [
            'posts'     =>$this->search(),
            'keyword'     =>$this->keyword,
        ]);
    }
}
