<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    function store(Request $req)
    {
        $data=$req->validate([
 
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);
       $data=$req->only('name','email','message');
       try{
         Message::create($data);
          return redirect()->back()->with('success',' Message Sent');
        }catch(Exception $e){
            return redirect()->back()->with('error','Cannot Send message');
        }
    }

    function message()
    {
        $message=Message::all();
        return view('Dashboard.message.index',compact('message'));
    }
    function destroy($id)
    {
        return \App\Helpers\Form::DeleteEloquent(new Message,$id);
    }
}
