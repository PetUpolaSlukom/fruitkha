<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = DB::table('user')
            ->where('id_user', '=', session()->get('user')->id_user)
            ->first();

//        dd($request);
        if (!$user->can_comment){
            return response()->json(['success'=>false, 'message'=>'You cannot write comment. Contact administrator for more information.']);
        }

        $request->validate([
            'comment' => 'bail|required|max:150|min:3',
        ]);

        $result = DB::table('comment')
            ->insert([
                'id_user' => session()->get('user')->id_user,
                'id_news' => request('id_news'),
                'created_at' => time(),
                'text' => request('comment'),
                'id_reply' => request('id_reply')
            ]);

        if (!$result){
            return response()->json(['success'=>false, 'message'=>'Something get wrong, please try later.']);
        }
        return response()->json(['success'=>true, 'message'=>'Comment are successfully posted']);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = (int) $id;

        $user = DB::table('comment')
            ->where('id_comment', '=', $id)
            ->select('id_user')
            ->first();


        $id_user = $user->id_user;

        if ($id_user == session()->get('user')->id_user || session()->get('user')->admin){
            $result = DB::table('comment')
                ->where('id_comment', '=', $id)
                ->orWhere('id_reply', '=', $id)
                ->update(['active'=>false]);

            if (!$result){
                return redirect()->back()->with(['success'=>false, 'delete-message'=>'Something get wrong, please try later.']);
            }
            return redirect()->back()->with(['success'=>true, 'delete-message'=>'Comment are successfully deleted']);

        }
        else{
            return redirect()->route('home');
        }

    }
}
