@extends('themelayout.app')
@section('content')
  <!-- sa-app -->
  <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
      @include('themelayout.sidebar')
       <!-- sa-app__content -->
       <div class="sa-app__content">
       @include('themelayout.header')
           <!-- sa-app__body -->
                <div id="top" class="sa-app__body">
                    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                        <div class="container">
                            <div class="py-5">
                                <div class="row g-4 align-items-center">
                                    <div class="col">
                                        <nav class="mb-2" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-sa-simple">
                                                <li class="breadcrumb-item"><a href="{{route('client.home')}}">Dashboard</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                                            </ol>
                                        </nav>
                                        <h1 class="h3 m-0">Tickets</h1>
                                    </div>
                                    @if(Auth::user()->role ==1)
                                    @else
                                    <div class="col-auto d-flex"><a href="{{route('add.Ticket')}}" class="btn btn-primary">Add Ticket</a></div>
                                    @endif
                                </div>
                            </div>
                            <div class="card">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                    </div>
                                @endif
                                <div class="alert alert-primary mb-0 alert-sa-has-icon showalert" style="display:none" role="alert">
                                        <div class="alert-sa-icon">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="1em"
                                                height="1em"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-info">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                            </svg>
                                        </div>
                                        <div class="alert-sa-content">Status Updated</div>
                                    </div>
                                <div class="p-4">
                                    <input type="text" placeholder="Start typing to search for Tickets"
                                        class="form-control form-control--search mx-auto" id="table-search"/>
                                </div>
                                <div class="sa-divider"></div>
                                <table class="sa-datatables-init" data-order='[[ 1, "desc" ]]' data-sa-search-input="#table-search">
                                    <thead>
                                        <tr> 
                                            <th>Ticket Subject</th>
                                            <th class="min-w-15x">Mesasge</th>
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th class="w-min" data-orderable="false"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($Tickets) && count($Tickets) > 0)
                                        @foreach($Tickets as $Ticket)
                                        <tr>
                                               <td><a onclick="TicketView({{$Ticket->id}})" style="cursor: pointer;" class="text-reset">{{$Ticket->subject}}</a></td>
                                              <td>{{DB::table('ticket_replies')->where('ticket_id',$Ticket->id)->pluck('message')->first()}}</td>
                                              <td>{{\Carbon\Carbon::parse($Ticket->created_at)->format('M-D-Y / H:i:s A')}}</td>
                                              <td>
                                                   @if(Auth::user()->role == 1)
                                                        <select class="sa-select2 form-select" id="{{$Ticket->id}}" onchange="statuschange(this.value,this.id)">
                                                            <option value="Pending" @if($Ticket->status == 'Pending') selected @else @endif>Pending</option>
                                                            <option value="In Progress" @if($Ticket->status == 'In Progress') selected @else @endif>In Progress</option>
                                                            <option value="Completed" @if($Ticket->status == 'Completed') selected @else @endif>Completed</option>
                                                            <option value="Rejected" @if($Ticket->status == 'Rejected') selected @else @endif>Rejected</option>
                                                        </select>
                                                    @else
                                                    <button class="btn @if($Ticket->status== 'Rejected') btn-danger @elseif($Ticket->status == 'In Progress') btn-warning @elseif($Ticket->status== 'Completed') btn-success @else btn-primary @endif btn-sa-pill">{{$Ticket->status}}</button>
                                                    
                                                    @endif
                                                </td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sa-muted btn-sm" type="button"
                                                        id="Ticket-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                            <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="category-context-menu-0">
                                                        
                                                        <li><a class="dropdown-item text-danger" style="cursor: pointer;" onclick="confirmDelete({{$Ticket->id}})" >Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                         @endif
                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="{{route('edit.Ticket')}}" method="post" id="editform">
                    @csrf
                    <input type="hidden" class="editid" name="editid" value="">
                    <input type="hidden" class="viewtype" name="viewtype" value="">
                </form>
                
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script>
            

            function statuschange(status,id)
                {
                    $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    $.ajax({
                        type: 'post',
                        data: {'status': status,'id':id},
                        url: 'changeStatus/',
                        dataType: 'json',
                        success: function(response){
                            $(".showalert").show();
                            setTimeout(function() { $(".showalert").hide(); }, 2000);
                        },
                        error: function(res){
                            
                        }
                    });
                }
          function confirmEdit($id){
            $('.editid').val($id);
            $('.viewtype').val('edit');
            $('#editform').submit();
            }
            function TicketView($id){
            $('.editid').val($id);
            $('.viewtype').val('ticketview');
            $('#editform').submit();
            }
           
            function confirmDelete($id) {
                
                    swal({
                        title: "Are you sure?",
                        text: "You will not be able to recover this Ticket!",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "Yes, delete it!",
                        closeOnConfirm: false
                    }, function (isConfirm) {
                        if (!isConfirm) return;
                        $.ajax({
                            url: "DeleteTicket/",
                            type: "get",
                            data: {
                                id: $id
                            }, 
                            success: function () { 
                                swal({
                                title: "Done!",
                                type: "success",
                                text: "Ticket deleted!",
                                confirmButtonText: "ok",
                                allowOutsideClick: "true"
                            }, function () { location.reload();})
                                 
                                
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                swal("Error deleting!", "Please try again", "error");
                            }
                        });
                    });
                }
               
                   </script>
                <!-- sa-app__body / end --> 
       
        @include('themelayout.footer')
                </div>
            <!-- sa-app__content / end -->

            <!-- sa-app__toasts -->
            <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
            <!-- sa-app__toasts / end -->

        </div>
        <!-- sa-app / end -->
@endsection