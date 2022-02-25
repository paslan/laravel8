<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlingController extends Controller
{

    public function show()
    {

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://bling.com.br/Api/v2/produtos/json",
        [
            'query' => 
            [
                'apikey' => '05573201d2f0927ef657fea413ef73b85f13bad027decfb1e4829cde3fb880402919eb3a',
                'estoque' => 'S',
                'imagem' => 'S'
            ]
        ]);
        
        //echo $response->getStatusCode(); // 200
        //echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
        //echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'
        
        $data= $response->getBody()->getContents();
        $body = $response->getBody();
        //dd($body);

        //dd(json_decode($data, true));

        $data = json_decode($data, true);

        return view('admin.pages.products.bling', ['produtos' => $data]);
   }


}
