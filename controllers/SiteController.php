<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Contact;
use app\models\Deal;
use app\models\ContactDeal;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
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
        return $this->render('index');
    }

    /**
     * Display menu`s items
     * @param string $menu "contacts" | "deals"
     * @return string
     */
    public function actionList($menu)
    {
        Yii::$app->response->format = Response::FORMAT_HTML;

        if ($menu === 'contacts') {
            $items = Contact::find()->all();
            return $this->renderPartial('partials/_list', [
                'type' => 'contact',
                'items' => $items,
            ]);
        }

        if ($menu === 'deals') {
            $items = Deal::find()->all();
            return $this->renderPartial('partials/_list', [
                'type' => 'deal',
                'items' => $items,
            ]);
        }

        return '';
    }

    /**
     * Display content menu`s items
     * @param string $type "contact" | "deal"
     * @param int $id
     * @return string
     */
    public function actionDetail($type, $id)
    {
        Yii::$app->response->format = Response::FORMAT_HTML;

        if ($type === 'contact') {
            $model = Contact::findOne((int)$id);
            if ($model === null) {
                return '';
            }
            return $this->renderPartial('partials/_detail_contact', [
                'model' => $model,
            ]);
        }

        if ($type === 'deal') {
            $model = Deal::findOne((int)$id);
            if ($model === null) {
                return '';
            }
            return $this->renderPartial('partials/_detail_deal', [
                'model' => $model,
            ]);
        }

        return '';
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
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
