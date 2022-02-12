<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ticket;
use  App\Jobs\SendEmailJob;
class ClientController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TotlaTicket=Ticket::count();

$PendingTicket=Ticket::where('status','Pending')->count();
$InProgressTicket=Ticket::where('status','InProgress')->count();
$CompletedTicket=Ticket::where('status','Completed')->count();
$RejectedTicket=Ticket::where('status','Rejected')->count();


$PercentagePending= $PendingTicket / $TotlaTicket *100;
$PercentageInProgress= $InProgressTicket / $TotlaTicket *100;
$PercentageCompleted= $CompletedTicket / $TotlaTicket *100;
$PercentageRejected= $RejectedTicket / $TotlaTicket *100;

        return view('Client.clientHome',compact('PercentagePending','PercentageInProgress','PercentageCompleted','PercentageRejected'));
    }
    public function UsersList(){
        $Users =User::where('role', '!=', 1)->get();
       return view('Client.Users',compact('Users'));
    }
    public function SendEmail(Request $request){
       $emails=$request->emails;
       if(isset($emails) && $emails >0){
        foreach($emails as $email){
           
            $Email['email'] = $email;
            dispatch(new SendEmailJob($Email));
          
            return redirect()->route('Users')->with('message','Emails send');

        }
       }
       else{
           return redirect()->route('Users')->with('message','Please select user');
       }
      }
}
