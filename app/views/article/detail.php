<div class="ui top attached tabular menu" xmlns="http://www.w3.org/1999/html">
        <div class="active item">Détail Article</div>
</div>
<div class="ui bottom attached active tab segment">
        <div class="ui items">
                <div class="item">
                        <div class="image">
                                <img src="http://lorempicsum.com/futurama/255/200/<?= rand(1, 5) ?>" alt="" />
                        </div>
                        <div class="content">
                                <a class="header">Libellé</a>
                                <p><?= $article->nom ?></p>
                                <div class="meta">
                                        <span>Description</span>
                                </div>
                                <div class="description">
                                        <p><?= $article->description ?></p>
                                </div>
                                <div class="extra">
                                        Type
                                        <p><?= $article->type->name ?></p>
                                </div>
                                <p>Prix <?= $article->prix ?><i class="euro icon"></i></p>
                        </div>
                </div>
        </div>
</div>