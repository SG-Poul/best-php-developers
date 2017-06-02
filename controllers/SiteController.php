<?php

namespace app\controllers;

use app\models\Content;
use app\models\Qoute;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $model = new Qoute();
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionCompany($page = 'about')
    {
        $model = new Qoute();
        $l = Content::find()->all();
        $list = [];
        foreach ($l as $i) {
            if (!array_key_exists($i->category, $list)) {
                $list[$i->category] = [];
            }
//            echo $i->category . '=>' . $i->page . '<br/>';
            array_push($list[$i->category], ['name' => $i->page, 'url' => $i->url]);
        }

        return $this->render('company', [
            'model' => $model,
            'content' => $this->findPage($page),
            'list' => $list,
        ]);
    }

    public function actionQuote ()
    {
        // TODO : add email sending
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
            $model->save();
            return $this->goHome();
        }
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function findPage ($page)
    {
        if (($model = Content::find()->where(['url' => $page])->one()) !== null) {
            return $model;
        } else {
            $model = new Content();
            $model->page = $page;
            return $model;
//            throw new NotFoundHttpException('The requested page does not exist.'); todo UNCOMMENT

        }
    }
}
