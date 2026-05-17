<?php

namespace App\Http\Controllers;

use App\Service\WikiService;
use OpenApi\Attributes as OA;

class WikiController extends Controller {

    #[OA\Get(
        path: "/wiki/{title}",
        summary: "Get whole information",
        responses: [
            new OA\Response(
                response: 200,
                description: "Success"
            )
        ]
    )]
    public function getInfo($title) {
        $wikiService = WikiService::object();
        $data = $wikiService->parseAll($title);
        return view('wiki', ['data' => $data["parse"]["text"]["*"] ?? ""]);
    }

    #[OA\Get(
        path: "/wiki/{title}/intro",
        summary: "Get introduction data",
        responses: [
            new OA\Response(
                response: 200,
                description: "Success"
            )
        ]
    )]
    public function getIntro($title) {
        $wikiService = WikiService::object();
        $data = $wikiService->parseIntro($title);
        return $data ?? "";
    }
}