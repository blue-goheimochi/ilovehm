<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Instagram;

class InstagramController extends Controller
{
    public function getTagsmediarecent(Request $request)
    {
        $data = $request->all();

        $count      = isset($data['count'])      ? $data['count'] : 20;
        $max_tag_id = isset($data['max_tag_id']) ? $data['max_tag_id'] : false;
        $min_tag_id = isset($data['min_tag_id']) ? $data['min_tag_id'] : false;

        $instagram = new Instagram();
        $json = $instagram->callTagsMediaRecentAPI('浜松まつり', $count, $max_tag_id, $min_tag_id);
        return $json;
    }
}
