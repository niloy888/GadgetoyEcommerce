<?php

namespace App\Http\Controllers\Admin;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class MessageController extends Controller
{
    public function manageMessages(){

        $messages = DB::table('contact_us')
            ->select('contact_us.*')
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.message.manage-messages', [
            'messages' => $messages
        ]);

    }


    public function messageDetails($id){
        $message = ContactUs::where('id',$id)->first();


        return view('admin.message.message-details',[
            'message' => $message
        ]);
    }


    public function deleteMessage($id){

        $message = ContactUs::find($id);
        $message->delete();

        return back()->with('message','Message deleted successfully');
    }
}
