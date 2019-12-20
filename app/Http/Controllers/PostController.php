<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Requests\PostComment;
Use Alert;

class PostController extends Controller
{
    public function list() {
        $data = DB::table('posts')->where('deleted',0)->get();
        return view('posts.list', ['lists' => $data]);
    }

    public function detail($postid) {
        $detail = DB::table('posts')
            ->where('posts.id',$postid)
            ->where('deleted',0)
            ->get();
        $comment1 = DB::table('comments')->where('post_id',$postid)->get();
        return view('posts.detail',[
            'detail' => $detail,
            'comments' => $comment1,
        ]);
    }

    public function create() {
        return view('posts.create');
    }

    public function insert(PostComment $request) {
        $id = DB::table('posts')->insertGetId(
            [ 'title' => $request->input('title'),
                'content' => $request->input('content'),
                'deleted' => 0,
            ]
        );
        if (!empty($id)) {
            alert()->success('Post Created', 'Successfully');
            return redirect('/posts/detail/'.$id);
        }
    }
    public function edit($id){
        $detail = DB::table('posts')
            ->where('id',$id)
            ->where('deleted',0)
            ->get();
        return view('posts.edit',['detail' => $detail]);
    }

    public function editPost(PostComment $request, $id) {
        $update = DB::table('posts')
            ->where('id', $id)
            ->update([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
            ]);
        if ($update) {
            alert()->success('Update', 'Successfully');
            return redirect('/posts/detail/'.$id);
        } else {
            alert()->error('deleted','failed :(');
            return redirect('home');
        }
    }

    public function delete($id) {
        $update = DB::table('posts')
            ->where('id', $id)
            ->update([
                'deleted' => 1,
            ]);
        alert()->success('Delete', 'Successfully');
        return redirect('home');
    }

    public function addcomment(PostComment $comment, $id){
        DB::table('comments')->insert(
            ['content_comment' => $comment->input('comment'), 'post_id' => $id , 'created_at' => NOW()]
        );
        alert()->success('Comment', 'Successfully');
        return redirect('/posts/detail/'.$id);
    }
}
