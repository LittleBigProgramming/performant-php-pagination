<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Transformers\ArticleTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class ArticleController extends Controller {

    /**
     * @return mixed
     */
    public function index() {
        $articles = Article::latestFirst()->paginate(15);
        $articlesCollection = $articles->getCollection();

        return fractal()
            ->collection($articlesCollection)
            ->parseIncludes(['user'])
            ->transformWith(new ArticleTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($articles))
            ->toArray();
    }
}
