<?php

use Yii;
use yii\web\Controller;   
use yii\web\NotFoundHttpException;   
use yii\filters\VerbFilter;   

use models\DocumentStatus;

class DocumentStatusController extends Controller   
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
                                    'delete' => ['POST'],
                            ],   
            ],   
        ];   
    }   
    public function actionIndex()
	{
        $DocumentStatus = new DocumentStatus();   
        $dataProvider = $DocumentStatus->search(Yii::$app->request->queryParams);   

        return $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
    }

    public function accessRules()
	{
        // allow admin user to perform  view, add, edit and delete Document Type
		return array(
			array('allow', 
				'actions'=>array('update','delete','view','create'),
				'users'=>array('admin'),
			),

		);
	} 
  
    /**  
     * Displays a single DocumentStatus model.  
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
     * Creates a new DocumentStatus model.  
     * If creation is successful, the browser will be redirected to the 'view' page.  
     * @return mixed  
     */   
    public function actionCreate()   
    {   
        $model = new DocumentStatus();   
  
        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            return $this->redirect(['view', 'id' => $model->id]);   
        } else {   
            return $this->render('create', [   
                'model' => $model,   
            ]);   
        }   
    }   
              
/**  
     * Updates an existing DocumentStatus model.  
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
  
    /**  
     * Deletes an existing DocumentStatus model.  
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
     * Finds the DocumentStatus model based on its primary key value.  
     * If the model is not found, a 404 HTTP exception will be thrown.  
     * @param integer $id  
     * @return DocumentStatus the loaded model  
     * @throws NotFoundHttpException if the model cannot be found  
     */   
    protected function findModel($id)   
    {   
        if (($model = DocumentStatus::findOne($id)) !== null) {   
            return $model;   
        } else {   
            throw new NotFoundHttpException('The requested page does not exist.');   
        }   
    }   
}    