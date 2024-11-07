<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use app\models\Student;
use yii\web\Controller;

class CourseEnrollmentController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => \app\models\CourseEnrollment::find(),
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
        $model = new \app\models\CourseEnrollment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        // Fetch courses with the teacher's name and course topic name
        $courses = \yii\helpers\ArrayHelper::map(
            \app\models\Course::find()
            ->select(['course.id', new \yii\db\Expression("CONCAT(course.name, ' - ', teacher.name) AS name")])
            ->leftJoin('teacher', 'course.teacher_id = teacher.id')  // Remove course_topic join
            ->all(),
            'id', 'name'
        );

        // Fetch students
        $students = \yii\helpers\ArrayHelper::map(
            \app\models\Student::find()->all(), 
            'id', 'name'
        );

        return $this->render('create', [
            'model' => $model,
            'courses' => $courses,
            'students' => $students,
        ]);
    }


    protected function findModel($id)
    {
        if (($courseEnrollment = \app\models\CourseEnrollment::findOne($id)) !== null) {
            return $courseEnrollment;
        }

        throw new yii\web\NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = \app\models\CourseEnrollment::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new yii\web\NotFoundHttpException('The requested course enrollment does not exist.');
    }
}
