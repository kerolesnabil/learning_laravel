<?php

namespace App\Http\Controllers;

use App\News;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use Illuminate\Support\Facades\View;

class NewsController extends Controller
{
    public function all_news( Request $request)
    {

        $all_news=News::withTrashed()->orderBy('id','desc')->get();
        $soft_deletes_news=News::onlyTrashed()->orderBy('id','desc')->get();
        return \view('layout.all_news',['all_news'=>$all_news,'Trashed'=>$soft_deletes_news]);
    }

    public function insert_news()
    {
        if(\request()->ajax())
        {

            $attribute=[
                'title'=>trans('admin.title'),
                'desc'=>trans('admin.desc'),
                'content'=>trans('admin.content'),
                'user_id'=>trans('admin.user_id'),
                'status'=>trans('admin.status'),
            ];

            $data=$this->validate(\request(),[
                    'title'=>'required',
                    'desc'=>'required',
                    'content'=>'required',
                    'user_id'=>'required',
                    'status'=>'required',
                ],[],$attribute

            );

            $news=News::create($data);
            $html=view('layout.row_news',['news'=>$news])->render();
            return json_encode(['status'=>true,'result'=>$html]);

        }


//    DB::table('news')->insertGetId($data);

     return back();

    }

    public function delete($id=null)
    {


        if($id!=null)
        {
            $del=News::find($id);
            $del->delete();
        }
        elseif(\request()->has('restore') and \request()->has('id')){

            News::whereIn('id',\request('id'))->restore();

        }
        elseif (\request()->has('delete') and \request()->has('id'))
        {
            News::destroy(\request('id'));
        }
        elseif (\request()->has('forcedelete') and \request()->has('id'))
        {
            News::whereIn('id',\request('id'))->forceDelete(\request('id'));
        }

        return back();

    }

}
