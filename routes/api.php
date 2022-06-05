<?php

use App\Models\website_page as ModelsWebsite_page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('website-page', function () {
    return ModelsWebsite_page::all();
});

Route::get('website-page/{id}', function ($id) {
    return ModelsWebsite_page::find($id);
});

Route::post('website-page', function (Request $request) {
    return ModelsWebsite_page::create([
        'title' => $request->title,
        'body' => $request->body,
        'userId' => $request->userId
    ]);
});

Route::put('website-page/{id}', function (Request $request, $id) {
    $websitepage = ModelsWebsite_page::findOrFail($id);
    $websitepage->update($request->all());

    return $websitepage;
});

Route::delete('website-page/{id}', function ($id) {
    ModelsWebsite_page::find($id)->delete();

    return 204;
});
