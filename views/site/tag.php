<?php

/** @var yii\web\View $this */
/** @var stdClass $tag */

use yii\helpers\Url;

$this->title = "Записи с тегом {$tag->name}";
?>
<h1>#<?= $tag->name ?></h1>
<?php if(!$articles): ?>
    <span>Нет записей</span>
<?php else: ?>
    <?php foreach($articles as $article): ?>
        <div><a href="<?= Url::to(['site/article', 'key' => $article->key]) ?>"><?= $article->name ?></a></div>
    <?php endforeach; ?>
<?php endif; ?>
