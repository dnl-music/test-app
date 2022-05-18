<?php

namespace app\controllers;

use app\models\Article;
use app\models\ArticleCategory;
use app\models\Tag;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $categories = ArticleCategory::find()->all();
        return $this->render('index', ['categories' => $categories]);
    }

    /**
     * @param $key
     * @return string
     */
    public function actionCategory($key)
    {
        $category = ArticleCategory::find()->where(['key' => $key])->one();
        if(!$category) {
            throw new NotFoundHttpException();
        }
        $articles = Article::find()->where(['category_id' => $category->id])->all();
        return $this->render('category', ['category' => $category, 'articles' => $articles]);
    }

    /**
     * @param $key
     * @return string
     */
    public function actionArticle($key)
    {
        $article = Article::find()->where(['key' => $key])->one();
        if(!$article) {
            throw new NotFoundHttpException();
        }
        return $this->render('article', ['article' => $article]);
    }

    /**
     * @param $key
     * @return string
     */
    public function actionTag($key)
    {
        $tag = Tag::find()->where(['key' => $key])->one();
        if(!$tag) {
            throw new NotFoundHttpException();
        }
        $articles = $tag->articles;

        return $this->render('tag', ['tag' => $tag, 'articles' => $articles]);
    }
}
