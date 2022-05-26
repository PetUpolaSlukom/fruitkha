<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $pages = DB::table('page')->get();


        $reviews = DB::table('review')
            ->where('active', '=', true)
            ->get();

        $news = DB::table('news')
            ->join('user', 'news.id_user', '=', 'user.id_user')
            ->select('user.first_name', 'news.*')
            ->limit(3)
            ->orderByDesc('created_at')
            ->get();

        return view("client.index", [
            "pages"=> $pages,
            "reviews"=> $reviews,
            "news"=> $news
        ]);
    }
}
