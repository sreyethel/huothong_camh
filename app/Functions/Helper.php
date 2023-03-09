<?php

use Illuminate\Database\Eloquent\Collection;

function customUrl($url, $queryParam)
{
    $pattern = "/\?/i";
    $query = "";
    $i = 0;
    $parseUrl = parse_url($url, PHP_URL_QUERY);
    parse_str($parseUrl, $params);
    foreach (collect($queryParam) as $key => $value) {
        if (!isset($params[$key])) {
            if ($i == 0) {
                $hasQuery = preg_match($pattern, $url);
                if ($hasQuery < 1) {
                    $query .= '?' . $key . '=' . $value;
                } else {
                    $query .= '&' . $key . '=' . $value;
                }
            } else {
                $query .= '&' . $key . '=' . $value;
            }
        }
        $i++;
    }
    return $url ? $url . $query : '';
}

function routeActive(string $route)
{
    $arr = explode(',', $route);
    foreach ($arr as $item) {
        if (request()->is("$item")) {
            return true;
        }
    }
    return false;
}

if (!function_exists('json')) {
    function json($arg, $encode = true)
    {
        if ($encode) {
            return json_encode($arg);
        }
        return json_decode($arg);
    }
}

if (!function_exists('toObject')) {
    function toObject($data)
    {
        if ($data instanceof \Illuminate\Database\Eloquent\Model) {
            $data = $data->toArray();
        }
        if (is_string($data)) {
            $data = json_decode($data);
        }
        if($data instanceof Collection){
            $data = $data->toArray();
        }
        if(is_object($data)){
            $data = (array)$data;
        }
        if (is_array($data)) {
            $object = new stdClass();
            foreach ($data as $key => $value) {
                if (is_string($value)) {
                    $string = json_decode($value);
                    if (is_object($string) || is_array($string)) {
                        $value = $string;
                    }
                }
                if (is_array($value)) {
                    $object->$key = toObject($value);
                } else {
                    $object->$key = $value;
                }
            }
            return $object;
        }
        return $data;
    }
}
