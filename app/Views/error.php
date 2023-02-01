<?php
/*Created by Artem Lipodat (31.01.2023 10:29)*/?>

<?php foreach ($this->get('error') as $error):?>
<div class="alert <?php if ($this->get('success')):?> alert-success <?php else: ?> alert-danger" <?php endif; ?> role="alert">
    <?= $error ?>
</div>
<?php endforeach; ?>
