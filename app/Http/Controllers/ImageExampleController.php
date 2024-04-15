<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImageExample;

class ImageExampleController extends Controller
{
    public function index()
    {
        $images = ImageExample::all();

        for ($i=0; $i < count($images); $i++) {
            $images[$i]->image = asset('images/'.$images[$i]->image);
        }
        return view('image-example', compact('images'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        ImageExample::create([
            'image' => $imageName,
            'title' => $request->title,
        ]);

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName)
            ->with('title',$request->title);
    }

    public function show($image)
    {
        $image = ImageExample::where('image', $image)->first();
        return view('show-image', compact('image'));
    }

    public function destroy($image)
    {
        $image = ImageExample::where('image', $image)->first();
        $image->delete();
        $image_path = public_path('images/'.$image->image);
        unlink($image_path/*public_path('images/'.$image->image)*/);
        return redirect()->route('image-example.index')
            ->with('success','Image deleted successfully');
    }
}
