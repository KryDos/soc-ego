<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <title><?php echo CHtml::encode(Yii::app()->params->adminName); ?></title>
</head>

<body>

<div class="container" id="page">
    <div id="header">
        <div id="logo"><a href="<?php ?>"><?php echo CHtml::encode(Yii::app()->params->adminName); ?></a></div>
    </div><!-- header -->

    <div id="mainmenu">
        <?php
        $users=YumUser::model()->findAll();
        $today_day=date("d");
        $count_bool=false;
        if($users)
        {
            foreach($users as $user)
            {
                if($user->work_count>0)
                {
                    $work_count=date("d",$user->work_count);
                    if($work_count==$today_day)
                    {
                        $count_bool=true;
                        break;
                    }

                }

            }
        }
        ?>
        <?php $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Admin', 'url'=>array('/admin'),'active' => Yii::app()->controller->getId() == 'admin' ||  Yii::app()->controller->getId() == 'site'),
                array('label'=>'Users', 'url'=>array('/user/user/admin'),'active' => Yii::app()->controller->getId() == 'user'),
                array('label'=>'Roles', 'url'=>array('/role/role/admin'),'active' => Yii::app()->controller->getId() == 'role'),
                array('label'=>'Location manager', 'url'=>array('/locationmanager/locationmanager/manager'),'active' => Yii::app()->controller->getId() == 'locationmanager'),
                array('label'=>'Badges manager', 'url'=>array('/badgemanager/badges/index'),'active' => Yii::app()->controller->getId() == 'badges' ),
                array('label'=>'Gamification manager', 'url'=>array('/gamificationmanager/gamificationmanager/index'),'active' => Yii::app()->controller->getId() == 'gamificationmanager' ),
                array('label'=>'Store', 'url'=>array('/store/store/index'),'active' => Yii::app()->controller->getId() == 'store' ),
                array('label'=>'Orders from store', 'url'=>array('/store/orders/index'),'active' => Yii::app()->controller->getId() == 'orders','visible'=>(Yii::app()->db->getSchema()->getTable('orders_from_store') && count(OrdersFromStore::model()->findAllByAttributes(array("approved"=>0)))>0)),
                array('label'=>'New levels page', 'url'=>array('/site/levelsmessages'),'visible'=>$count_bool),
                array('label'=>'Level list', 'url'=>array('/levellist/levellist/index'),'active' => Yii::app()->controller->getId() == 'levellist' ),
                array('label'=>'Groups', 'url'=>array('/usergroup/groups/index'),'active' => Yii::app()->controller->getId() == 'usergroup' ),
                array('label'=>'Files module', 'url'=>array('/files/files/index'),'active' => Yii::app()->controller->getId() == 'files'),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        )); ?>
    </div><!-- mainmenu -->
    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links'=>$this->breadcrumbs,
        )); ?><!-- breadcrumbs -->
    <?php endif?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">
        Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
        All Rights Reserved.<br/>
        <?php echo Yii::powered(); ?>
    </div><!-- footer -->

</div><!-- page -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin.css" media="screen, projection">
</body>
</html>
