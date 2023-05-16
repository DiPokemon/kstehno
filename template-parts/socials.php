<?php include 'variables.php' ?>
<div class="socials_links">
    <?php if ($contacts_vk) :?> <a href="https://vk.com/<?= $contacts_vk ?>"><i class="fa-brands fa-vk"></i></a> <?php endif; ?>
    <?php if ($contacts_wa) :?> <a href="https://wa.me/<?= $contacts_wa ?>"><i class="fa-brands fa-square-whatsapp"></i></a> <?php endif; ?>
    <?php if ($contacts_tg) :?> <a href="https://tg.me/<?= $contacts_tg ?>"><i class="fa-brands fa-telegram"></i></a> <?php endif; ?>
    <?php if ($contacts_inst) :?> <a href="https://www.instagram.com/<?= $contacts_inst ?>"><i class="fa-brands fa-square-instagram"></i></a> <?php endif; ?>
    <?php if ($contacts_fb) :?> <a href="https://facebook.com/<?= $contacts_fb ?>"><i class="fa-brands fa-square-facebook"></i></a> <?php endif; ?>
</div>