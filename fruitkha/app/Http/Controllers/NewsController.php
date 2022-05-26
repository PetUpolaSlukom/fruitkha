<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{

    private $data = [];

    public function NewsController(){
        return [1,2];
    }

    public function index(Request $request){

        //dd($request);

        if (\request('keywordsNews') == null){
            $news = DB::table('news')
                ->where('news.active', '=', 1)
                ->join('user', 'news.id_user', '=', 'user.id_user')
                ->select('news.*', 'user.first_name', 'user.last_name')->get();
            //dd($news, 'null');
            $this->data['news'] = $news;
            return view('client.news.news', $this->data);
        }
        else{

            //dd(\request('keywordsNews'));
            $news = DB::table('news')
                ->join('user', 'news.id_user', '=', 'user.id_user')
                ->where('news.active', '=', 1)
                ->where('news.title', 'like', '%'.\request('keywordsNews').'%')
                ->orWhere('user.first_name', 'like', '%'.\request('keywordsNews').'%')
                ->orWhere('user.last_name', 'like', '%'.\request('keywordsNews').'%')
                ->select('news.*', 'user.first_name', 'user.last_name')
                ->get();
            //dd($news, \request('keywordsNews'));

            $this->data['news'] = $news;

            return response()->json([
                'success' => true,
                'news' => $this->data
            ]);
        }
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $single_news = DB::table('news')
            ->where('id_news', '=', $id)
            ->where('news.active', '=', true)
            ->join('user', 'news.id_user', '=', 'user.id_user')
            ->select('news.*', 'user.first_name', 'user.last_name')
            ->first();

        $words = str_word_count($single_news->text);
        $this->data['reading_time'] = $words/220;

        if (!$single_news){
            return redirect()->route('test')->with('error', 'Error 404');
        }

        $tags = DB::table('news_tag')
            ->where('id_news', '=', $id)
            ->join('tag', 'news_tag.id_tag', '=', 'tag.id_tag')
            ->select('tag.name')
            ->get();

        $comments = DB::table('comment')
            ->where('id_news', '=', $id)
            ->where('comment.active', '=', true)
            ->join('user', 'comment.id_user', '=', 'user.id_user')
            ->orderByDesc('created_at')
            ->get();


        $this->data['news'] = $single_news;
        $this->data['tags'] = $tags;
        $this->data['comments'] = $comments;

        return view("client.news.single-news", $this->data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
