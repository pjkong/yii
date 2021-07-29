<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->title = 'Update Documents Status: ' . $model->name;   
$this->params['breadcrumbs'][] = ['label' => 'Documents Status', 'url' => ['index']];   
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];   
$this->params['breadcrumbs'][] = 'Update';  
?>

<h1>Update Document Status<?php echo $model->ID; ?></h1>

<?php $this->renderPartial('form', array('model'=>$model)); ?>