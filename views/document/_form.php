<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'document-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Number'); ?>
		<?php echo $form->textField($model,'Number',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Number'); ?>
	</div>

	<div class="row">
		<?php $DocumentTypeListData = CHtml::listData(DocumentType::model()->findAll(),'ID', 'Name'); ?>
		<?php echo $form->labelEx($model,'DocumentTypeID'); ?>
		<?php echo $form->dropDownList($model,'DocumentTypeID', $DocumentTypeListData,array('empty' => '(Select a Document Type)'));?>
		<?php echo $form->error($model,'DocumentTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdBy'); ?>
		<?php echo $form->textField($model,'createdBy',Yii::app()->user->id ); ?>
		<?php echo $form->error($model,'createdBy'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Title'); ?>
	</div>

	<div class="row">
		<?php $addListData = CHtml::listData(DocumentStatus::model()->findAll(),'ID', 'Name'); ?>
		<?php echo $form->labelEx($model,'StatusID'); ?>
		<?php echo $form->textField($model,'StatusID',$addListData,array('empty' => '(Select a Status)')); ?>
		<?php echo $form->error($model,'StatusID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RevisionReference'); ?>
		<?php echo $form->textField($model,'RevisionReference',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'RevisionReference'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Details'); ?>
		<?php echo $form->textField($model,'Details',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'Details'); ?>
	</div>

	<div class="row" style="display:none">
		<?php echo $form->labelEx($model,'DateCreated'); ?>
		<?php echo $form->textField($model,'DateCreated')->textInput(['readonly' => true, 'value' => 'Y-m-d H:i:s']); ?>
		<?php echo $form->error($model,'DateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ReviewDate'); ?>
		<?php echo $form->widget('ext.YiiDateTimePicker.jqueryDateTime',array(
				'model'=>$model,
				'attribute'=>'ReviewDate',
				'type'=>'datetime', // available parameter is datetime or time
				'options'=>array( 
					'timeFormat'=>'Y-m-d HH:mm:ss',
					'showSecond'=>true,
					'hourGrid'=>4,
					'minuteGrid'=>10,
				),
				'htmlOptions'=>array(
					'class'=>'input-medium'
				)
			));
		?>
		<?php echo $form->error($model,'ReviewDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$("#ReviewDate").on("change",function(){
	$("#StatusID option").each(function() {
		if($(this).text() == 'Reviewed') {
		$(this).attr('selected', 'selected');            
		}                        
	});
});
</script>