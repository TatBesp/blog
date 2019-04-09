<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Блог на Yii - страница пользователя';
?>
 <div class="main">
    <div class="body-content">
        <div class="main-content">
<div class="row">
<div class="col-md-9">
    <div class="articles">
        <?php if ($articles) {foreach($articles as $article):?>
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
                               <?php if($user->user_id==$user->getUserId()) { ?><a class="update-btn" href="<?= Url::toRoute(['/admin/article/view', 'id'=>$article->article_id]);?>">Редактировать</a> <? } ?>
                           </div>
                         </div>
                          <div class="row article-description">
                              <p><?= $article->description ?></p>
                            </div>
                             <div class="row article-footer">
                                <div class="col-md-9 article-author">
                                    <a href="<?= Url::toRoute(['site/user', 'user_id'=>$article->user_id]);?>"><?= $user->name?> <?= $user->surname?></a>
                                </div>
                                <div class="col-md-3 article-button">
                                    <a class="article-btn" href="<?= Url::toRoute(['site/article', 'id'=>$article->article_id]);?>">Читать далее</a>
                                </div>
                             </div>
                        </div>
                     </div>
                    <?php endforeach; } else { ?>
                    <div class="row article">
                        <div class="col-md-12 empty-post">
                    <p>У этого автора пока нет постов.</p>
                        </div>
                    </div>
                        <?php } ?>
                 </div>
             </div>
                 <div class="col-md-3">
                    <div class="user">
        			     <div class="user-photo">
                            <img src="<?= $user->getImage(); ?>">

                        </div>
                        <div class="user-info">
                            <p class="title-info">Имя </p>
                            <p> <?= $user->name ?> <?= $user->surname ?> <?= $user->patronymic ?></p>
                            <p class="title-info">Email </p>
                            <p> <?= $user->email ?> </p>
                            <?php if($user->user_id==$user->getUserId()) { ?> <p class="user-btn"><a class="update-btn" href="http://blog/site/profile">Редактировать профиль</a> </p>
                            <p class="user-btn"><a href="/admin/article/create" class="update-btn">Создать новый пост</a></p><? } ?>
                        </div>
                    </div>
                </div>
            </div>
             <?php echo LinkPager::widget([
    'pagination' => $pagination,
]);?>
		</div>
    </div>
</div>