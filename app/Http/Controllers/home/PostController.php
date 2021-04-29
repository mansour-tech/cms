<?php
namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    use ImageUploadTrait;
    
    public $post;

    public function __construct(Post $post)
    {
        $this->post=$post;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        /*  يجب إن تكون حقول إستمارة نفس حقول الجدول في قاعدة البيانات create عند إستعمال  */
        if($request->hasFile('image'))
        {
            $image_name = $this->uploadImage($request->image);
        }
        $request->user()->posts()->create($request->all()+['image_path'=>$image_name ?? 'default.jpg']);
        return back()->with('success',trans('alerts.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        /* $post = $this->post->with(['comments' => function($q) {
            $q->with('user:id,name');
            }])->find($id);
        */
        $post = $this->post->find($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $post = $this->post->find($id); OR
        
        $post = $this->post::find($id);
        abort_unless(auth()->user()->can('edit-post' ,$post),403);
        return view('posts.edit',compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->hasFile('image'))
        {
            $request->user()->posts()->find($id)->update($request->all()+['image_path'=>$this->uploadImage($request->image)]);
        }
        else
        {
            $request->user()->posts()->find($id)->update($request->all());
        }
        return back()->with('success',trans('alerts.success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->post->find($d)->delete();
        return back();
    }

    public function getByCategory($id)
    {
        $posts = $this->post::with('user:id,name')->whereCategory_id($id)->approved()->paginate(10);
        return view('index' ,compact('posts'));
    }

    /*
        public function search(Request $request)
        {
            $posts = $this->post->where('body','LIKE','%'.$request->keyword.'%')->with('user:id,name')->approved()->paginate(10);
            return view('index',compact('posts'))->with('keyword',$request->keyword);
        }
    */
}
