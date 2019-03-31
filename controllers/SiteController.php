<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Article;
use app\models\User;
use yii\data\Pagination;
use app\models\SignupForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
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

     
    public function actionSignup()
    {
        $model = new SignupForm();
        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['site/login']);
            }
        }
        return $this->render('signup', ['model'=>$model]);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Article::getAll();
        $udata = User::getAll();
        return $this->render('index',[
            'articles'=>$data['articles'],
            'models' => $models,
            'pagination'=>$data['pagination'],
            'users'=>$udata['users']
        ]);
    /**
     * Login action.
     *
     * @return Response|string
     */
}
   
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
    public function actionUser($user_id)
    {   
        $data = Article::getArticlesByUser($user_id);
        $user = User::findOne($user_id);
        return $this->render('user',[
             'user'=>$user,
            'articles'=>$data['articles'],
             'pagination'=>$data['pagination'],
             'models' => $models,
         ]);
    }
    public function actionArticle($id)
    {
        $article = Article::findOne($id);
        $udata = User::getAll();
        return $this->render('article',[
             'article'=>$article,
             'pagination'=>$udata['pagination'],
             'users'=>$udata['users'],
             'models' => $models
         ]);
    }
}
