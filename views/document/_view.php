<?php
/* @var $this DocumentController */
/* @var $data Document */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Number')); ?>:</b>
	<?php echo CHtml::encode($data->Number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DocumentTypeID')); ?>:</b>
	<?php echo CHtml::encode($data->DocumentTypeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('StatusID')); ?>:</b>
	<?php echo CHtml::encode($data->StatusID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RevisionReference')); ?>:</b>
	<?php echo CHtml::encode($data->RevisionReference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Details')); ?>:</b>
	<?php echo CHtml::encode($data->Details); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->DateCreated); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ReviewDate')); ?>:</b>
	<?php echo CHtml::encode($data->ReviewDate); ?>
	<br />

	*/ ?>

</div>