<?php

namespace App\Service;

use Illuminate\Support\Facades\Http;

class WikiService {
    private static $object = null; 

    public static function object() {
        if (self::$object === null) $object = new WikiService();
        return $object;
    }
    public function parseAll($title) { 
        $res = Http::withHeaders(['User-Agent' => 'KZ-Culture-Service/Laravel']) -> get('https://kk.wikipedia.org/w/api.php', [
            'action' => 'parse',
            'page' => $title,
            'format' => 'json'
        ]);
    
        return json_decode($res, true);
    }
    public function parseIntro($title) {
        $res = Http::withHeaders(['User-Agent' => 'KZ-Culture-Service/Laravel']) -> get('https://kk.wikipedia.org/w/api.php?action=query&titles='.$title.'&prop=extracts&exintro&format=json');

        return json_decode($res, true);
    }
}