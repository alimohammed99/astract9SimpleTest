<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Messages;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function activate_user($id){
        $data = user::find($id);
        $data->status = "Active";
        $data->save();
        return redirect()->back()->with("message", "User's account has been activated");
    }




    public function deactivate_user($id){
        $data = user::find($id);
        $data->status = "Pending";
        $data->save();
        return redirect()->back()->with("message", "User's account has been deactivated");
    }




    public function delete_user($id){
        $data = user::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'You have successfully deleted a user');
    }
   



    public function search_user_by_status(Request $request){


        if(Auth::id()){
             $search = $request->search;
                // search is the name of the input

                if($search == ''){
                    $data = User::where('usertype', 0)->get();
                    $data2 = messages::all();
                    return view('admin.home', compact('data', 'data2'));
                }

                $data = User::where('status', 'Like', '%' . $search . '%')->get();
                //$data4 = User::where('status', 'Like', '%' . $search . '%')->get();
                $data2 = messages::all();
                $user = auth()->user();

                return view('admin.home', compact('data', 'data2'));
        }else{
            
            $search = $request->search;
            // search is the name of the input

                if($search == ''){
                    $data = User::where('usertype', 0)->get();
                    $data2 = messages::all();
                    return view('admin.home', compact('data'));
                }
                $data = User::where('status', 'Like', '%' . $search . '%')->get();
                $data2 = messages::all();

                return view('admin.home', compact('data', 'data2'));
        }
    }

    
}
