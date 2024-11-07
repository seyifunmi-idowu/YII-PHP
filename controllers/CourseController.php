<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class CourseController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Course::find(),
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
        $course = new Course();

        if ($course->load(Yii::$app->request->post()) && $course->save()) {
            return $this->redirect(['view', 'id' => $course->id]);
        }

        return $this->render('create', [
            'model' => $course,
        ]);
    }

    protected function findModel($id)
    {
        if (($course = Course::findOne($id)) !== null) {
            return $course;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = Course::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException('The requested course does not exist.');
    }
}
