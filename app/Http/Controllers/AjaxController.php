<?php

namespace App\Http\Controllers;

use App\Coment;
use App\Like;
use App\News;
//use http\Env\Response;
use Illuminate\Http\Request;
use App\Tag;
use Response;

class AjaxController extends Controller
{
    public function like(Request $request){

       if($request->ajax()){
           $input=[
               'new_id'=>$request->input('new_id'),
               'user_id'=>$request->input('user_id'),
               'coment_id'=>$request->input('coment_id'),

           ];

           $like_model=Like::firstOrCreate($input);

           if($request->input('like')){
               $like_model->coment->update(
                   [
                       'like'=> $request->input('like'),

                       ]
               );
           }else{
               $like_model->coment->update(
                   [
                       'dislike'=> $request->input('dislike'),

                   ]
               );
           }

           echo  $like_model->coment->like;
       }
    }

  public function reads(Request $request){
        if($request->ajax()){
            $news=News::find($request->input('id'));
            $news->update(['counts'=>$request->input('count')]);

      }
  }

  public function search(Request $request){

        if($request->ajax()){
            $str=$request->input('str');
            $tag = Tag::where('tags','like',$str."%")->get()->unique('tags')->toArray();
            return Response::json($tag);
        }

  }

  public function responsAjax(Request $request){

      if($request->isMethod('post')){
          return redirect()->route('tags',['tag'=>$request->input('tags')]);
      }

    }

}
