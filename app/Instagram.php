<?php

namespace App;

use Cache;

class Instagram
{
    const CACHE_EXPIRE = 10; // min

    private $_access_token = null;

    private $_cache_key = [
        'tags_media_resent' => 'tags_media_recent_%s'
    ];

    public function __construct()
    {
        $this->_access_token = env('INSTAGRAM_API_ACCESS_TOKEN', null);
    }

    public function callTagsMediaRecentAPI($tag_name, $count = 20, $max_tag_id = false, $min_tag_id = false)
    {
        $cache_str = 'latest' . '_' . $count;
        if ($max_tag_id && $min_tag_id) {
            $cache_str = $max_tag_id . '_' . $min_tag_id . '_' . $count;
        } elseif ($max_tag_id) {
            $cache_str = 'max_' . $max_tag_id . '_' . $count;
        } elseif ($min_tag_id) {
            $cache_str = 'min_' . $min_tag_id . '_' . $count;
        }
        $cache_key = sprintf($this->_cache_key['tags_media_resent'], $cache_str);

        $data = Cache::get($cache_key);
        if (!is_null($data)) {
            return $data;
        }

        $request_url    = 'https://api.instagram.com/v1/tags/'. urlencode($tag_name) . "/media/recent";
        $request_method = 'GET';
        $params = array(
            "access_token" => $this->_access_token,
            "count" => $count,
        );

        if ($max_tag_id) {
            $params['max_tag_id'] = $max_tag_id;
        }
        if ($min_tag_id) {
            $params['min_tag_id'] = $min_tag_id;
        }

        $json = $this->_callApi($request_url, $request_method, $params);

        if (count($json) > 0) {
            Cache::put($cache_key, $json, self::CACHE_EXPIRE);
        }

        return $json;
    }

    private function _callApi($request_url, $request_method, $params)
    {
        $uurl = $request_url;
        if ($params) {
            $uurl .= '?' . http_build_query($params);
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $uurl);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $request_method);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 5);
        $res1 = curl_exec($curl);
        $res2 = curl_getinfo($curl);
        curl_close($curl);
        $json = substr($res1, $res2['header_size']);
        $header = substr($res1, 0, $res2['header_size']);
        sleep(1);
        return $json;
    }
}
