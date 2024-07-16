<h1><?= $params['post']->title ?></h1>
<div>
    <?php foreach ($params['post']->getTags() as $tag) : ?>
        <span class="badge badge-info"><?= $tag->name ?></span>
    <?php endforeach ?>
</div>
<p><?= $params['post']->content ?></p>
<a href="http://localhost/cours-2024/oop-php-framework-master/posts" class="btn btn-secondary">Retourner en arrière</a>
