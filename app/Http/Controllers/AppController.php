<?php

namespace App\Http\Controllers;

use App\Models\Wallpaper;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        $wallpapers = Wallpaper::with(['images', 'creator'])->where('is_public', '=', true)->orderBy('download_count', 'desc')->paginate(5);
        return $wallpapers;
    }
}
