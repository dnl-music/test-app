<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $key
 * @property string $name
 *
 * @property ArticleHasTag[] $articleHasTags
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key', 'name'], 'required'],
            [['key'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 130],
            [['key'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[ArticleHasTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleHasTags()
    {
        return $this->hasMany(ArticleHasTag::className(), ['tag_id' => 'id']);
    }

    public function getArticles()
    {
        return $this->hasMany(Article::class, ['id' => 'article_id'])->via('articleHasTags');
    }
}
