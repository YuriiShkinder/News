<?php

namespace App\Http\Controllers;

use App\Blurd;
use App\Category;
use App\Coment;
use App\Like;
use App\News;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class PageController extends Controller
{
    public function index(){


//        $tag = Tag::where('tags','like',"publ"."%")->get()->unique('tags')->toJson();
//
//        dd($tag);

        $coll=Category::with('news')->get();
        $blurds=Blurd::take(8)->orderByDesc('id')->get()->toArray();
        foreach ($coll as $val){
            $var=$val->news()->orderByDesc('updated_at')->limit(5)->get();
            if(count($var)>0){
                foreach ($var as $item){
                    $arr[]=[
                        'id'=>$item->id,
                        'title'=>$item->title,
                        'text'=>$item->text,
                        'fulltext'=>$item->full_text,
                        'images'=>$item->images,
                        'count'=>$item->counts,
                        'like'=>$item->like,
                        'dislike'=>$item->dislike
                    ];
                }
            }else{
                $arr[]=[
                    'id'=>0,
                    'title'=>'Немає новин із даною категорією',
                    'text'=>'',
                    'fulltext'=>'',
                    'images'=>''
                ];
            }
            $data[$val->categorys]=$arr;
            $arr=[];
        }
        for($i=0;$i<=9;$i++){
            $cat=array_keys($data)[$i];
            $val=array_values($data[$cat]);
            if(count($val)>1){
                $x=$val[random_int(0,count($val)-1)];

                $slider[]=['category'=>$cat,'title'=>$x['title'],'text'=>$x['fulltext'],'images'=>$x['images']];
            }
            if(count($slider)==3){
                break;
            }
        }
//        $top_thems=News::orderByDesc('like')->limit(3)->get();

        $top_thems=Coment::groupBy('new_id')->select('new_id',DB::raw('count(*) as count'))->orderByDesc('count')->limit(3)->get();


        $top_users=Coment::groupBy('user_id')->select('user_id',DB::raw('count(*) as count'))->orderByDesc('count')->limit(5)->get();

        return view('page',[
            'title'=>'News site',
            'news'=>$data,
            'thems'=>$top_thems,
            'users'=>$top_users,
            'blurds'=>$blurds,
            'slider'=>$slider]);
    }

    public  function category($category){
        $coll=Category::with('news')->where('categorys',$category)->get();
            $var=$coll->first()->news()->get();

            if(count($var)>0){
                foreach ($var as $item){
                    $tags=News::with('tags')->get()->where('id',$item->id)
                                                    ->first()->tags()->pluck('tags')->toArray();
                    $arr[]=[
                        'id'=>$item->id,
                        'title'=>$item->title,
                        'text'=>$item->text,
                        'fulltext'=>$item->full_text,
                        'images'=>$item->images,
                        'count'=>$item->counts,
                        'like'=>$item->like,
                        'dislike'=>$item->dislike,
                        'tags'=>$tags
                    ];
                }
            }else{
                $arr[]=[
                    'id'=>0,
                    'title'=>'Немає новин із даною категорією',

                ];
            }

                $data[$coll->first()->categorys]=$arr;


        return view('category',['title'=>$category,'data'=>$data]);
    }


    public function  news($category,$id_news){

        $coll=Category::with('news')->where('categorys',$category)->get();
        $var=$coll->first()->news()->where('id',$id_news)->get();
        $tags=News::with('tags')->get()->where('id',$id_news)
            ->first()->tags()->pluck('tags')->toArray();

            foreach ($var as $item){
                $arr=[
                    'id'=>$item->id,
                    'title'=>$item->title,
                    'text'=>$item->text,
                    'fulltext'=>$item->full_text,
                    'images'=>$item->images,
                    'count'=>$item->counts,
                    'like'=>$item->like,
                    'dislike'=>$item->dislike,
                    'tags'=>$tags
                ];
                $title=$item->title;
            }

        $data[$coll->first()->categorys]=$arr;
            $coments=News::find($id_news)->coments;


        return view('news',['title'=>$title,'data'=>$data,'coments'=>$coments]);
    }

    public function coment(Request $request){
        $input=$request->except('_token');

        $coment=new Coment();

        $coment->fill($input);
        if($coment->save()){

            return redirect()->back();
        }

    }

    public function tags($tag){

        $tags=Tag::where('tags',$tag)->get();

        return view('tags.tags',['data'=>$tags]);

    }

    public function user(User $user){
        $top_users=Coment::groupBy('user_id')->select('user_id',DB::raw('count(*) as count'))->orderByDesc('count')->limit(5)->get();


        //dd($user->coments->groupBy('new_id'));
        return view('user_coment',['data'=>$user]);
    }

}
