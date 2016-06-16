<div class="ui vertical stripe segment">


    <h1 class="ui header">Recherche sur <?= e($nom); ?></h1>

    <div class="ui three stackable cards container">
        <?php if (count($articles) == 0): ?>
            <h3>Pas de résulats</h3>
        <?php endif; ?>
        <?php foreach ($articles as $article): ?>
            <?php require 'app/views/_partial/item.php'; ?>
        <?php endforeach; ?>
    </div>
</div>