<?php

namespace App\Http\Controllers;

use App\Models\website_page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function store(Request $request)
    {
        $pages = website_page::save();

        return response()->json($pages, 201);
    }
}
