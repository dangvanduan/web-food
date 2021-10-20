<?php
if($current_page > 3){
    $first_page = 1;
?>
<a class="page-item" href="?source=<?php $source;?>&per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>
<?php } ?>
<?php for( $num=1; $num <= $tongsoTrang;$num ++ ){?>
    <?php if($num != $current_page){?>
        <?php if($num > $current_page-3 && $num < $current_page+3){?>
            <a class="page-item" href="?source=<?php echo $source;?>&per_page=<?=$item_per_page?>&page=<?= $num ?>"><?= $num ?></a>
        <?php } ?>
    <?php }else{ ?>
        <b><strong class="current-page page-item"><?= $num ?></strong></b>
    <?php } ?>
<?php } ?>
<?php 
if($current_page < $tongsoTrang-3){
    $end_page=$tongsoTrang;
?>
<a class="page-item" href="?source=<?php echo $source;?>&per_page=<?=$item_per_page?>&page=<?=$end_page?>">Last</a>
<?php
}
?>
