<?php

namespace App\Http\Controllers;

use App\Models\MagicProduct;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MagicController extends Controller
{
    public function index()
    {
        $magic_product = MagicProduct::with('category')->get();

        return view('magic-products.catalog',
            ['magicProduct' => $magic_product]);
    }

    public function productslist()
    {
        $magic_product = MagicProduct::with(['category'])->paginate(2);

        return view('administration/products/productslist',
            ['magicProduct' => $magic_product]);
    }

    public function createMagic()
    {
        return view('administration/products/createMagic', [
            'categories' => Category::all()
        ]);

    }

    public function view(int $id)
    {
    $magicProduct = MagicProduct::with('category')->findOrFail($id);

    return view('magic-products/view', [
        'magicProduct' => $magicProduct,
    ]);
    }

    public function createProcess(Request $request)
    {
        $request->validate(MagicProduct::VALIDATION_RULES, MagicProduct::VALIDATION_MESSAGES);

        $data = $request->except(['_token']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('imagesMagic');
        }

        try {
            DB::transaction(function () use ($data) {
                $magic_product = MagicProduct::create($data);
            });

            return redirect('administracion/listado-productos')
                ->with('status.message', 'El producto mágico ' . $data['name'] . ' fue agregado correctamente');

        } catch (\Exception $e) {
            return redirect('administracion/listado-productos')
                ->with('status.message', 'Ocurrió un error inesperado al crear el producto <b>' . $data['name'] . '</b>')
                ->with('status.type', 'danger');
        }
    }

    //Eliminar
    public function deleteForm(int $id)
    {
        return view('administration/products/delete', [
            'magicProduct' => MagicProduct::findOrFail($id),
        ]);
    }

    public function deleteProcess(int $id)
    {
        try {
            $magic_product = MagicProduct::findOrFail($id);

            DB::transaction(function () use ($magic_product) {
/*                 $magic_product->types()->detach(); */
                $magic_product->delete();
            });

            //Si tiene una imagen la borramos
            if ($magic_product->image !== null) {
                Storage::delete($magic_product->image);
            }

            return redirect('/administracion/listado-productos')
            ->with('status.message', 'El producto ' . e($magic_product->name) . ' se eliminó con éxito');

        } catch (\Exception $e) {
            return redirect('/administracion/listado-productos')
                ->with('status.message', 'Ocurrió un error inesperado al intentar eliminar la película <b>' . e($magic_product->name) . '</b>')
                ->with('status.type', 'danger');
        }

    }

    //Editar

    public function editForm(int $id)
    {
        return view('administration/products/edit', [
            'magicProduct' => MagicProduct::with('category')->findOrFail($id),
            'categories' => Category::all()
        ]);
    }

        

    public function editProcess(int $id, Request $request)
    {

    $request->validate(MagicProduct::VALIDATION_RULES, MagicProduct::VALIDATION_MESSAGES);

    $data = $request->except('_token');
try {
    $magic_product = MagicProduct::findOrFail($id);
    \Log::info('MagicProduct found');

    if ($request->hasfile('image')) {
        \Log::info('Processing image');
        $oldImage = $magic_product->image;
        $data['image'] = $request->file('image')->store('imagesMagic');
        Image::make(storage_path('app/public/' . $data['image']))
            ->resize(500, 500)
            ->save();
        $magic_product->image = $data['image'];
        \Log::info('Image processed');
    }

    \Log::info('Filling magic_product');
    $magic_product->fill($data);
    \Log::info('Saving magic_product');
    $magic_product->save();
    \Log::info('MagicProduct saved');

    if (isset($oldImage) && Storage::has($oldImage)) {
        \Log::info('Deleting old image');
        Storage::delete($oldImage);
        \Log::info('Old image deleted');
    }

    return redirect('/administracion/listado-productos')
        ->with('status.message', 'El producto  ' . e($magic_product->name) . ' se editó con éxito');
} catch (\Exception $e) {
    \Log::error('Exception caught: ' . $e->getMessage());
    return redirect('/administracion/listado-productos')
        ->with('status.message', 'Ocurrió un error inesperado al intentar editar el artículo <b>  ' . e($magic_product->name) . '</b>')
        ->with('status.type', 'danger');
}
}
}
