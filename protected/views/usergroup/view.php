<?php
//Yum::register('css/yum.css');

$this->breadcrumbs=array(
    'Usergroups'=>array('index'),
    $model->title,
);
 ?>

<h3> <?php echo $model->title;  ?> </h3>

<p> <?php echo $model->description; ?> </p>

<?php

//if($model->owner)
//	printf('%s: %s',
//			Yum::t('user_create'),
//			CHtml::link($model->user_create->username, array(
//					'//profile/profile/view', 'id' => $model->pm)));

printf('<h4> %s </h4>', 'Participants');

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->getParticipantDataProvider(),
    'itemView'=>'_participant',
));

?>

 <div style="clear: both;"> </div> 
<?php
printf('<h3> %s </h3>', 'Messages');

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$model->getMessageDataProvider(),
    'itemView'=>'_message', 
)); 

?>

<?php echo CHtml::link('Write a message', '', array(
			'onClick' => "$('#usergroup_message').toggle(500)")); ?>

<div style="display:none;" id="usergroup_message">
<h3> <?php echo 'Write a message'; ?> </h3>
<?php $this->renderPartial('_message_form', array('group_id' => $model->id)); ?>
</div>

<div style="clear: both;"> </div>



