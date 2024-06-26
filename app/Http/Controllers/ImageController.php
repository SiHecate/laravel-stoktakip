<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Helper;

class ImageController extends Controller
{
    /**
     * Resim yükleme işlemi.
     *
     * @param \Illuminate\Http\Request $request İstek nesnesi.
     * @return \Illuminate\Http\RedirectResponse Yönlendirme veya yanıt nesnesi.
     */
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $folderName = $request->input('folderName', 'images'); // varsayılan klasör adı 'images'

        $imagePath = Helper::uploadImage($image, $folderName);

        if ($imagePath) {
            return redirect()->back()->with('success', 'Resim başarıyla yüklendi!')->with('imagePath', $imagePath);
        } else {
            return redirect()->back()->with('error', 'Resim yüklenirken bir hata oluştu.');
        }
    }

    /**
     * Resim silme işlemi.
     *
     * @param \Illuminate\Http\Request $request İstek nesnesi.
     * @return \Illuminate\Http\RedirectResponse Yönlendirme veya yanıt nesnesi.
     */
    public function delete(Request $request)
    {
        $image = $request->input('image');
        $folderName = $request->input('folderName', 'images');

        Helper::removeImage($image, $folderName);

        return redirect()->back()->with('success', 'Resim başarıyla silindi.');
    }

    /**
     * Resim güncelleme işlemi.
     *
     * @param \Illuminate\Http\Request $request İstek nesnesi.
     * @return \Illuminate\Http\RedirectResponse Yönlendirme veya yanıt nesnesi.
     */
    public function update(Request $request)
    {
        $image = $request->input('image');
        $folderName = $request->input('folderName', 'images');

        $updatedImagePath = Helper::updateImage($image, $folderName);

        if ($updatedImagePath) {
            return redirect()->back()->with('success', 'Resim başarıyla güncellendi!')->with('updatedImagePath', $updatedImagePath);
        } else {
            return redirect()->back()->with('error', 'Resim güncellenirken bir hata oluştu.');
        }
    }

    /**
     * Resim gösterme işlemi.
     *
     * @param \Illuminate\Http\Request $request İstek nesnesi.
     * @return \Illuminate\Http\RedirectResponse Yönlendirme veya yanıt nesnesi.
     */
    public function show(Request $request)
    {
        $image = $request->input('image');
        $folderName = $request->input('folderName', 'images');

        $imagePath = Helper::showImage($image, $folderName);

        if ($imagePath) {
            return response()->file($imagePath);
        } else {
            return redirect()->back()->with('error', 'Resim gösterilirken bir hata oluştu.');
        }
    }
}
