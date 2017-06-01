<?php

namespace app\controllers;

use Yii;
use app\models\Content;
use app\models\ContentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContentController implements the CRUD actions for Content model.
 */
class ContentController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Content models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
            $searchModel = new ContentSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Content model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Content model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
            $model = new Content();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing Content model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                $this->actionConvert($model->id);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    public function actionSave()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
//            echo Yii::$app->request->post()['Content']['page'];
//            echo Yii::$app->request->post()['Content']['category'];
//            echo Yii::$app->request->post()['Content']['body'];
            $model = Content::find()->where(['page' => Yii::$app->request->post()['Content']['page']])->one();
            $model->body = Yii::$app->request->post()['Content']['body'];
            $model->save();
            return $this->redirect(Yii::$app->request->referrer);
//                return $this->goBack();
//            }
        }
    }

    /**
     * Deletes an existing Content model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Content model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Content the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionConvert ($id)
    {
        $page = $this->findModel($id)->page;
//        echo'/site/company/' . $page;
        return $this->redirect('/site/company/' . $page);
    }

    protected function findModel($id)
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        } else {
            if (($model = Content::findOne($id)) !== null) {
                return $model;
            } else {
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
    }
}
