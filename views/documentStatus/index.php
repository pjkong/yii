<?php
/* @var $this DocumentStatusController */
/* @var $dataProvider CActiveDataProvider */

use yii\helpers\Html;   
use yii\widgets\DetailView;   

$this->breadcrumbs=array(
	'DocumentStatus',
);

$this->title = $model->name;   
$this->params['breadcrumbs'][] = ['label' => 'Document Status', 'url' => ['index']];   
$this->params['breadcrumbs'][] = $this->title;   

?>  

<div class="DocumentStatus-index">   
  
    <h1><?= Html::encode($this->title) ?></h1>   
  
	<p>   
		<?= Html::a('Create Document Status', ['create'], ['class' => 'btn btn-success']) ?>   
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
 
