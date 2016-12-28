<?php foreach(Yii::$app->session->getAllFlashes() as $type => $messages): ?>
    <?php foreach($messages as $message): ?>
        <div class="flash_<?= $type ?>" style="float: right; width: 280px; color: #4F8A10; background-color: #DFF2BF; border-radius: 8px; padding: 10px; margin-right: 10px;">
            <?= $message ?>
        </div>
    <?php endforeach ?>
<?php endforeach ?>
