<?php
/**
 * @var \Parishop\Toolbar\Button $button
 */
?>
<nav class="uk-navbar<?= $this->get('container') ? ' uk-container' : ''; ?><?= $this->get('containerCenter') ? ' uk-container-center' : ''; ?>">
    <a class="uk-navbar-brand" href="#">
        <?= $this->get('title'); ?>
    </a>
    <div class="uk-navbar-content uk-navbar-flip">
        <?php foreach($this->get('buttons', []) as $group => $buttons) { ?>
            <div class="uk-button-group">
                <?php foreach($buttons as $button) {
                    echo $button->render();
                } ?>
            </div>
        <?php } ?>
    </div>
</nav>
<script>
    function toolbarSubmit($task) {
        var form = document.getElementById('adminForm');
        if (!form) {
            return false;
        }
        form.task.value = $task;
        form.submit();
        return true;
    }
</script>
