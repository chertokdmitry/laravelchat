<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Elasticsearch\ClientBuilder;
use App\Book;
use App\Author;

class SearchUpdateController extends Controller
{
    public function books()
    {
        $client = ClientBuilder::create()->build();

        $deleteParams = [
            'index' => 'books'
        ];
        $client->indices()->delete($deleteParams);

        $items = Book::all();

        foreach ($items as $item) {
            $params = [
                'index' => 'books',
                'type' => 'all',
                'id' => $item->id,
                'body' => [
                    "id" => $item->id,
                    "title" => $item->title,
                    "author_id" => $item->author_id
                ]
            ];

            $client->index($params);
        }

        $view = view('home',  ['message'=> 'Books search index updated!'])->render();
        return (new Response($view));
    }

    public function authors()
    {
        $client = ClientBuilder::create()->build();

//        $deleteParams = [
//            'index' => 'authors'
//        ];
//        $client->indices()->delete($deleteParams);

        $items = Author::all();

        foreach ($items as $item) {
            $params = [
                'index' => 'authors',
                'type' => 'all',
                'id' => $item->id,
                'body' => [
                    "id" => $item->id,
                    "first" => $item->first,
                    "last" => $item->last
                ]
            ];

            $client->index($params);
        }

        $view = view('home',  ['message'=> 'Authors search index updated!'])->render();
        return (new Response($view));
    }
}
