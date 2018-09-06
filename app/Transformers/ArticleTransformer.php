<?php

namespace App\Transformers;

use App\Article;

class ArticleTransformer extends \League\Fractal\TransformerAbstract {

    protected $availableIncludes = ['user'];

    public function transform(Article $article) {
        return [
            'id' => $article->id,
            'title' => $article->title,
            'created_at_human' => $article->created_at->diffForHumans(),
        ];
    }

    /**
     * @param Article $article
     * @return \League\Fractal\Resource\Item
     */
    public function includeUser(Article $article) {
        return $this->item($article->user, new UsersTransformer);
    }
}