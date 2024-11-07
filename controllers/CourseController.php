<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class CourseController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\Course::find(),
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
        $course = new \app\models\Course();

        if ($course->load(Yii::$app->request->post()) && $course->save()) {
            return $this->redirect(['view', 'id' => $course->id]);
        }

        return $this->render('create', [
            'model' => $course,
        ]);
    }

    protected function findModel($id)
    {
        if (($course = \app\models\Course::findOne($id)) !== null) {
            return $course;
        }

        throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = \app\models\Course::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new \yii\web\NotFoundHttpException('The requested course does not exist.');
    }
}
