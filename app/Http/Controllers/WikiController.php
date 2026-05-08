<?php

namespace App\Http\Controllers;

use App\Service\WikiService;

class WikiController extends Controller {
    public function getInfo($title) {
        $wikiService = WikiService::object();
        $data = $wikiService->searchData($title);
        return view('wiki', [
            'data' => $data["parse"]["text"]["*"] ?? ""
        ]);
    }
}