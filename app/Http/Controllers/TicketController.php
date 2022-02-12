<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Hash;
use App\Ticket;
use App\TicketReplies;

class TicketController extends Controller
{
    public function Tickets(){
         if(Auth::check()){
        if (Auth::user()->role == 1){
            $Tickets=Ticket::all();
        }
        else{
        $Tickets=Ticket::where('user_id', Auth::user()->id)->get();
        }
        return view('Client.Tickets',compact('Tickets'));
    }
    else{
        return redirect()->route('login');
    }
    }
    public function AddTicket(){
        if (Auth::user()->role == 1){
            return redirect()->back();
        } 
        else{
            return view('User.AddTicket');  
        }         
    }
    public function SaveTicket(Request $request){       
        $rules = array(
            'subject' => 'required|string|min:3|max:100', 
        );
        
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->route('add.Ticket')
                ->withErrors($validator)->withInput();
        }
        else{
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalname=$image->getClientOriginalName();
            $name = time().$originalname.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
        }
        else{
            $name=null;
        }
            $Ticket=new Ticket();
            $Ticket->user_id=Auth::user()->id;
            $Ticket->subject=$request->subject;
            $Ticket->status='Pending';
            $Ticket->save();

            $TicketReplies=new TicketReplies();
            $TicketReplies->ticket_id=$Ticket->id;
            $TicketReplies->reply_by=Auth::user()->id;
            $TicketReplies->message=$request->message;
            $TicketReplies->image=$name;
            $TicketReplies->save();

            return redirect()->route('Ticket')->with('message','Ticket Added');
        }
    }
   public function EditTicket(Request $request){
       $Ticket=Ticket::find($request->editid);
       if ($request->viewtype == 'edit'){
            
            return view('User.AddTicket',compact('Ticket'));  
        }
        else{
            $Chats=TicketReplies::where('ticket_id',$request->editid)->get();
            return view('User.TicketView',compact('Ticket','Chats'));  
        } 
   }
   public function UpdateTicket(Request $request){
        
        $rules = array( 
          'subject'         => 'required|string|min:3|max:100', 
        
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $messages = $validator->messages();
            return redirect()->back()
                ->withErrors($validator);
        }
        else{
            $Ticket=Ticket::find($request->Ticket_id);
            $Ticket->subject=$request->subject;
            $Ticket->update();
            return redirect()->route('Ticket')->with('message','Ticket Updated');
        }
   }
    public function DeleteTicket(){
            $id=request()->query('id');
            Ticket::where('id',$id)->delete();
            return 'ok';
    }
    public function ReplyTicket(Request $request){

        if ($request->image != '') {
            $image = $request->image;
            $name = time().'-'.$image;
            $destinationPath = public_path('images');
        }
        else{
            $name=null;
        }

            $TicketReplies=new TicketReplies();
            $TicketReplies->ticket_id=$request->id;
            $TicketReplies->reply_by=Auth::user()->id;
            $TicketReplies->message=$request->reply;
            $TicketReplies->image=$name;
            $TicketReplies->save();
            $Response='';
            return response()->json(['Response'=>$Response]);
    }
    public function changeStatus(Request $request){
        $id=$request->id;
        $Ticket=Ticket::find($id);
         $Ticket->status=$request->status;
         $Ticket->client_id=Auth::user()->id;
         $Ticket->update();
         return response()->json(['response' => 'done']);
    }
}
