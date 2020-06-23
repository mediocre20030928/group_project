<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function add(){
        return view('banner.add');
    }

    public function do_add(Request $request){
        $arr = array(
            'name' => $request->name,
            'url' => $request->url,
            'hidden' =>$request->hidden,
            'sorts' => $request->sorts,
            'createtime' => time()
        );
        $res = DB::table('banner')->insert($arr);
        if($res){
            echo json_encode(['errno'=>'00000','msg'=>'添加成功']);
        }else{
            echo json_encode(['errno'=>'00001','msg'=>'添加失败']);die;
        }
    }

    public function list(){
        $arr = DB::table('banner')->where('hidden','是')->paginate(3);
        return view('banner.list',['arr'=>$arr]);
    }

    public function del(Request $request){
        $id = $request->id;
        $res = DB::table('banner')->where('id',$id)->delete();
        if($res){
            echo json_encode(['errno'=>'00000','msg'=>'删除成功']);
        }else{
            echo json_encode(['errno'=>'00001','msg'=>'删除失败']);die;
        }
    }

    public function upd(Request $request){
        $id = $request->id;
        $arr = DB::table('banner')->where('id',$id)->first();
        return view('banner.upd',['arr'=>$arr]);
    }

    public function do_upd(Request $request){
        $id = $request->id;
        $arr = array(
            'name' => $request->name,
            'url' => $request->url,
            'hidden' =>$request->hidden,
            'sorts' => $request->sorts,
            'createtime' => time()
        );
        $res = DB::table('banner')->where('id',$id)->update($arr);
        if($res){
            echo json_encode(['errno'=>'00000','msg'=>'修改成功']);
        }else{
            echo json_encode(['errno'=>'00001','msg'=>'修改失败']);die;
        }
    }
}
