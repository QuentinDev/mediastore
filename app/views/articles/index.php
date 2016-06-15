<div class="ui vertical stripe segment">
    <div class="ui three stackable cards container">
        <?php foreach ($articles as $article): ?>
            <div class="ui card">
                <div class="image dimmable">
                    <div class="ui dimmer">
                        <div class="content">
                            <div class="center">
                                <a class="ui inverted button" href="#">Ajouter au panier</a>
                            </div>
                        </div>
                    </div>
                    <img src="http://lorempicsum.com/futurama/255/200/<?= rand(1, 5) ?>" alt="" />
                </div>
                <div class="content">
                    <a href="<?= \app\helper\Link::url('ArticlesController@detail', ['id' => $article->id])?>" class="header"><?= $article->nom ?></a>
                    <div class="meta">
                        <a class="group" href="<?= \app\helper\Link::url('ArticlesController@detail', ['id' => $article->id])?>"><?= $article->description ?></a>
                    </div>
                </div>
                <div class="extra content">
                    <div class="time"><?= $article->created_at->diffForHumans() ?></div>
                    <div class="price">
                        <?= $article->prix ?><i class="euro icon"></i>
                    </div>
                    <div class="type">
                        <a href="#<?= $article->type->name ?>">type: <?= $article->type->name ?></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
