<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index()
    {
        $posts=Post::where('user_id',auth()->user()->id)->get();
        //dd($posts);
        //return view('dashboard',compact('posts'));
        return view('dashboard',['posts'=>$posts]);
    }
    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->to('/dashboard');

      
    }

    public function Edit(Post $post)
    {
      //  $post=Post::find($id);

        return view('post.edit',['post'=>$post]);
    }

    public function update(Request $request,Post $post)
    {
      //  $post=Post::find($id);

        $data=$request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

       // dd($data);

        $post->update($data);

       // $post->title=$request->input('title');
       // $post->content=$request->input('content');

        
      //  $post->save();

        return redirect()->to('/dashboard');


     
    }

    public function delete(Post $post)
    {
         return view('post.delete',['post'=>$post]);
     //   $post=Post::find($id);
     
      /*  $post->delete();

        return redirect()->to('/dashboard');*/


       // return 'user deleted successfully! <a href="'.url('list').'">click</a>';
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->to('/dashboard');
    }

  
}
