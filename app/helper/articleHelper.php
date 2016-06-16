<?php

namespace app\helper;

use app\models\Article;
use Carbon\Carbon;

class ArticleHelper
{
	public static function editArticle($id, $nom, $status, $description, $prix, $editeur, $typeId, $seuil)
	{
		$article = Article::where('id', '=', $id)->first();
		$now = Carbon::now();
		$article->nom = $nom;
		$article->status = $status;
		$article->description = $description;
		$article->prix = $prix;
		$article->seuil = $seuil;
		$article->editeur = $editeur;
		$article->type_id = $typeId;
		$article->updated_at = $now;
		$article->save();

		return $article;
	}

	public static function addArticle($nom, $status, $description, $prix, $editeur, $typeId, $seuil)
	{
		$article = new Article;
		$now = Carbon::now();
		$article->nom = $nom;
		$article->status = $status;
		$article->description = $description;
		$article->prix = $prix;
		$article->seuil = $seuil;
		$article->editeur = $editeur;
		$article->type_id = $typeId;
		$article->created_at = $now;
		$article->updated_at = $now;
		$article->save();

		return $article;
	}

	public static function removeOutofstock() {
		return Article::where('status', '=', 'hors stock')->delete();
	}
}
