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
                                <a class="header">Article <?= $article->nom ?></a>
                                <div class="meta">
                                        <span>Description</span>
                                </div>
                                <div class="description">
                                        <p>Date d'édition: <?= $article->created_at->format('d/m/Y') ?></p>
                                        <p>Description: <?= $article->description ?></p>
                                        <p>type: <?= $article->type->name ?></p>
                                        <p>Prix: <?= $article->prix ?></p>

                                </div>
                                <div class="extra">
                                        Additional Details

                                </div>
                                <p>Etat: <?= $article->status ?></p>
                        </div>
                </div>
        </div>
</div>