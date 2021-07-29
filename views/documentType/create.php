<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->title = 'Create New Document Type';   
$this->params['breadcrumbs'][] = ['label' => 'Document Type', 'url' => ['index']];   
$this->params['breadcrumbs'][] = $this->title;   

?>
<div class="employees-create">   
	<h1><?= Html::encode($this->title) ?></h1> 

	<?php $this->renderPartial('form', array('model'=>$model)); ?>
</div>   