<?php

namespace backend\controllers;

use Yii;
use common\models\Ticket;
use common\models\Tracing;
use common\models\System;
use common\models\TicketSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\helpers\json;

/**
 * TicketController implements the CRUD actions for Ticket model.
 */
class TicketController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','create','update','view'],
                        'rules' => [
                            // allow authenticated users
                            [
                                'allow' => true,
                                'roles' => ['@'],
                            ],
                            // everything else is denied
                        ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Ticket models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TicketSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        if(Yii::$app->request->post('hasEditable')){
            $id = Yii::$app->request->post('editableKey');  // ide del ticket
            $model = $this->findModel($id);  // busca el ticket con ese id
            $posted = current($_POST['Ticket']);
            if (isset($posted['statusLabel'])) {
                $model->state = $posted['statusLabel'];
                $output =  $model->statusLabel;
            }
            if (isset($posted['UserName'])) {
                $model->user_id = $posted['UserName'];
                $output =  $model->UserName;
            }
            
            $model->save(false);
            
            $out = Json::encode(['output'=>$output, 'message'=>'']); 
            echo $out;
            return;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ticket model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        
        $model = new Ticket();
        $model=$this->findModel($id);

        $tracing = new Tracing();
        $tracings = Tracing::find()->where(['ticket_id'=>$model->id])->all();
        
        $tracing->created_at = date("Y-m-d H:i:s");
        $tracing->created_by = Yii::$app->user->id;
        $tracing->ticket_id = $model->id;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id'=>$model->id]);
        }
        if ($tracing->load(Yii::$app->request->post()) && $tracing->save()) {
            return $this->redirect(['view', 'id'=>$model->id]);
        }

        return $this->render('view', [
            'model' => $model,
            'tracing' => $tracing,
            'tracings' => $tracings,
        ]);
        
    }

    /**
     * Creates a new Ticket model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ticket();
        $model->created_by = Yii::$app->user->id;
        $model->folio = 0;
        $model->created_at = date("Y-m-d H:i:s");

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $system = System::findOne(1);
            $model->folio = $system->folio;
            $transaction = Yii::$app->db->beginTransaction();

            try {
                if ($flag = $model->save(false)) {
                    $system->updateCounters(['folio'=>1]);

                    $ticketId = $model->id;

                    $attached=UploadedFile::getInstance($model,'attached');
                    if ($attached != NULL) {
                        $attachedName = 'attached' . $ticketId . '.' . $attached->getExtension();
                        $attached->saveAs(Yii::getAlias('@ticketAttPath').'/'.$attachedName);
                        $model->attached = $attachedName;
                        $model->save(false);
                    }
                    
                }
                if ($flag) {
                    $transaction->commit();
                    return $this->redirect(['success', 'id' => $model->id]);
                }
            }catch (Exception $e) {
                $transaction->rollBack();
            }
            
        } else { 
            return $this->render('create', [
                'model' => $model,
                
            ]);
        }
    }

    /**
     * Updates an existing Ticket model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionSuccess($id)
    { 
        return $this->render('success', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Deletes an existing Ticket model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ticket model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ticket the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ticket::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
   
}
