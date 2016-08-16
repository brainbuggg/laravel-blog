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


class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); /* Login Protection */
    }

    public function index()
    {
    	$categories = Category::get();
    	return view('categories/index', compact('categories'));
    }

    public function show(Category $category)
    {
    	return view('categories/show', compact('category'));
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         =>  'required|min:3',
            'slug'         =>  'required|min:3'
        ]);

        Category::create($request->all());

        flash()->success('Your category has been created.');
        return redirect('categories');
    }

    public function edit(Category $category)
    {
        return view('categories/edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|min:3',
            'slug'      =>  'required|min:3',
        ]);

        $category->update($request->all());

        /*flash()->overlay('Your category has been updated.', 'Done!');*/
        flash()->success('Your category has been updated.');
        return redirect('categories');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        flash()->warning('Your category has been deleted');
        return redirect('categories');
    }
}
