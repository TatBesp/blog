<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php

/* @var $this yii\web\View */

$this->title = 'Блог на Yii';
?>
<div class="main">
    <div class="body-content">
        <div class="main-content">
            <div class="row">
                <div class="col-md-9">
                    <div class="articles">
                          <?php foreach($articles as $article):?>
                        <div class="row article">
                            <div class="col-md-4 article-image">
                                <a href="<?= Url::toRoute(['site/article', 'id'=>$article->article_id]);?>"><img src="<?= $article->getImage(); ?>" alt="Изображение статьи"></a>
                            </div>
                            <div class="col-md-8 article-info">
                                <div class="row article-header">
                                    <div class="col-md-9 article-name">
                                            <h2><a href="<?= Url::toRoute(['site/article', 'id'=>$article->article_id]);?>"><?= $article->article_name ?></a></h2>
                                    </div>
                                    <div class="col-md-3 article-date">
                                            <p><?= $article->date ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 article-description">
                                        <p><?= $article->description ?></p>
                                    </div>
                                </div>
                                <div class="row article-footer">
                                    <div class="col-md-9 article-author">
                                        <a href="<?= Url::toRoute(['site/user', 'user_id'=>$article->user_id]);?>">
                                            Admin
                                        </a>
                                    </div>
                                    <div class="col-md-3 article-button">
                                        <a class="article-btn" href="<?= Url::toRoute(['site/article', 'id'=>$article->article_id]);?>">Читать далее</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <?php endforeach; ?>
                    </div>
                    
                </div>
                <div class="col-md-3">
                    <div class="authors">
                        <h3>Авторы</h3>
                        <?php foreach($users as $user):?>
                        <div class="row author">
                            <div class="col-md-3 author-photo">
                                <a href="<?= Url::toRoute(['site/user', 'user_id'=>$user->user_id]);?>"><img src="/public/images/users/<?= $user->photo ?>"></a>
                            </div>
                            <div class="col-md-9 author-name">
                                <a href="<?= Url::toRoute(['site/user', 'user_id'=>$user->user_id]);?>"><?= $user->name ?> <?= $user->surname ?></a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php echo LinkPager::widget([
    'pagination' => $pagination,
]);?>
        </div>
    </div>
</div>
