<?php

/** @var yii\web\View $this */
/** @var stdClass $article */


use yii\helpers\Url;

$this->title = "Запись - {$article->name}";
?>
<div class="site-index">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1><?= $article->name ?></h1>
                <article><?= $article->body ?></article>
                <?php foreach($article->tags as $tag): ?>
                    <span><a href="<?= Url::to(array('site/tag', 'key' => $tag->key))  ?>">#<?= $tag->name ?></a></span>
                <?php endforeach; ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>