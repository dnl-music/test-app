<?php

namespace services;

use app\models\Tag;

class TagsService
{
    final public function getArticles(int $tagId): array
    {
        return Tag::find()->where(['id' => $tagId])->one()->articles;
    }
}