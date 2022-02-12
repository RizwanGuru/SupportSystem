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
                                                <li class="breadcrumb-item active" aria-current="page">Users</li>
                                            </ol>
                                        </nav>
                                        <h1 class="h3 m-0">Users</h1>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="card">
                                @if(Session::has('message'))
                                    <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                    </div>
                                @endif

                                <form method="post" action="{{route('send.email')}}">
                                    <div style=" display: flex;align-items: baseline;justify-content: flex-end;" class="">
                                    Users list for Email &nbsp; &nbsp; &nbsp;
                                        @csrf    
                                    <div class="mt-3" style=" width:200px">
                                    <select multiple="" name="emails[]" class="sa-select2 form-select">
                                        <option disabled checked>Select Users</option>
                                    @if(isset($Users) && count($Users) > 0)
                                        @foreach($Users as $User)
                                        <option value="{{$User->email}}">{{$User->name}}</option>
                                        @endforeach
                                        @endif
                                        
                                    </select>
                                </div>
                                &nbsp;
                                
                                <button type="submit" class="btn btn-success" style="margin-right:10px">Send</button>
                            </div>
                                        </form>
                                <div class="alert alert-primary mb-0 alert-sa-has-icon showalert" style="display:none" role="alert">
                                        <div class="alert-sa-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-info">
                                                <circle cx="12" cy="12" r="10"></circle>
                                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                            </svg>
                                        </div>
                                        <div class="alert-sa-content">Mail Sent</div>
                                    </div>
                                <div class="p-4">
                                    <input type="text" placeholder="Start typing to search for Users"
                                        class="form-control form-control--search mx-auto" id="table-search"/>
                                </div>
                                <div class="sa-divider"></div>
                               
                                <table class="sa-datatables-init" data-order='[[ 1, "desc" ]]' data-sa-search-input="#table-search">
                                    <thead>
                                        <tr> 
                                            <th class="min-w-15x">Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th class="w-min" data-orderable="false"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(isset($Users) && count($Users) > 0)
                                        @foreach($Users as $User)
                                        <tr>
                                               <td><a style="cursor: pointer;" class="text-reset">{{$User->name}}</a></td>
                                              <td>{{$User->email}}</td>
                                              <td>
                                                  Active
                                                  
                                                </td>
                                                <td>{{\Carbon\Carbon::parse($User->created_at)->format('M-D-Y / H:i:s A')}}</td>

                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-sa-muted btn-sm" type="button"
                                                        id="User-context-menu-0" data-bs-toggle="dropdown" aria-expanded="false" aria-label="More">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="3" height="13" fill="currentColor">
                                                            <path d="M1.5,8C0.7,8,0,7.3,0,6.5S0.7,5,1.5,5S3,5.7,3,6.5S2.3,8,1.5,8z M1.5,3C0.7,3,0,2.3,0,1.5S0.7,0,1.5,0 S3,0.7,3,1.5S2.3,3,1.5,3z M1.5,10C2.3,10,3,10.7,3,11.5S2.3,13,1.5,13S0,12.3,0,11.5S0.7,10,1.5,10z"
                                                            ></path>
                                                        </svg>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="category-context-menu-0">
                                                        
                                                        <li><a class="dropdown-item text-danger" style="cursor: pointer;" onclick="confirmDelete({{$User->id}})" >Delete</a></li>
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