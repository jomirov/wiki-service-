<?php

namespace App\Http\Controllers;

use App\Service\WikiService;
use OpenApi\Attributes as OA;

class WikiController extends Controller {

    #[OA\Get(
        path: "/wiki/{title}",
        summary: "Search for information",
        responses: [
            new OA\Response(
                response: 200,
                description: "Success"
            )
        ]
    )]
    public function getInfo($title) {
        $wikiService = WikiService::object();
        $data = $wikiService->searchData($title);
        return view('wiki', [
            'data' => $data["parse"]["text"]["*"] ?? ""
        ]);
    }
}