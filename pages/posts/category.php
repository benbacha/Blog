<?php
$app = App::getInstance();
$categorie= $app->getTable('Category')->find($_GET['id']);
if($categorie === false){
    $app->notfound();
}
$articles= $app->getTable('Post')->lastByCategory($_GET['id']);
$categories = $app->getTable('Category')->all();
?>
<div class="row">
    <div class="col-sm-8">
        <div class="container">
            <ul>
                <?php

                foreach ($articles as $post) {
                    ?>
                    <h2>
                        <a href="<?= $post->url; ?>"><?= $post->title;?></a>
                    </h2>
                    <p><?php echo $post->categorie;?></p>
                    <p><?php echo $post->extrait;?></p>
                    <?php
                }
                ?>
            </ul>
            <p><a href="index.php?p=single">Single</a></p>
        </div>
    </div>
    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $category) {

                ?>
                <h2>
                    <a href="index.php?p=posts.category&id=<?php echo $category->id; ?>"><?= $category->titre;?></a>
                </h2>
            <?php } ?>
        </ul>
    </div>
</div>


