<?php

namespace app\helper;

use app\models\Article;
use Carbon\Carbon;

class ArticleHelper
{
	public static function editArticle($id, $nom, $description, $prix, $editeur, $typeId)
	{
		$article = Article::where('id', '=', $id)->first();
		$now = Carbon::now();
		$article->nom = $nom;
		$article->description = $description;
		$article->prix = $prix;
		$article->editeur = $editeur;
		$article->type_id = $typeId;
		$article->updated_at = $now;

		$article->save();
		return true;
	}

	public static function addArticle($nom, $description, $prix, $editeur, $typeId)
	{
		$article = new Article;
		$now = Carbon::now();
		$article->nom = $nom;
		$article->description = $description;
		$article->prix = $prix;
		$article->editeur = $editeur;
		$article->type_id = $typeId;
		$article->created_at = $now;
		$article->updated_at = $now;

		$article->save();
		return $article;
	}
}
