<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use yii\db\Query;

class LeaveController extends Controller
{
    public $enableCsrfValidation = false; //禁止表单提交
    //添加
    public function actionEnroll()
    {
        $request=\yii::$app->request;//接受值
        $con=\yii::$app->db;
        if($data=$request->post()){
            $res=$con->createCommand()->insert('users',$data)->execute();
            if($res){
               return $this->redirect('?r=leave/enroll-list');
            }
        }else{
            return $this->render('enroll');
        }

    }

    //展示
    public function actionEnrollList()
    {
        $query = new Query();
        $data = $query->select("*")
            ->from('users')
            //->where('uid=2')
            ->all();
        return $this->render('enroll_list',['data'=>$data]);
    }
    //删除
    public function actionEnrollDel()
    {
        $request=Yii::$app->request;
        $id=$request->get('uid');
        $res=Yii::$app->db->createCommand()->delete('users',['uid'=>$id])->execute();
        if($res){
            return $this->redirect('?r=leave/enroll_list');
        }
    }
    //修改
    public function actionEnrollUpdate()
    {
        $request = \YII::$app->request;
        $data = $request->get();
        $db = \Yii::$app->db;
        $rest = $db->createCommand()->update('users',['username'=>$data['username']],'uid='.$data['uid'])->query();
        if($rest)
        {
            echo '修改成功';
        }
        else
        {
            echo '2';
        }
    }
    //留言列表
    public function actionEnrollLeave()
    {
        $request=\yii::$app->request;
        if($data=$request->get('uid'))
        {
            return $this->render('enroll_leaves',['uid'=>$data]);
        }
    }
    //留言入库
    public function actionLeaveAdd()
    {
        $request=\yii::$app->request;
        $data=$request->get();
        $res=\yii::$app->db->createCommand()->insert('leave',[
            'leaves'=>$data['leaves'],
            'uid'=>$data['uid']
        ])->execute();
        if($res){
            echo 1;
        }
    }
}
?>