<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function articleList()
    {
        $article = Article::all();

        return view('news.NewsTabloid',
            ['article' => $article]);
    }

    public function blogList()
    {
        $article = Article::all();

        return view('administration.blog.newsList',
            ['article' => $article]);
    }

    //Crear artículo
    public function createArticle()
    {
        return view('administration.blog.createArticle', ['article' => Article::all()]);
    }

    public function createProcess(Request $request)
    {
        $request->validate(Article::VALIDATION_RULES, Article::VALIDATION_MESSAGES);

        $data = $request->except(['_token']);

        $data['user_id'] = Auth::id();

        Article::create($data);

        return redirect('/administracion/listado-noticias')
            ->with('status.message', 'El artículo ' . $data['title'] . ' fue agregado correctamente');
    }

    //Eliminar
    public function deleteForm(int $id)
    {
        return view('administration.blog.delete', [
            'article' => Article::findOrFail($id),
        ]);
    }

    public function deleteProcess(int $id)
    {
        $article = Article::findOrFail($id);

        $article->delete();

        return redirect('/administracion/listado-productos')
            ->with('status.message', 'El artículo ' . e($article->title) . ' se eliminó con éxito');
    }

    public function view(int $id)
    {
        return view('news.view', [
            'article' => Article::findOrFail($id),
        ]);
    }

    //Editar
    public function editForm(int $id)
    {
        return view('administration.blog.edit', [
            'article' => Article::findOrFail($id),
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $request->validate(Article::VALIDATION_RULES, Article::VALIDATION_MESSAGES);

        $data = $request->except('_token');

        $article = Article::findOrFail($id);

        $article->update($data);

        return redirect('/administracion/listado-noticias')
            ->with('status.message', 'El artículo  ' . e($article->title) . ' se editó con éxito');
    }

}
