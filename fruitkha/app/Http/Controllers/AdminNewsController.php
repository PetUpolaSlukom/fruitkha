<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = DB::table('news')
            ->join('user', 'news.id_user', '=', 'user.id_user')
            ->select('news.*', 'user.first_name', 'user.last_name')
            ->get();

        return view('admin.pages.news.news', [
            'news'=>$news
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.news.createNews');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'news_title' => 'bail|required|max:100|min:10',
            'news_short_description' => 'bail|required|max:255|min:50',
            'news_text' => 'bail|required|max:10000|min:300',
        ]);

        $result = DB::table('news')
            ->insert([
                'title' => $request->input('news_title'),
                'short_description' => $request->input('news_short_description'),
                'text' => $request->input('news_text'),
                'created_at' =>  date("d F, Y",time()),
                'id_user' => session('user')->id_user
            ]);

        if ($result){
            return redirect()
                ->back()
                ->with('newsMessage', 'Successfully inserted news!');
        }
        return redirect()
            ->back()
            ->with("newsError", "Something get wrong, try later.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = (int) $id;

        $news = DB::table('news')
            ->where('id_news', '=', $id)
            ->join('user', 'news.id_user', '=', 'user.id_user')
            ->select('news.*', 'user.first_name', 'user.last_name')
            ->first();

        return view('admin.pages.news.editNews', [
            'n'=>$news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = (int) $id;

        $result = DB::table('news')
            ->where('id_news', '=', $id)
            ->update([
                'title' => $request->input('news_title'),
                'short_description' => $request->input('news_short_description'),
                'text' => $request->input('news_text'),
                'updated_at' => time(),
            ]);
        if ($result){
            return redirect()
                ->back()
                ->with('newsMessage', 'Successfully updated news!');
        }
        return redirect()
            ->back()
            ->with("newsError", "Something get wrong, try later.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
