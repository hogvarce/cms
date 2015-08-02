<?php

namespace app\controllers;

use Yii;
use app\models\Pages;
use app\actions\ListActions;
use app\models\PagesSearch;
use yii\web\NotFoundHttpException;

class MainController extends \yii\web\Controller
{

   public function actionIndex()
   {
        $page = Pages::findOne([
            'slug' => Yii::$app->request->url,
          ]);
      //  $model->page = $page;
        // рендерит вид с названием `view` и применяет к нему шаблон
        return $this->render('index', [
            'page' => $page,
        ]);
   }


}
