<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php

/* @var $this yii\web\View */

$this->title = $article->article_name;
?>
<div class="main">
    <div class="body-content">
        <div class="main-content">
            <div class="row">
                <div class="col-md-9">
                	<div class="post">
                        <div class="row">
                        	<div class="col-md-12 post-image">
                        		<img src="<?= $article->getImage() ?>" alt="Изображение статьи">
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-12 post-name">
                        		<h1><?= $article->article_name ?></h1>
                        	</div>
                        </div>
                        <div class="row post-info">
                        	<div class="col-md-6 post-author">
                        		<a href="<?= Url::toRoute(['site/user', 'user_id'=>$article->user_id]);?>">Admin</a>
                        	</div>
                        	<div class="col-md-6 post-date">
                        		<p><?= $article->date ?></p>
                        	</div>
                        </div>
                        <div class="row post-content">
                        	<div class="col-md-12">
                        		<?= $article->content ?>
                        	</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="authors">
                        <h3>Авторы</h3>
                        <?php foreach($users as $user):?>
                        <div class="row author">
                            <div class="col-md-3 author-photo">
                                <a href="<?= Url::toRoute(['site/user', 'user_id'=>$user->user_id]);?>"><img src="<?= $user->getImage()?>"></a>
                            </div>
                            <div class="col-md-9 author-name">
                                <a href="<?= Url::toRoute(['site/user', 'user_id'=>$user->user_id]);?>"><?= $user->name ?> <?= $user->surname ?></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                      <?php echo LinkPager::widget([
                        'pagination' => $pagination,
                        ]);?>
                </div>
            </div>
        </div>
    </div>
</div>