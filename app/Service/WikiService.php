<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class WikiService {
    private static $object = null; 

    private static $wiki_api = 'https://kk.wikipedia.org/w/api.php';

    private $cached = [];

    public static function object() {
        if (self::$object === null) $object = new WikiService();
        return $object;
    }

    public function parseAll($title) {
        if ($this->cache($title)) return cache($title);

        $res = Http::withHeaders(['User-Agent' => 'KZ-Culture-Service/Laravel']) -> get(self::$wiki_api, [
            'action' => 'parse',
            'page' => $title,
            'format' => 'json'
        ]);

        $this->setCache($title,json_decode($res,true), "all");
        return json_decode($res, true);
    }
    
    public function parseIntro($title) {
        if ($this->cache($title)) return cache($title);
        
        $res = Http::withHeaders(['User-Agent' => 'KZ-Culture-Service/Laravel']) -> get(self::$wiki_api.'?action=query&titles='.$title.'&prop=extracts&exintro&format=json');

        $this->setCache($title, json_decode($res,true), "intro");
        return json_decode($res, true);
    }

    private function cache($title) {
        $find = array_find_key($this->cached, fn ($value, $key) => $key == $title);
        if ($find) return $find;
        else return null;
    }

    private function setCache($title, $data, $type) {
        $this->cached[$title."_".$type] = $data;
    }
}