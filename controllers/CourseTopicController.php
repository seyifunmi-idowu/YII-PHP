<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CourseTopicController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\CourseTopic::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $courseTopic = new \app\models\CourseTopic();

        if ($courseTopic->load(Yii::$app->request->post()) && $courseTopic->save()) {
            return $this->redirect(['view', 'id' => $courseTopic->id]);
        }

        return $this->render('create', [
            'model' => $courseTopic,
        ]);
    }

    protected function findModel($id)
    {
        if (($courseTopic = \app\models\CourseTopic::findOne($id)) !== null) {
            return $courseTopic;
        }

        throw new yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = \app\models\CourseTopic::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new yii\web\NotFoundHttpException('The requested course topic does not exist.');
    }
}

