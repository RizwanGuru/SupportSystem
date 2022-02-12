<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   if(Auth::check()){
      return redirect()->route('client');
   }
   else{
    return redirect('login');
   }
});

Route::get('percentage',function(){
$TotlaTicket=App\Ticket::count();
if(Auth::user()->role ==1){
$PendingTicket=App\Ticket::where('status','Pending')->count();
$InProgressTicket=App\Ticket::where('status','InProgress')->count();
$CompletedTicket=App\Ticket::where('status','Completed')->count();
$RejectedTicket=App\Ticket::where('status','Rejected')->count();

}
else{
$PendingTicket=App\Ticket::where('user_id',Auth::user()->id)->where('status','Pending')->count();
$InProgressTicket=App\Ticket::where('user_id',Auth::user()->id)->where('status','InProgress')->count();
$CompletedTicket=App\Ticket::where('user_id',Auth::user()->id)->where('status','Completed')->count();
$RejectedTicket=App\Ticket::where('user_id',Auth::user()->id)->where('status','Rejected')->count();
}

$PercentagePending= $PendingTicket / $TotlaTicket *100;
$PercentageInProgress= $InProgressTicket / $TotlaTicket *100;
$PercentageCompleted= $CompletedTicket / $TotlaTicket *100;
$PercentageRejected= $RejectedTicket / $TotlaTicket *100;


return response()->json([
   'Pending'=>$PercentagePending,
   'In Progress'=> $PercentageInProgress,
   'Completed' =>$PercentageCompleted,
   'Rejected' =>$PercentageRejected,
]);

});

Auth::routes();

Route::get('/client', 'ClientController@index')->name('client.home')->middleware('client');
Route::get('/user', 'UserController@index')->name('user.home')->middleware('user');
 
Route::get('Ticket', 'TicketController@Tickets')->name('Ticket');
Route::post('Ticket', 'TicketController@EditTicket')->name('edit.Ticket');
Route::get('DeleteTicket', 'TicketController@DeleteTicket')->name('delete.Ticket');
Route::post('TicketReply', 'TicketController@ReplyTicket')->name('Ticket.Reply');

/////////////////// Client Middleware //////////////////////

Route::group(['middleware' => ['client']], function() {
    
/////////////////////////// Ticket CRUD /////////////////////////////////////

Route::get('Users-List', 'ClientController@UsersList')->name('Users');
Route::post('email','ClientController@SendEmail')->name('send.email');

Route::post('changeStatus', 'TicketController@changeStatus')->name('Ticket.changestatus');

});

/////////////////// User Middleware //////////////////////


Route::group(['middleware' => ['user']], function() {
    
/////////////////////////// Ticket  /////////////////////////////////////
    
Route::get('AddTicket', 'TicketController@AddTicket')->name('add.Ticket');
Route::post('SaveTicket', 'TicketController@SaveTicket')->name('save.Ticket');
Route::post('UpdateTicket', 'TicketController@UpdateTicket')->name('update.Ticket');
     
    });