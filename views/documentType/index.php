<?php
/* @var $this DocumentTypeController */
/* @var $dataProvider CActiveDataProvider */

use yii\helpers\Html;   
use yii\widgets\DetailView;   

$this->breadcrumbs=array(
	'DocumentType',
);

$this->title = $model->name;   
$this->params['breadcrumbs'][] = ['label' => 'Document Type', 'url' => ['index']];   
$this->params['breadcrumbs'][] = $this->title;   

?>  

<div class="DocumentType-index">   
  
    <h1><?= Html::encode($this->title) ?></h1>   
  
	<p>   
		<?= Html::a('Create Document Type', ['create'], ['class' => 'btn btn-success']) ?>   
	</p>   
    
	<?= GridView::widget([   
		'dataProvider' => $dataProvider,    
		'columns' => [   
			['class' => 'yii\grid\SerialColumn'],   

            'ID',   
            'Name',   

			['class' => 'yii\grid\ActionColumn'],   
		],   
	]); ?>   
</div>   
 
