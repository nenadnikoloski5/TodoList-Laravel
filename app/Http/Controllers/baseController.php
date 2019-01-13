<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Todo;
use App\User;

class baseController extends Controller
{
    //

    public function index(){

        // dd(Auth::user()->id);

        if(Auth::user()){

        

        $userId = Auth::user()->id;

        // dd(User::all()->where("id", $userId));

        $todosByUser = User::all()->where("id", $userId);

        return view('welcome', ["users" => $todosByUser]);

        } else {

            return view("welcome");
        }
    }

    public function store(){

        // dd(Auth::user());

        request()->validate([
            "todoName" => ["required","min:3","max:200"]
        ]);

        Todo::create([
            "user_id" => Auth::user()->id,
            "todoName" => request("todoName")
        ]);

        return redirect("/");
    }

    public function destroy($id){

        Todo::find($id)->delete();

        return redirect("/");
    }

    public function update($id){

        // Auth::user()->id = 2

        // dd(Todo::find($id)->user_id);

        if(Auth::guest()){
            // return "hehe";
           return redirect("/");
        } elseif(Auth::user()->id === Todo::find($id)->user_id){
            $todo = Todo::find($id);

            return view("update", ["todo"=>$todo]);
    
        } else {
            return redirect("/");
        }

    }

    public function patch($id){

        request()->validate([
            "todoName" => ["required", "min:3", "max:255"]
        ]);

        $todo =  Todo::find($id);

        $todo->todoName = request("todoName");
        $todo->save();

        return redirect("/");


    }

    public function complete($id){

        // dd(Todo::find($id)->completed);
        $todo = Todo::find($id); 

        if($todo->completed === 0){
            $todo->completed = "1";
            $todo->save();
        } elseif($todo->completed === 1){
            $todo->completed = "0";
            $todo->save();
        }

        return redirect("/");
    }
}
