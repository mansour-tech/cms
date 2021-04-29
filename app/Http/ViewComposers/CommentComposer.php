<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
use App\Models\Comment;

class CommentComposer 
{

    protected $comments;

    public function __construct(Comment $comments)
    {
        $this->comments = $comments ;
    }
    public function compose(View $view)
    {
        $view->with('recent_comments', $this->comments->with('user','post:id')->take(5)->latest()->get());
    }
}
?>