<?php

namespace izyue\admin\controllers;

use izyue\admin\components\MenuHelper;
use Yii;
use izyue\admin\models\Article;
use izyue\admin\models\searchs\Article as ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use izyue\admin\components\Helper;


/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
                    'delete' => ['post'],
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
//        $model = $this->findModel($id);
//        if($model->hot_article == 0){
//            Yii::$app->db->createCommand()->update('article', ['hot_article'=>1],"id='$id'")->execute();
//        }
//        else{
//            Yii::$app->db->createCommand()->update('article', ['hot_article'=>0],"id='$id'")->execute();
//        }
        
        $searchModel = new ArticleSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAssign($id)
    {
        $post = Yii::$app->getRequest()->post();
        $action = $post['action'];
        $roles = $post['roles'];
        $manager = Yii::$app->getAuthManager();
        $error = [];
        if ($action == 'assign') {
            foreach ($roles as $name) {
                try {
                    $item = $manager->getRole($name);
                    $item = $item ? : $manager->getPermission($name);
                    $manager->assign($item, $id);
                } catch (\Exception $exc) {
                    $error[] = $exc->getMessage();
                }
            }
        } else {
            foreach ($roles as $name) {
                try {
                    $item = $manager->getRole($name);
                    $item = $item ? : $manager->getPermission($name);
                    $manager->revoke($item, $id);
                } catch (\Exception $exc) {
                    $error[] = $exc->getMessage();
                }
            }
        }
        Helper::invalidate();
        Yii::$app->response->format = 'json';
        return array_merge($this->getItems($id), ['errors' => $error]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $author = Yii::$app->user->identity['username'];
            $date = date('Y-m-d H:i:s');
            Yii::$app->db->createCommand("update article set updated_at='$date', created_at='$date', author='$author' where id='$model->id' ")->execute();
            if(Yii::$app->request->post('publish')){
                Yii::$app->db->createCommand()->update('article', ['publish'=>1],"id='$id'")->execute();
                return $this->render('view', [
                    'model' => $model,
                    'save' => 'publish successfully',
                ]);
            }
            //hot article
            if($model->hot_article == 0 && Yii::$app->request->post('hot_article')){
                Yii::$app->db->createCommand()->update('article', ['hot_article'=>1],"id='$id'")->execute();
                return $this->redirect('index');
            }
            return $this->redirect(['index']);
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $date = date('Y-m-d H:i:s');
            Yii::$app->db->createCommand("update article set updated_at='$date' where id='$id'")->execute();

            //publish
            if($model->publish == 0 && Yii::$app->request->post('publish')){
                Yii::$app->db->createCommand()->update('article', ['publish'=>1],"id='$id'")->execute();
                return $this->render('view', [
                    'model' => $model,
                    'save' => 'publish successfully',
                ]);
            }
            else if($model->publish == 1 && !Yii::$app->request->post('publish')){
                Yii::$app->db->createCommand()->update('article', ['publish'=>0],"id='$id'")->execute();
                return $this->render('view', [
                    'model' => $model,
                    'save' => 'unpublish successfully',
                ]);
            }

            //hot article
            if($model->hot_article == 0 && Yii::$app->request->post('hot_article')){
                Yii::$app->db->createCommand()->update('article', ['hot_article'=>1],"id='$id'")->execute();
                return $this->redirect(['index']);
            }
            else if($model->hot_article == 1 && !Yii::$app->request->post('hot_article')){
                Yii::$app->db->createCommand()->update('article', ['hot_article'=>0],"id='$id'")->execute();
                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'model' => $model,
                'save'=>'save successfully',
            ]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSoftdelete($id)
    {
        $model = $this->findModel($id);
        $model->softdelete = 0;
        $model->update();
        return $this->redirect(['index']);


    }
    public function actionDelete($id){
        Yii::$app->db->createCommand()->delete('article', "id='$id'")->execute();
        return $this->redirect(['recycle']);
//        $this->findModel($id)->delete();
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
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'kucha\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"  => "",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                    "imageRoot" => Yii::getAlias("@webroot"),
                ],
            ]
        ];
    }
    public function actionRecycle()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, false);

        return $this->render('delete', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionRetrieve($id)
    {
        $model = $this->findModel($id);
        $model->softdelete = 1;
        $model->update();
        return $this->redirect(['recycle']);
    }

    public function actionPreview($id){
        return $this->render('preview', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionChangeHot(){
        $model = $this->findModel($id);
        if($model->hot_article == 0){
            Yii::$app->db->createCommand()->update('article', ['hot_article'=>1],"id='$id'")->execute();
            return $this->redirect(['index']);
        }
        else{
            Yii::$app->db->createCommand()->update('article', ['hot_article'=>0],"id='$id'")->execute();
            return $this->redirect(['index']);
        }
    }
}
