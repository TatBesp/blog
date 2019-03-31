<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Article */

$this->title = $model->article_id;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->article_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Выбрать изображение', ['set-image', 'id' => $model->article_id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->article_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'article_id',
            'article_name',
            'content:ntext',
            'description:ntext',
            'date',
            'image',
            'user_id',
        ],
    ]) ?>

</div>
