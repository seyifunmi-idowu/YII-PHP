<?php

namespace app\controllers;

use Yii;
use app\models\Student;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class StudentController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Student::find(),
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
        $student = new Student();

        if ($student->load(Yii::$app->request->post())) {
            try {
                if ($student->save()) {
                    Yii::$app->session->setFlash('success', 'Student created successfully.');
                    return $this->redirect(['view', 'id' => $student->id]);
                }
            } catch (\Exception $e) {
                Yii::$app->session->setFlash('error', 'Error creating student: ' . $e->getMessage());
            }
        }
    
        return $this->render('create', [
            'model' => $student,
        ]);
    }

    protected function findModel($id)
    {
        if (($student = Student::findOne($id)) !== null) {
            return $student;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = Student::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException('The requested student does not exist.');
    }

}
