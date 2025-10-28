<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        $wallpapers = Wallpaper::with(['images', 'creator'])->orderBy('download_count', 'desc')->paginate(3);
        return $wallpapers;
    }
}
