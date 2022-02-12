@extends('themelayout.app')
@section('content')
  <!-- sa-app -->
  <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
      @include('themelayout.sidebar')
       <!-- sa-app__content -->
       <div class="sa-app__content">
       @include('themelayout.header')
        <style>
            .filehover:hover{
                text-decoration: underline;
            }
            </style>
            <!-- sa-app__body -->
            <div id="top" class="sa-app__body">
                    <div class="mx-sm-2 px-2 px-sm-3 px-xxl-4 pb-6">
                        <div class="container container--max--xl">
                            <div class="py-5">
                                <div class="row g-4 align-items-center">
                                    <div class="col">
                                        <nav class="mb-2" aria-label="breadcrumb">
                                            <ol class="breadcrumb breadcrumb-sa-simple">
                                                <li class="breadcrumb-item"><a href="{{route('client.home')}}">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="{{route('Ticket')}}">Tickets</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">@if(isset($Ticket)) Edit @else Add @endif Ticket</li>
                                            </ol>
                                        </nav>
                                        <h1 class="h3 m-0">@if(isset($Ticket)) Edit @else Add @endif Ticket</h1>
                                    </div>
                                    
                                    <div class="col-auto d-flex">
                                      
                                        <a class="btn btn-primary" onclick="changeHtmlContent();">
                                         @if(isset($Ticket)) {{_('Update')}} @else {{_('Save')}} @endif</a>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger errors d-none">
                                <p class="errorTickettype d-none">Ticket Subject required.</p>
                                <p class="errordescription d-none">Message required.</p>

                            </div>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}<br>
                                    @endforeach
                                </div>
                                @endif
                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                {{ Session::get('message') }}
                                </div>
                                @endif
                                <form action="@if(isset($Ticket)) {{route('update.Ticket')}} @else {{route('save.Ticket')}} @endif" method="post" id="Ticket-form" enctype="multipart/form-data"> 
                                @csrf
                            <div class="sa-entity-layout" data-sa-container-query='{"920":"sa-entity-layout--size--md","1100":"sa-entity-layout--size--lg"}'>
                                <div class="sa-entity-layout__body">
                                    <div class="sa-entity-layout__main">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                 
                                            @if(isset($Ticket)) <input type="hidden" value="{{$Ticket->id}}" name="Ticket_id"> @else  @endif
                                                 
                                                 <div class="mb-4">
                                                     <label for="form-Ticket/Tickettype" class="form-label">Ticket Subject</label>
                                                     <input type="text" class="form-control Ticket_type" id="form-Ticket/Tickettype" name="subject" value="@if(isset($Ticket)){{$Ticket->subject}}@else{{ old('subject') }}@endif">
                                                 </div>
                                                 <div class="mb-4">
                                                     <label for="form-size/description" class="form-label">Message</label>
                                                     <textarea id="form-size/description" class="sa-quill-control form-control textareacontent" name="message" rows="4">{{{old('description')}}}</textarea>
                                                 </div>
                                                 
                                                 
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="sa-entity-layout__sidebar">       
                                        <div class="card w-100">
                                            <div class="card-body p-5">
                                                <div class="mb-5"><h2 class="mb-0 fs-exact-18">Image</h2></div>
                                                <div class="border p-4 d-flex justify-content-center">
                                                    <div class="max-w-20x">
                                                        <img src="images/products/product-7-320x320.jpg" id="output" class="w-100 h-auto" width="320" height="320" alt="" />
                                                    </div>
                                                </div>
                                                <div class="mt-4 mb-n2">
                                                    <label class="me-3 pe-2 filehover" for="file" style="color: blue;cursor: pointer;">Replace image</label>
                                                    <a class="text-danger me-3 pe-2 removeimage" style="cursor: pointer;">Remove image</a>
                                                    <input type="file" accept="image/*" name="image" onchange="loadFile(event)" id="file" style="display: none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                            
                              
                        </div>
                    </div>
                </div>
                <!-- sa-app__body / end -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                 
                <script>
                var loadFile = function(event) {
                    var reader = new FileReader();
                    reader.onload = function(){
                    var output = document.getElementById('output');
                    output.src = reader.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);


                };
                $(".removeimage").click(function(){
                    $('#output').attr('src', 'images/products/product-7-320x320.jpg');
                                     
                });
                function changeHtmlContent(ctrl) {

                  var Tickettype = $(".Ticket_type").val();
                    if(Tickettype == ''){
                        $(".errors").removeClass("d-none"); 
                        $(".errorTickettype").removeClass("d-none");                     
                    }
                    else{
                        $(".errorTickettype").addClass("d-none"); 
                    } 
                    var a =document.querySelectorAll('.ql-editor p')[0].firstChild.nodeValue;
                    if(a == null){
                        $(".errors").removeClass("d-none");
                        $(".errordescription").removeClass("d-none");
                        var a =document.querySelectorAll('.ql-editor p span')[0].firstChild.nodeValue;
                    }
                    else{
                        $(".errordescription").addClass("d-none");
                        $(".textareacontent").val(a);
                    }
                 if(Tickettype != '' && a != null){
                        $(".errors").addClass("d-none"); 
                     
                    document.getElementById('Ticket-form').submit();
                     }
                }
                </script>

        @include('themelayout.footer')
                </div>
            <!-- sa-app__content / end -->

            <!-- sa-app__toasts -->
            <div class="sa-app__toasts toast-container bottom-0 end-0"></div>
            <!-- sa-app__toasts / end -->

        </div>
        <!-- sa-app / end -->
@endsection