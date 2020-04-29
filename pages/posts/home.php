<div class="row">

    <div class="col-sm-8">
        <div class="container">
            <ul>
                <?php

                foreach (App::getInstance()->getTable('Post')->last() as $post) {
                    ?>
                    <h2>
                        <a href="<?= $post->url; ?>"><?= $post->title;?></a>
                    </h2>
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
            <?php foreach (App::getInstance()->getTable('Category')->all() as $category) {

                ?>
                <h2>
                    <a href="index.php?p=posts.category&id=<?php echo $category->id; ?>"><?= $category->titre;?></a>
                </h2>
                <?php } ?>
        </ul>
    </div>
</div>


