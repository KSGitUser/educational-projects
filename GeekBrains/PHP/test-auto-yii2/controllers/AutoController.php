<?php

namespace app\controllers;

use app\models\AutoModel;
use app\models\tables\Brand;
use app\models\tables\Model;
use app\models\tables\Safety;
use app\models\UploadForm;
use Yii;
use app\models\tables\Auto;
use app\models\AutoSearch;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * AdminAutoController implements the CRUD actions for Auto model.
 */
class AutoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Auto models.
     * @return mixed
     */
    public function actionIndex()
    {
            $pagination = new Pagination([
               'defaultPageSize' => 5,
               'totalCount' => Auto::find()->count(),
             ]);
            $autoModel = Auto::find()
                ->with('model', 'brand', 'safeties', 'images')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();


            if (!empty($autoModel)) {
                return $this->render('catalog', [
                    'model' => $autoModel,
                    'pagination' => $pagination,
                ]);
            } else {
                return 'Каталог пустой';
            }


    }

    /**
     * Displays a single Auto model.
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
     * Creates a new Auto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UploadForm();
        $brandForSelect = Brand::find()->select(['id', 'brand_name'])->all();
        $brandArray = ArrayHelper::map($brandForSelect,'id', 'brand_name');
        $safetiesForCheckboxes = Safety::find()->select(['id', 'name'])->all();
        $safetiesArray = ArrayHelper::map($safetiesForCheckboxes,'id', 'name');

        if ($model->load(Yii::$app->request->post())) {
            $postData = Yii::$app->request->post('Auto');
            $model->model_id = $postData['model_id'];
            $model->imageFile = UploadedFile::getInstances($model,'imageFile');
            $model->saveAuto();
            return $this->redirect(['auto/one', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model, 'brandArray' => $brandArray, 'safetiesArray' => $safetiesArray,
        ]);
    }

    /**
     * Updates an existing Auto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Auto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        (new AutoModel())->deleteItem($id);
        return $this->redirect(['index']);
    }


    /**
     * Finds the Auto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Auto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Auto::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param null $brand_id
     * @return Response - json data to add options with js to form
     */
    public function actionFindModelsNames($brand_id = null) {

        $modelForSelect = Model::find()->select(['id','model_name'])->where("brand_id={$brand_id}")->all();
        $modelArray = ArrayHelper::map($modelForSelect,'id', 'model_name');

        return $this->asJson($modelArray);

    }

    public function actionOne($id)
    {

        if ((Auto::findOne($id)) !== null) {
            $autoModel = Auto::find()
                ->with('model', 'brand', 'safeties', 'images')
                ->where("id = {$id}")
                ->one();

            return $this->render('one', [
                'model' => $autoModel,
            ]);
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }



}
