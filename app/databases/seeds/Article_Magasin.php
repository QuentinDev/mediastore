<?php
/**
 * Created by PhpStorm.
 * User: web
 * Date: 13/06/2016
 * Time: 10:39
 */

namespace app\databases\seeds;


class Article_Magasin
{
    public function run()
    {
        foreach (\app\models\Article::all() as $key => $article) {
            $magasin_id = ($key % 2 == 0) ? 1 : 2;
            $article->magasins()->attach($magasin_id, ['quantity' => rand(0, 100), 'seuil' => rand(0, 100)]);
        }
    }
}