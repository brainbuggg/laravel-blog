<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Tag;
use App\Http\Requests;
use Carbon\Carbon;
use Auth;
use Session;

/*use App\Http\Requests\ArticleRequest;*/


class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); /* Login Protection */
    }

    public function index(Article $article)
    {
        // published articles
    	$pubArticles = $article->latest('published_at')->published()->get();

        // unpublished articles
        $unpubArticles = $article->oldest('published_at')->unpublished()->get();

    	return view('articles.index', compact('pubArticles','unpubArticles'));
    }

    public function show(Article $article)
    {
    	return view('articles/show', compact('article'));
    }

    public function create()
    {
        $categories = Category::lists('name','id');
        $tags = Tag::lists('name','id');
        return view('articles/create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $this->createArticle($request);

        flash()->success('Your article has been created.');
        /*Session::flash('alert_dismiss', true);*/

        return redirect('articles');
    }

    public function edit(Article $article)
    {
        $categories = Category::lists('name','id');
        $tags = Tag::lists('name', 'id');
        return view('articles/edit', compact('article','categories','tags'));
    }

    public function update(Article $article, Request $request)
    {
        $this->validate($request, [
            'title'         =>  'required|min:10',
            'body'          =>  'required|min:20',
            'published_at'  =>  'required|date'
        ]);

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        /*Session::flash('flash_message', 'The article: <b>'. $article->title .'</b> has been edited.');
        Session::flash('alert_dismiss', true);*/

        flash()->overlay('Your article has been updated.', 'Done!');
        return redirect('articles');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        flash()->warning('Your article has been deleted');
        return redirect('articles');
    }

    private function createArticle(Request $request)
    {
        $this->validate($request, [
            'title'         =>  'required|min:10',
            'body'          =>  'required|min:20',
            'published_at'  =>  'required|date',
        ]);
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));


        return $article;
    }

    private function syncTags(Article $article, $tags)
    {
        $article->tags()->sync((array) $tags);
    }

}
