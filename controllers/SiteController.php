<?php

namespace app\controllers;

use app\models\Qoute;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
        if ($model->load(Yii::$app->getRequest()->post())) {
//            if ($user = $model->signup()) {
//                return $this->redirect(['login']);
//            }
        }
        // TODO : add email sending and DB saving
        return $this->render('index', [
            'model' => $model,
        ]);
    }

    public function actionDevelopment()
    {
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
//            if ($user = $model->signup()) {
//                return $this->redirect(['login']);
//            }
        }
        // TODO : add email sending and DB saving
        return $this->render('development', [
            'model' => $model,
        ]);
    }

    public function actionDevelopers()
    {
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
//            if ($user = $model->signup()) {
//                return $this->redirect(['login']);
//            }
        }
        // TODO : add email sending and DB saving
        return $this->render('developers', [
            'model' => $model,
        ]);
    }

    public function actionTeam()
    {
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
//            if ($user = $model->signup()) {
//                return $this->redirect(['login']);
//            }
        }
        // TODO : add email sending and DB saving
        return $this->render('team', [
            'model' => $model,
        ]);
    }

    public function actionPrices()
    {
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
//            if ($user = $model->signup()) {
//                return $this->redirect(['login']);
//            }
        }
        // TODO : add email sending and DB saving
        return $this->render('prices', [
            'model' => $model,
        ]);
    }

    public function actionCompany($page)
    {
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
//            if ($user = $model->signup()) {
//                return $this->redirect(['login']);
//            }
        }
        // TODO : add email sending and DB saving
        return $this->render($page, [
            'model' => $model,
        ]);
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
