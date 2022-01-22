<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function send(Request $request)
    {
        $data = Validator::make($request->all(), [
            'commentable_id'=>'required|integer',
            'commentable_type'=>'required|string',
            'email'=>'required|email',
            'comment'=>'nullable|min:3|max:1000',
            'en_comment'=>'nullable|min:3|max:1000',
            'name'=>'nullable|min:3|max:255',
            'en_name'=>'nullable|min:3|max:255',
            ]);
      if($data->fails()){
          if($request->lang == 'fa'){
              alert()->error('لطفا تمام فیلد ها را به درستی ارسال نمایید')->persistent('باشه');
          }
         else{
             alert()->error('please complete all fields')->persistent('ok');
         }
         return back();
      }
      Comment::create($request->all());
        if($request->lang == 'fa') {
            alert()->success('دیدگاه شما با موفقیت ارسال شد و بعد از تایید منتشر خواهد شد')->persistent('باشه');
        }else{
            alert()->success('Your comment show after approved')->persistent('ok');
        }
      return back();
    }
}
