<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Instagram;

Route::get('/', function () {

    $instagram = new Instagram();
    $json = $instagram->callTagsMediaRecentAPI('浜松まつり');
    $data = json_decode($json);

    return view('index', ['items' => $data->data, 'max_tag_id' => $data->pagination->next_max_id]);

});

Route::controller('instagram', 'InstagramController');

Route::get('about', function () {
    return view('about');
});
