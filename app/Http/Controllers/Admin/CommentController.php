<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommentController extends Controller
{

    private function getApproved($request)
    {
        $path = $request->getQueryString();
        $approved = 0;
        if (Str::contains($path, ['approved=1'])) {
            $approved = 1;
        }
        return $approved;
    }

    public function index(Request $request)
    {
        $approved = $this->getApproved($request);
        $comments = Comment::where('approved',$approved)->latest()->paginate(10);
        return view('admin.comments.index',compact('comments'));
    }




    public function edit(Comment $comment)
    {
        return view('admin.comments.edit',compact('comment'));
    }


    public function update(Request $request, Comment $comment)
    {
        $comment->update($request->all());
        alert()->success('عملیات ویرایش با موفقیت انجام شد');
        return redirect(route('admin.comments.index',['approved'=>1]));
    }

    public function approved(Comment $comment)
    {
        $comment->approved = 1;
        $comment->update();
        return redirect(route('admin.comments.index',['approved'=>1]));
    }
   public function disApproved(Comment $comment)
    {
        $comment->approved = 0;
        $comment->update();
        return redirect(route('admin.comments.index',['approved'=>0]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
