<?php include 'variables.php' ?>
<div class="contacts">
    <a href="tel:<?=  $contacts_main_phone_href ?>" class="contacts_tel"><?= $contacts_main_phone_front ?></a>
    <a href="tel:<?=  $contacts_add_phone_href ?>" class="contacts_tel"><?= $contacts_add_phone_front ?></a>
    <a href="mailto:<?= $contacts_mail ?>" class="contacts_mail"><?= $contacts_mail ?></a>
    <?php include 'socials.php' ?>
</div>