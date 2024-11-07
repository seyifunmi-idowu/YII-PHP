<?php

namespace app\controllers;

use Yii;
use app\models\CourseEnrollment;
use app\models\Course;
use app\models\Student;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;

class CourseEnrollmentController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CourseEnrollment::find(),
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
        $model = new CourseEnrollment();
        $courseModel = new Course();
        $studentModel = new Student();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        // Fetch courses with the teacher's name and course topic name
        $courses = \yii\helpers\ArrayHelper::map(
            Course::find()
            ->select(['course.id', new \yii\db\Expression("CONCAT(course.name, ' - ', teacher.name) AS name")])
            ->leftJoin('teacher', 'course.teacher_id = teacher.id')  // Remove course_topic join
            ->all(),
            'id', 'name'
        );

        // Fetch students
        $students = \yii\helpers\ArrayHelper::map(
            Student::find()->all(), 
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
        if (($courseEnrollment = CourseEnrollment::findOne($id)) !== null) {
            return $courseEnrollment;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDelete($id)
    {
        $model = CourseEnrollment::findOne($id);
        if ($model !== null) {
            $model->delete();
            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException('The requested course enrollment does not exist.');
    }
}
