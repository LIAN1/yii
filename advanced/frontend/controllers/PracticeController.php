<?php
namespace frontend\controllers;

use Yii;

use yii\web\Controller;
use yii\db\query;
use app\models\User;
use yii\data\Pagination;//分页
/**
 * practice controller
 */
class PracticeController extends Controller
{
    public $enableCsrfValidation = false;

    //留言添加
    public function actionShow(){
        $request=\yii::$app->request;
        $connection=\yii::$app->db;
        if($data=$request->post()){
            if($data['action']=='update'){
                $res=$connection->createCommand()->update('user',['contents'=>$data['contents']],['id'=>$data['id']])->execute();
            }else{
                $res=$connection->createCommand()->insert('user',['contents'=>$data['contents']])->execute();
            }
            
            if($res){
                return $this->redirect('?r=practice/list');
            }else{
                return $this->render('liuyan');
            }
        }else{
            return $this->render('liuyan');
        }
        
    }

    //留言展示
    public function actionList(){
        $user = User::find();
        $count = $user->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>3]);
        $models = $user->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        return $this->render('list', [
             'info' => $models,
             'pagination' => $pagination,
        ]);

    }

    //删除
    public function actionDel(){
        $request=\yii::$app->request;
        $connection=\yii::$app->db;
        $id=$request->get('id');
        $res=$connection->createCommand()->delete('user',['id'=>$id])->execute();
        if($res){
           return $this->redirect('?r=practice/list');
        }
        
    }

    //编辑
    public function actionUpdate(){
        $request=\yii::$app->request;
        $connection=\yii::$app->db;
        $id=$request->get('id');
        $data=$connection->createCommand('select * from user where id='.$id)->queryOne();
        //print_r($data);
        return $this->render('update.html',['data'=>$data]);
    }

    public function actionLian(){
        $user=new User();
        $use->contents='lian';
        $res=$user->save();
        var_dump($res);
    }

}
