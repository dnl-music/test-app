<?php

/** @var yii\web\View $this */
/** @var stdClass $category */
/** @var mysqli $db */


$this->title = "Категория - {$category->name}";
?>
<h1><?= $category->name ?></h1>
<div class="site-index">
    <div class="container">
        <div class="row">
        <div class="col-md-9">
<?php if (!$articles) { ?>
    <p>Здесь ничего нет</p>
<?php } else { ?>
<ul>
<?php foreach ($articles as $article) { ?>
    <li><a href="<?php echo \yii\helpers\Url::to(array('site/article', 'key' => $article->key)) ?>"><?php echo $article->name ?></a></li>
<?php } ?>
</ul>
<?php } ?>
        </div>
        <div class="col-md-3"></div>
        </div>
    </div>
</div>
