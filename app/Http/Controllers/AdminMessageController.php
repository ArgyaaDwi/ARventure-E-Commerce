<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminMessageController extends Controller
{
    public function index(){
        $loggedInUser = Auth::user();
        $message = session('message');
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('admin.message', compact('loggedInUser', 'messages'));
    }
    public function show($id){
        $loggedInUser = Auth::user();
        $messages = Message::find($id);
        return view('admin.message_detail', compact('messages', 'loggedInUser'));   
    }
    public function destroy($id){
        $messages = Message::find($id);
        if (!$messages) {
            return redirect()->back()->with('error', 'Message not found');
        }
        $messages->delete();
        return redirect()->back()->with('message', 'Message deleted successfully');
    }
}
