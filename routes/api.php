<?php
use Illuminate\Http\Request;
use App\Ticket;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// }); 
 
 
 Route::get('dailyLogs',function(){
	  $TotlaTicket=Ticket::count();
	  $CompletedTicket=Ticket::where('status','Completed')->count();
	  // sending a generic count without today's date for testing purposes. We can use carbon to fetch today's date
	  if($TotlaTicket != 0){
		return json_encode(($CompletedTicket/$TotlaTicket * 100) . '%');
	  }
	  return json_encode("0%");
 });