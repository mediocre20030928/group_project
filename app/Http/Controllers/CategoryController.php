<?php

namespace App\Http\Controllers;

use App\models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function add(){
        return view('category.add');
    }
    public function create(Request $request){
        $data=$request->all();
//        var_dump($data);die;
        $data['createtime']=time();
        $categorymodel=new CategoryModel();
        $res=$categorymodel::insert($data);
        if($res){
            $message = [
                'code' => '000000',
                'message' => 'success',
                'result' => [
                    'message' => '添加成功',
                ]
            ];
        }else{
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' => '服务器错误',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function index(Request $request){
        $catemodel=new CategoryModel();
        $res=$catemodel::paginate(3);
        return view('category.index',['res'=>$res]);
    }
    public function delete(Request $request){
        $data=$request->all();
        $catemodel=new CategoryModel();
        $res=$catemodel::where('id',$data['id'])->delete();
        if($res){
            $message = [
                'code' => '000000',
                'message' => 'success',
                'result' => [
                    'message' => '删除成功',
                ]
            ];
        }else{
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' => '服务器错误',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
    public function edit($id){
        $catemodel=new CategoryModel();
        $res=$catemodel::where('id',$id)->first();
        return view('category.edit',['res'=>$res]);
    }
    public function update(Request $request){
        $data=$request->all();
//        var_dump($data);die;
//        $id=$data['id'];
        $catemodel=new CategoryModel();
        $res=$catemodel::where('id',$data['id'])->update($data);
        if($res!==false){
            $message = [
                'code' => '000000',
                'message' => 'success',
                'result' => [
                    'message' => '修改成功',
                ]
            ];
        }else{
            $message = [
                'code' => '000001',
                'message' => 'error',
                'result' => [
                    'message' => '服务器错误',
                ]
            ];
        }
        return json_encode($message,JSON_UNESCAPED_UNICODE);
    }
}
