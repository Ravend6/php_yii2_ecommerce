<?php

namespace backend\controllers;

use Yii;
use backend\models\Product;
use backend\models\Image;
use backend\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * ProductsController implements the CRUD actions for Product model.
 */
class ProductsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-gallery-image' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        // $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            // if ($model->upload()) {

            //     $model->save();
            // } 
           
            if (!$model->upload()) {
                // $model->addError('file', 'Необходимо добавить картинку.');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
           

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updateUpload();
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        foreach ($model->images as $image) {
            $image->delete();
            unlink('images/products/galleries/'. $image->name);  
        }

        $model->delete();
        unlink('images/products/titles/'. $model->image);

        return $this->redirect(['index']);
    }

    public function actionDeleteGalleryImage()
    {
        if (Yii::$app->request->isAjax and $id = Yii::$app->request->post('id')) {
            if ($model = Image::findOne($id)) {
                $model->delete();
                unlink('images/products/galleries/' . $model->name);
                return true;
            }
            return false;

        } else {
            return $this->redirect(Yii::$app->request->referrer);
        }
        // if ($id = Yii::$app->request->post('image_id')) {
        //     if ($model = Image::findOne($id)) {
        //         $model->delete();
        //         unlink('images/products/galleries/'. $model->name);
        //         return $this->redirect(Yii::$app->request->referrer);
        //     }
        // }
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
