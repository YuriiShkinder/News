<?php

namespace App\Http\Controllers\Auth;

use App\Blurd;
use App\Category;
use App\Coment;
use App\Lockcoment;
use App\News;
use App\Style;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
class AuthController extends Controller
{
    public function show(){
        return view('auth.admin');
    }

    public function category(Request $request,$id=null){


        if($request->isMethod('post')){
            $input=$request->except('_token');
            $messages=[
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

            $validator=Validator::make($input,[
                "categorys"=>'required|max:255',
            ],$messages);
            if($validator->fails()){
                return redirect()->route('admin_category')->withErrors($validator)->withInput();
            }

            if(!is_null($id)){

                $category=Category::find($id);
                if($category->update($input)){

                    return redirect(route('admin_category'))->with(['status'=>'Категория- '.$input['categorys'].' обновлена']);
                }

            }else{
                $category=new Category();
                $category->fill($input);

                if($category->save()){
                    return redirect(route('admin_category'))->with(['status'=>'Категория добавлена']);
                }
            }
        }

        if($request->isMethod('delete')){
            $category=Category::find($id);
            if($category->delete()){
                return redirect(route('admin_category'))->with(['status'=>'Категория удалена']);
            }
        }

        $category=Category::all();

         return view('auth.category.category',['data'=>$category]);
    }



    public function news(){

        $news=News::all();

        return view('auth.news.news',['data'=>$news]);
    }

    public function newsEdit(News $news,Request $request){

        $category=Category::all();
        if($request->isMethod('delete')){
            $news->delete();

            return redirect()->route('admin_news')->with(['status'=>'Delete news']);

        }

        if($request->isMethod('post')){
            $input=$request->except('_token','tags');
            $tags=$request->get('tags');

            $messages=[
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

            $validator=Validator::make($input,[
                "category_id"=>'required|max:255',
                "title"=>'required|max:255',
                "text"=>'required',
                "full_text"=>'required',
                "images"=>'required',
            ],$messages);

            if($validator->fails()){
                return redirect()->route('admin_news_edit',['news'=>$news->id])->withErrors($validator)->withInput();
            }

            if($tags) {
                $arr=[];
                if(!empty($news->tags)){
                    $news->tags()->delete();
                }

                foreach ($tags as $tag) {
                    array_push($arr,[
                        'new_id' => $news->id,
                        'tags' => $tag
                    ]);
                }
                DB::table('tags')->insert($arr);
            }
            if($news->update($input)){
                return redirect()->route('admin_news')->with(['status'=>'News update']);
            }
        }

        return view('auth.news.edit',['data'=>$news,'categorys'=>$category->pluck('categorys')->toArray()]);
    }


    public function newsAdd(Request $request){

        $category=Category::all();
        if($request->isMethod('post')){
            $id=$category->where('categorys',$request->input('category'))->first()->id;
            $tags=$request->only('tags');

            $messages=[
                'required'=>'Поле :attribute обязательно к заполнению',
            ];

         $input= $this->validate($request,[
              "category"=>'required|max:255',
              "title"=>'required|max:255',
              "text"=>'required',
              "full_text"=>'required',
              "images"=>'required',
          ],$messages);
            unset($input['category']);
            $input['category_id']=$id;
            $news= new News();
            $news->fill($input);
            if($news->save()){
                if($tags) {
                    $arr=[];
                    foreach ($tags as $tag) {
                        array_push($arr,[
                            'new_id' => $news->id,
                            'tags' => $tag[0]
                        ]);
                    }
                    DB::table('tags')->insert($arr);
                }
            }
            return redirect()->route('admin_news')->with(['status'=>'Add news']);
        }


        return view('auth.news.add',['data'=>$category]);
    }




    public function blurds(){
        $blurds=Blurd::all();

        return view('auth.blurds.blurds',['data'=>$blurds]);
    }


    public function blurdsEdit(Blurd $blurd, Request $request)
    {
        if($request->isMethod('post')){

            $input=$this->validate($request,[
                "title"=>'required|max:255',
                "price"=>'integer',
                "firm"=>'required'
            ],[
                'required'=>'Поле :attribute обязательно к заполнению',
            ]);

            if($blurd->update($input)){

                return redirect()->route('admin_blurds')->with(['status'=>'Edit blurd']);
            }

        }

        return view('auth.blurds.edit', ['data' => $blurd]);
    }

    public function blurdsAdd(Request $request){

        if($request->isMethod('post')){

        $input=$this->validate($request,[
            "title"=>'required|max:255',
            "price"=>'integer',
            "firm"=>'required'
        ],[
            'required'=>'Поле :attribute обязательно к заполнению',
        ]);

        $blurd=new Blurd();
         $blurd->fill($input);
         if($blurd->save()){
             return redirect()->route('admin_blurds')->with(['status'=>'Add blurd']);
         }
        }

        return view('auth.blurds.add');
    }


    public function styles(Request $request){
        $style=Style::all()->first();

        if($request->isMethod('post')){

         $input=   $this->validate($request,[
                'body'=>'required'
            ],['required'=>'Поле :attribute обязательно к заполнению']);

            if($style->update($input)){
                return redirect()->route('admin_styles')->with(['status'=>'Edit style body']);
            }

        }


        return view('auth.styles',['data'=>$style]);
    }

    public function coment(Request $request){

        if($request->isMethod('post')){
            $lock=new Lockcoment();
            $lock->fill($request->except('_token'));

            if($lock->save()){
                return redirect()->back()->with(['status'=>'Ваш коментарій на обробці']);
            }
        }

        $data=Lockcoment::all();


        return view('auth.coments',['data'=>$data]);

    }

    public function comentLock(Request $request){

        $chek=$request->except('_token','text');
        $text=array_values($request->except('_token','name'));
        $text=array_shift($text);

        foreach ($chek as $val){
            foreach ($val as $key=>$item){
                $lock=Lockcoment::find($key);
                $coment=new Coment();
                $coment->fill([
                    'new_id'=>$lock->new_id,
                    'user_id'=>$lock->user_id,
                    'text'=>$text[$key]
                ]);
                $coment->save();
                $lock->delete();
            }
        }
        return redirect()->back()->with(['status'=>'Коментарії оброблено']);
    }


}
