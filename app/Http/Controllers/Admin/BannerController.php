<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;
use App\Models\Banner; // Asegúrate de importar tu modelo Banner
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Crea un nuevo banner
     */
    public function store(Request $request)
    {

        $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:3072', // Máximo 3MB
            'description'  => 'nullable|string|max:255',
        ], [
            'banner_image.required' => 'La imagen del banner es obligatoria.',
            'banner_image.image'    => 'El archivo debe ser una imagen válida.',
            'banner_image.max'      => 'La imagen no debe pesar más de 3MB.',
        ]);

    
        if ($request->hasFile('banner_image')) {
            
            // Guarda en: storage/app/public/banner-images/nombre_aleatorio.png
            // Retorna la ruta relativa: "banner-images/nombre_aleatorio.png"
            $rutaImagen = $request->file('banner_image')->store('banner-images', 'public');

            Banner::create([
                'image'       => $rutaImagen,
                'description' => $request->description,
            ]);

            return redirect()->back()->with('success', '¡Banner creado con éxito!');
        }

        return redirect()->back()->with('error', 'No se pudo procesar la imagen del banner.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'description'  => 'nullable|string|max:255',
        ], [
            'banner_image.image'    => 'El archivo debe ser una imagen válida.',
            'banner_image.max'      => 'La imagen no debe pesar más de 3MB.',
        ]);

        $banner = Banner::findOrFail($id);

        if ($request->hasFile('banner_image')) {
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }
            $rutaNuevaImagen = $request->file('banner_image')->store('banner-images', 'public');
            $banner->image = $rutaNuevaImagen;
        }

        $banner->description = $request->description;

        $banner->save();

        return redirect()->back()->with('success', '¡El banner se ha actualizado correctamente!');
    }
}
