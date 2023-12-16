<?php

namespace App\Http\Controllers;

use App\Models\MagicProduct;
use App\Models\Rating;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class MagicController extends Controller
{
    public function index()
    {
        $magic_product = MagicProduct::with('rating')->get();

        return view('magic-products.catalog',
            ['magicProduct' => $magic_product]);
    }

    public function productslist()
    {
        $magic_product = MagicProduct::with(['rating', 'types'])->paginate(2);

        return view('administration/products/productslist',
            ['magicProduct' => $magic_product]);
    }

    public function createMagic()
    {
        return view('administration/products/createMagic', [
            'ratings' => Rating::all(),
            'types' => Type::orderBy('name')->get(),
        ]);

    }

    public function view(int $id)
    {
        return view('magic-products/view', [
            'magicProduct' => MagicProduct::findOrFail($id),
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
                // Tipos
                $magic_product->types()->attach($data['types'] ?? []);
            });

            return redirect('administracion/listado-productos')
                ->with('status.message', 'El producto mágico ' . $data['name'] . ' fue agregado correctamente');

        } catch (\Exception $e) {
            return redirect('administracion/listado-productos')
                ->with('status.message', 'Ocurrió un error inesperado al crear la película <b>' . $data['name'] . '</b>')
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

            //Iniciamos la transacción
            DB::transaction(function () use ($magic_product) {
                $magic_product->types()->detach();
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
            'magicProduct' => MagicProduct::findOrFail($id),
            'ratings' => Rating::all(),
            'types' => Type::orderBy('name')->get(),
        ]);
    }

    public function editProcess(int $id, Request $request)
    {
        $request->validate(MagicProduct::VALIDATION_RULES, MagicProduct::VALIDATION_MESSAGES);

        $data = $request->except('_token');

        try {
            $magic_product = MagicProduct::findOrFail($id);

            if ($request->hasfile('image')) {
                $data['image'] = $request->file('image')->store('imagesMagic');
                $oldImage = $magic_product->image;
                //Redimensión de imagenes
                Image::make(storage_path('app/public/' . $data['image']))
                    ->resize(500, 500)
                    ->save();
            }

            DB::transaction(function () use ($magic_product, $data) {
                //Actualizamos los tipos
                $magic_product->types()->sync($data['types']) ?? [];
                $magic_product->update($data);
            });

            if (isset($oldImage) && Storage::has($oldImage)) {
                Storage::delete($oldImage);
            }
            return redirect('/administracion/listado-productos')
                ->with('status.message', 'El producto  ' . e($magic_product->name) . ' se editó con éxito');
        } catch (\Exception $e) {
            return redirect('/administracion/listado-productos')
                ->with('status.message', 'Ocurrió un error inesperado al intentar editar la película <b>  ' . e($magic_product->name) . '</b>')
                ->with('status.type', 'danger');
        }
    }
}
