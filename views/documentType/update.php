<?php
/* @var $this DocumentController */
/* @var $model Document */

$this->title = 'Update Documents Type: ' . $model->name;   
$this->params['breadcrumbs'][] = ['label' => 'Documents Type', 'url' => ['index']];   
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];   
$this->params['breadcrumbs'][] = 'Update';  
?>

<h1>Update Document Type<?php echo $model->ID; ?></h1>

<?php $this->renderPartial('form', array('model'=>$model)); ?>