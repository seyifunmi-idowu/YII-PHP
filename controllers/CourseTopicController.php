<?php

namespace app\controllers;

use Yii;
use app\models\CourseTopic;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class CourseTopicController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CourseTopic::find(),
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
        $courseTopic = new CourseTopic();

        if ($courseTopic->load(Yii::$app->request->post()) && $courseTopic->save()) {
            return $this->redirect(['view', 'id' => $courseTopic->id]);
        }

        return $this->render('create', [
            'model' => $courseTopic,
        ]);
    }

    protected function findModel($id)
    {
        if (($courseTopic = CourseTopic::findOne($id)) !== null) {
            return $courseTopic;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = CourseTopic::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException('The requested course topic does not exist.');
    }
}

