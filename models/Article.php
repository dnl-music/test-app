<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property int $category_id
 * @property string $key
 * @property string $name
 * @property string|null $body
 * @property int $status
 * @property string $created_at
 *
 * @property ArticleHasTag[] $articleHasTags
 * @property ArticlesCategories $category
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'key', 'name'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['body'], 'string'],
            [['created_at'], 'safe'],
            [['key'], 'string', 'max' => 150],
            [['name'], 'string', 'max' => 130],
            [['key'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ArticlesCategories::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'key' => 'Key',
            'name' => 'Name',
            'body' => 'Body',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[ArticleHasTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleHasTags()
    {
        return $this->hasMany(ArticleHasTag::className(), ['article_id' => 'id']);
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, ['id' => 'tag_id'])->via('articleHasTags');
    }
    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticlesCategories::className(), ['id' => 'category_id']);
    }
}
