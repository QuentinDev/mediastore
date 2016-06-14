<div class="articles">

    <?php foreach ($articles as $article): ?>
       <p><?= $article->nom ?></p>
        <p><?= $article->type ?></p>
    <?php endforeach; ?>
</div>


