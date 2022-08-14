<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Messages;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
          $usertype = Auth::user()->usertype;

        if($usertype == '0'){
            $user_id = Auth::user()->id;
            $data3 = messages::where('user_id', $user_id)->get();
            return view('user.home', compact('data3'));
        }else{
            $data = User::where('usertype', 0)->get();
            $data2 = messages::all();
            return view('admin.home', compact('data', 'data2'));
        }
    }


    public function messages(Request $request){
       $data = new messages;
       $data->name = $request->name;
    //    $data->date = $request->date;
    //    $data->time = $request->time;
       $data->message = $request->message;

       if(Auth::id()){
        $data->user_id = Auth::user()->id;
       }

       $data->save();

       return redirect()->back()->with("message", "Message sent successfully. The Admins will get back to you soon   :)");
    }


}
