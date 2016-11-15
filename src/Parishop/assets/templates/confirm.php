<?php
$button = $this->get('button');
if($button instanceof \Parishop\Toolbar\Button) { ?>
    <button type="button" class="uk-button" onclick="toolbarSubmit('<?= $button->task(); ?>');">
        <i class="<?= $button->icon(); ?>"></i> <span class="uk-hidden-small"><?= $button->text(); ?></span>
    </button>
<?php }?><