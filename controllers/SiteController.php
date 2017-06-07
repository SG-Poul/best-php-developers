<?php

namespace app\controllers;

use app\models\Content;
use app\models\ImageFile;
use app\models\Portfolio;
use app\models\Qoute;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

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

        if ($page === 'gallery') {
            $img = new ImageFile();
            $imgList = $img->getImages();

            return $this->render('gallery', [
                'images' => $imgList,
                'uploadModel' => $img,
                'content' => $this->findPage($page),
                'list' => $list,
            ]);
        } else if ($page === 'projects') {
            $projects = Portfolio::find()->all();
            return $this->render('projects', [
                'projects' => $projects,
                'model' => $model,
                'content' => $this->findPage($page),
                'list' => $list,
            ]);
        }

        return $this->render('company', [
            'model' => $model,
            'content' => $this->findPage($page),
            'list' => $list,
        ]);
    }

    public function actionDeleteImg ()
    {
        if (\Yii::$app->user->id !== "100") return $this->goHome();


        $imgModel = new ImageFile();
        $imgList = Yii::$app->request->post('img');
        $img = explode('\\', $imgList);
        $imgModel->deleteImage($img[count($img) - 1]);
        return $this->redirect(Yii::$app->request->referrer);
    }

    public function actionUploadImg ()
    {
        if (\Yii::$app->user->id !== "100") return $this->goHome();

        $uploadModel = new ImageFile();
        if (Yii::$app->request->post()) {
            $uploadModel->uploadedFiles = UploadedFile::getInstances($uploadModel, 'uploadedFiles');
            if ($uploadModel->upload()) {
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
    }


    public function actionQuote ()
    {
        // TODO : add email sending
        $model = new Qoute();
        if ($model->load(Yii::$app->getRequest()->post())) {
            $model->created_at = date("Y-m-d H:i:s");
            $model->save();

            Yii::$app->mailer->compose(/*'contact/html'*/)
                ->setFrom('quote@best-php-developers.com')
                ->setTo('admin@best-php-developers.com')
                ->setSubject('New quote')
                ->setHtmlBody(`
                <b> ` . $model->name . `</b><br/>
                <b> ` . $model->email . `</b><br/>
                <b> ` . $model->skype . `</b><br/>
                <b> ` . $model->phone . `</b><br/>
                <b> ` . $model->body . `</b><br/>
                `)
                ->send();

            Yii::$app->mailer->compose(/*'contact/html'*/)
                ->setFrom('quote@best-php-developers.com')
                ->setTo($model->email)
                ->setSubject('Quote received')
                ->setTextBody('Thank you for your quote. We will contact you shortly!')
                ->send();

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
