<?php

use Yii;
use yii\web\Controller;   
use yii\web\NotFoundHttpException;   
use yii\filters\VerbFilter;   

use models\DocumentType;

class DocumentTypeController extends Controller   
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
        $DocumentType = new DocumentType();   
        $dataProvider = $DocumentType->search(Yii::$app->request->queryParams);   

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
     * Displays a single DocumentType model.  
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
     * Creates a new DocumentType model.  
     * If creation is successful, the browser will be redirected to the 'view' page.  
     * @return mixed  
     */   
    public function actionCreate()   
    {   
        $model = new DocumentType();   
  
        if ($model->load(Yii::$app->request->post()) && $model->save()) {   
            return $this->redirect(['view', 'id' => $model->id]);   
        } else {   
            return $this->render('create', [   
                'model' => $model,   
            ]);   
        }   
    }   
              
/**  
     * Updates an existing DocumentType model.  
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
     * Deletes an existing DocumentType model.  
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
     * Finds the DocumentType model based on its primary key value.  
     * If the model is not found, a 404 HTTP exception will be thrown.  
     * @param integer $id  
     * @return DocumentType the loaded model  
     * @throws NotFoundHttpException if the model cannot be found  
     */   
    protected function findModel($id)   
    {   
        if (($model = DocumentType::findOne($id)) !== null) {   
            return $model;   
        } else {   
            throw new NotFoundHttpException('The requested page does not exist.');   
        }   
    }   
}    