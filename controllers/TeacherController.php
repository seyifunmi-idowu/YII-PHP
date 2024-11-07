<?php

namespace app\controllers;

use Yii;
use app\models\Teacher;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

class TeacherController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        Yii::info("Index action reached", __METHOD__);
        $dataProvider = new ActiveDataProvider([
            'query' => Teacher::find(),
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
        $teacher = new Teacher();

        if ($teacher->load(Yii::$app->request->post()) && $teacher->save()) {
            return $this->redirect(['view', 'id' => $teacher->id]);
        }

        return $this->render('create', [
            'model' => $teacher,
        ]);
    }

    protected function findModel($id)
    {
        if (($teacher = Teacher::findOne($id)) !== null) {
            return $teacher;
        }

        throw new yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = Teacher::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException('The requested teacher does not exist.');
    }

}
