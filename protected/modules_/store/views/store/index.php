<?php
echo "<div class='badge-add-b'>";
echo CHtml::link(Yum::t('Create new store item'), array(
    '//store/store/create'), array('class' => 'btn'));
echo "</div>";
$allStoreitem=Store::model()->findAll();
if($allStoreitem)
{
    echo "<table>";
    foreach($allStoreitem as $index=>$item)
    {
    ?>
        <tr>
            <td style="width:25px;">
                <a href="<?php echo Yum::module('store')->updateUrl;?>/id/<?php echo $item->id;?>" title="Update store item">
                    <?php
                    echo CHtml::image(
                        Yii::app()->getAssetManager()->publish(
                            Yii::getPathOfAlias('zii.widgets.assets.gridview').'/update.png'));
                    ?>
                </a>
                <br />
                <br />
                <a class="store-delete" href="<?php echo Yum::module('store')->deleteUrl;?>/id/<?php echo $item->id;?>" title="Delete store item">
                <?php
                    echo CHtml::image(
                        Yii::app()->getAssetManager()->publish(
                            Yii::getPathOfAlias('zii.widgets.assets.gridview').'/delete.png'));
                    ?>
                </a>
            </td>
            <?php
            if($item->image>0)
            {
                $image_file=Files::model()->findByPk($item->image);
                if($image_file)
                {
                    $little_ph=str_replace('.jpg','',$image_file->image);
                    if(file_exists(Yii::app()->basePath."/../files/".$little_ph."_little.jpg"))
                    {
                    ?>
                        <td style="width:75px;">
                            <img src='/files/<?php echo $little_ph."_little.jpg"; ?>'/>
                        </td>
                    <?php
                    }
                }
            } ?>
            <td>

                <?php echo $item->title; ?>
                <br />
                <?php echo $item->price; ?>
                <br />
                Count: <?php echo $item->count; ?>
                <br />
                Display: <?php echo $item->hide==1?"hide":"show"; ?>
            </td>
        </tr>
        <tr><td colspan="3">
        <hr style="margin: 10px 0" />
        </td></tr>
    <?php
    }
    echo "</table>";

}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
        $('a.store-delete').on('click',function()
        {
            return confirm("Are you sure?")?true:false;
        })
    })
</script>
