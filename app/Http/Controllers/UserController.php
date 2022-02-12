<?php

namespace App\Http\Controllers;
use App\Ticket;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $TotlaTicket=Ticket::count();

		$PendingTicket=Ticket::where('user_id',Auth::user()->id)->where('status','Pending')->count();
		$InProgressTicket=Ticket::where('user_id',Auth::user()->id)->where('status','InProgress')->count();
		$CompletedTicket=Ticket::where('user_id',Auth::user()->id)->where('status','Completed')->count();
		$RejectedTicket=Ticket::where('user_id',Auth::user()->id)->where('status','Rejected')->count();
		
		$PercentagePending= 0;
		$PercentageInProgress= 0;
		$PercentageCompleted= 0;
		$PercentageRejected= 0;
		
		if($TotlaTicket != 0){
			$PercentagePending= $PendingTicket / $TotlaTicket *100;
			$PercentageInProgress= $InProgressTicket / $TotlaTicket *100;
			$PercentageCompleted= $CompletedTicket / $TotlaTicket *100;
			$PercentageRejected= $RejectedTicket / $TotlaTicket *100;
		}
		
		
		

        return view('User.home',compact('PercentagePending','PercentageInProgress','PercentageCompleted','PercentageRejected'));
    }
}
