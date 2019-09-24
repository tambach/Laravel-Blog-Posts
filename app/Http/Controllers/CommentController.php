<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\User;
use App\Comment;
use DB;

class CommentController extends Controller
{
    public function comment(Request $request, $id)
    {
        $this->validate($request, [
            'name'    => 'required',
            'comment' => 'required'
        ]);


        $comment = new Comment;
        $comment->name = auth()->user()->name;
        $comment->post_id = $id;
        $comment->comment = $request->input('comment');

        $comment->save();
        return redirect('/posts/'.$id)->with('success', 'Comment added');
    }
}
