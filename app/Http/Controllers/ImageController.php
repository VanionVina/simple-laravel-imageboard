<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File; 

class ImageController extends Controller
{
    protected $_tag;
    protected $_image;

    public function __construct(){
        $this->_tag = new Tag();
        $this->_image = new Image();
    }

    public function show($id) {
        $image = Image::findOrFail($id);
        return view('image.show', [
            'image' => $image,
            'all_tags' => $this->_tag->latest()
        ]);
    }
    public function create() {
        return view('image.create', [
            'all_tags' => $this->_tag->latest()
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png', 'max:5048'],
            'tags' => 'required'
        ]);

        $this->_image->saveImage($request);

        return redirect(route('index'));
    }

    public function edit($id) {
        $image = Image::find($id);
        if (Auth::id() != $image->user_id) {
            return redirect(route('show_image', $id));
        }

        return view('image.edit', [
            'all_tags' => $this->_tag->latest(),
            'image' => $image
        ]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'tags' => 'required'
        ]);

        $this->_image->updateImage($request);

        return redirect(route('show_image', $id));
    }

    public function destroyConfirm($id) {
        return redirect(route('show_image', $id))->with('confirm', true);
    }

    public function destroy($id) {
        $image = Image::find($id);
        if (Auth::id() != $image->user_id) {
            return redirect(route('show_image', $id));
        }

        $this->_image->destroyImageTags($image);

        return redirect(route('index'));
    }
}
