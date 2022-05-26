<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index(){
        return view('admin.pages.adminHome');
    }

    //news code
    public function changeNewsStatus(){
        $id = (int) request('id_news');

        $news = DB::table('news')
            ->where('id_news', '=', $id)
            ->first();

        $result = DB::table('news')
            ->where('id_news', '=', $id)
            ->update([
                'active' => !$news->active,
                'updated_at' => time()
            ]);

        if ($result){
            return response()->json([
                'success' => true,
                'message' => 'Successfully changed news status!'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Something get wrong, try later!'
        ]);
    }













    //user code
    public function searchUser(){
        $keyword = \request('keyword');

        $users = DB::table('user')
            ->where('first_name', 'like', '%' . $keyword . '%')
            ->orWhere('last_name', 'like', '%' . $keyword . '%')
            ->join('role', 'user.id_role', '=', 'role.id_role')
            ->get();

        if ($users){
            return response()->json([
                'success' => true,
                'users' => $users
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'There is no user with name [' . $keyword . ']!'
        ]);

    }

    public function showUsers(){
        $keyword = \request('keyword');

        $users = DB::table('user')
            ->join('role', 'user.id_role', '=', 'role.id_role')
            ->get();

        if ($keyword != null){
            $users = DB::table('user')
                ->join('role', 'user.id_role', '=', 'role.id_role')
                ->where('first_name', 'like', '%' . $keyword . '%')
                ->orWhere('last_name', 'like', '%' . $keyword . '%')
                ->get();
        }

        $roles = DB::table('role')->get();

        return view('admin.pages.adminUsers', [
            'users'=>$users,
            'roles'=>$roles
        ]);
    }

    public function storeUser(StoreUserRequest $request){//StoreUserRequest $request

        $fn = $request->input('firstName');
        $ln = $request->input('lastName');
        $email = $request->input('email');
        $password = $request->input('password');
        $role = $request->input('roleSelect');

        $userModel = new UserModel();

        $result = $userModel->StoreUser($fn, $ln, $email, $password, $role);

        if ($result){
            return redirect()->route("users")->with('registerMessage', 'Successfully created account!');
        }
        return redirect()->back()->with("registerError", "Something get wrong, try later.");
    }

    public function changeStatus($id){
        $id = (int) $id;

        $user = DB::table('user')
            ->where('id_user', '=', $id)
            ->first();
        if ($user){
            $result = DB::table('user')
                ->where('id_user', '=', $id)
                ->update([
                    'active' => !$user->active
                ]);

            if ($result){
                return redirect()->route("users")
                    ->with('statusMessage', 'Successfully changed ['. $user->first_name ." ". $user->last_name .'] status!');
            }
            return redirect()->back()->with("statusError", "Something get wrong, try later.");
        }
    }


    //review code
    public function showReviews(){
        $reviews = DB::table('review')->get();
            //->where('active', '=', true)
        return view('admin.pages.adminReviews', [
            'reviews'=>$reviews
        ]);
    }

    public function changeReview(){
        $id = (int) request('id_review');

        $review = DB::table('review')
            ->where('id_review', '=', $id)
            ->first();


        $result = DB::table('review')
            ->where('id_review', '=', $id)
            ->update([
                'active' => !$review->active
            ]);

        if ($result){
            return response()->json([
                'success' => true,
                'message' => 'Successfully changed [' . $review->full_name . '\'s] status!'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Something get wrong, try later!'
        ]);
    }

    public function storeReview(Request $request){

        $request->validate([
            'full_name' => 'bail|required|max:30|min:6',
            'review_text' => 'bail|required|max:200|min:10'
        ]);

        $result = DB::table('review')
            ->insert([
                'full_name' => $request->input('full_name'),
                'description' => $request->input('profession'),
                'text' => $request->input('review_text'),
                'created_at' =>  time()
            ]);

        if ($result){
            return redirect()
                ->back()
                ->with('reviewMessage', 'Successfully inserted review!');
        }
        return redirect()
            ->back()
            ->with("reviewError", "Something get wrong, try later.");
    }
}
