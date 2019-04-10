<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Article;
use app\models\User;
use app\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ImageUpload;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
       /* $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
        return $this->redirect(['error']);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $user_id=User::getUserId();
        $model = $this->findModel($id);
        if($model->user_id==$user_id){
            return $this->render('view', [
                'model' => $model,
            ]);
        }
        else {
            return $this->redirect(['error']);
        }

    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->article_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {   
        $user_id=User::getUserId();
        $model = $this->findModel($id);
        if($model->user_id==$user_id){
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->article_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    else{
        return $this->redirect(['error']);
    }
}

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
       public function actionSetImage($id)
    {
        $model = new ImageUpload;
        $user_id=User::getUserId();
        $article = $this->findModel($id);
        if($article->user_id==$user_id){
            if (Yii::$app->request->isPost)
            {
                
                $file = UploadedFile::getInstance($model, 'image');
                if($article->saveImage($model->uploadFile($file, $article->image)))
                {
                    return $this->redirect(['view', 'id'=>$article->article_id]);
                }
            }
            
            return $this->render('image', ['model'=>$model]);
        }
        else return $this->redirect('error');
    }
}