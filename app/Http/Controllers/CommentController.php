<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comments=Comment::where('user_id',auth()->user()->id)->get();
      
        
        return view('comment',['comments'=>$comments]);
    }
    public function create(Post $post)
    {
        return view('comment.create',['post'=>$post]);
    }

    public function store(Request $request)
    {

        
        $request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        Comment::create(
        [
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>auth()->user()->id,
            'post_id'=>$request->post_id
        ]);

        return redirect()->to('/comment');
    }

    public function edit(Comment $comment)
    {
        return view('comment.edit',['comment'=>$comment]);
    }

    public function Update(Request $request,Comment $comment)
    {
        $data=$request->validate([
            'title'=>'required',
            'content'=>'required'
        ]);

        $comment->update($data);
        return redirect()->to('/comment');
    }

    public function Delete(Comment $comment)
    {
        return view('comment.delete',['comment'=>$comment]);
    }

    public function Destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->to('/comment');
    }
}
