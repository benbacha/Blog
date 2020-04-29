<div class="row">

    <div class="col-sm-8">
        <div class="container">
<?php
$app = App::getInstance();
$post= $app->getTable('Post')->find($_GET['id'],false);
if($post === false){
    $app->notfound();
}

foreach ($post as $post){
?>

<h1><?= $post->title; ?></h1>

<p><em><?= $post->categorie; ?></em></p>

<p><em><?= $post->content; ?></em></p>


<?php
}
?>

        </div>
    </div>
</div>

