<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


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


        if ($request->hasFile('image')) {

            $path = $request->file('image')->store('imagesArticles');

            $data['image'] = $path;
        }

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

        return redirect('/administracion/listado-noticias')
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

        try {
            $article = Article::findOrFail($id);

            if ($request->hasfile('image')) {
                $data['image'] = $request->file('image')->store('imagesArticles');
                $oldImage = $article->image;
                //Redimensión de imagenes
/*                 Image::make(storage_path('app/public/' . $data['image']))
                    ->resize(500, 500)
                    ->save(); */
            }

                DB::transaction(function () use ($article, $data) {
                $article->update($data);
            });

            if (isset($oldImage) && Storage::has($oldImage)) {
                Storage::delete($oldImage);
            }

            return redirect('/administracion/listado-noticias')
                ->with('status.message', 'El artículo  ' . e($article->name) . ' se editó con éxito');
                
            } catch (\Exception $e) {
            return redirect('/administracion/listado-noticias')
                ->with('status.message', 'Ocurrió un error inesperado al intentar editar el artículo <b>  ' . e($article->name) . '</b>')
                ->with('status.type', 'danger');
          }

/*         $article = Article::findOrFail($id);

        $article->update($data);

        return redirect('/administracion/listado-noticias')
            ->with('status.message', 'El artículo  ' . e($article->title) . ' se editó con éxito'); */
    }

}
