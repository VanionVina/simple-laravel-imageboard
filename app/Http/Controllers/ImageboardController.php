<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Http\Request;

class ImageboardController extends Controller
{
    protected $_tag;
    protected $_image;

    public function __construct(){
        $this->_tag = new Tag();
        $this->_image = new Image();
    }

    public function index() {
        return view('imageboard.index', [
            'images' => $this->_image->latest(),
            'all_tags' => $this->_tag->latest()
        ]);
    }

    public function tag($name) {
        return view('imageboard.index', [
            'images' => $this->_tag->show($name),
            'all_tags' => $this->_tag->latest()
        ]);
    }
    public function tagSearch(Request $request) {
        return view('imageboard.index', [
            'images' => $this->_tag->tagsSearch($request),
            'all_tags' => $this->_tag->latest()
        ]);
    }
}
