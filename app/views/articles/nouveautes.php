<div class="ui vertical stripe segment">
    <?php app\helper\Auth::getFlash() ?>
    <div class="ui three stackable cards container">
        <?php foreach ($articles as $article): ?>
            <?php require 'app/views/_partial/item.php'; ?>
        <?php endforeach; ?>
    </div>
</div>
