<?php
namespace controllers;

use App\Controller;
use App\Core;
use models\Tasks;
use models\Users;

class MainController extends Controller
{
    public function actionIndex() {

        $model = new Tasks();
        if(Users::isUser() && !empty($_POST)):
            $task = (object)($model->all('id='.$_POST['id']))[0];
            $model->name = $task->name;
            $model->email = $task->email;
            if( $task->text != $_POST['text']){
                $model->text = $_POST['text'];
                $model->edit = 1;
            }else
                $model->text = $task->text;
                $model->status = empty($_POST['status']) ? 0 : 1;
            $model->update("id = ".$_POST['id']);
        endif;


        $limit = 3;
        $page = $_GET['page'];
        if (!empty($page))
            $offset = $limit * ($page-1);
        if( $offset<=0 )
            $offset = null;

        $message = isset($_SESSION['message']) ? $_SESSION['message'] : "";
        unset($_SESSION['message']);

        $this->render('index',[
            'model'     => $model->all( "", $limit, $offset, $_GET['order']),
            'page'      => $page,
            'limit'     => $limit,
            'count'     => $model->count(),
            'message'   => $message
        ]);
    }

    public function actionCreate() {

        if(empty($_POST))
            return Core::goHome();

        $model = new Tasks();
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        $model->text = $_POST['text'];
        $_SESSION['message'] = $model->insert();

        return Core::redirect($_SERVER['HTTP_REFERER']);

    }
}