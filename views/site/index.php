<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="container">
        <div class="md-9">
            <ul>
                <?php foreach ($rows as $row) { ?>
                    <li><a href="<?= Url::to(['/site/category', 'key' => $row->key]) ?>"><?= $row->name ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="md-3"></div>
    </div>
</div>
