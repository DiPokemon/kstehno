<?php

if(!is_active_sidebar('sidebar-shop')){
    return;
}
?>

<div class="sidebar_shop">
    <?php dynamic_sidebar('sidebar-shop') ?>
</div>