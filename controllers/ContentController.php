<?php

namespace app\controllers;

use app\models\Portfolio;
use vova07\imperavi\actions\GetAction;
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
                $this->actionConvert($model->id);
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

    public function actionProjectDelete ()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        }
//        print_r(Yii::$app->request->post());

        $model = Portfolio::find()->where(['id' => Yii::$app->request->post()['Portfolio']['id']])->one();
        $model->delete();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionProjectSave ()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        }
//        print_r(Yii::$app->request->post()['Portfolio']);
        $model = Portfolio::find()->where(['id' => Yii::$app->request->post()['Portfolio']['id']])->one();
        $model->body = Yii::$app->request->post()['Portfolio']['body'];
        $model->save();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionProjectNew ()
    {
        if (\Yii::$app->user->id !== "100") {
            return $this->goHome();
        }
        $model = new Portfolio();
        $model->body = 'new record';
        $model->save();
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actions()
    {
        return [
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => '/web/img',
                'path' => '@webroot/img',
                'type' => GetAction::TYPE_IMAGES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => '/web/img',
                'path' => '@webroot/img',
            ],
        ];
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
        $page = $this->findModel($id)->url;
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
