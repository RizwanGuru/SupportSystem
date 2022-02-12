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
            .card-bordered {
    border: 1px solid #ebebeb
}

.card {
    border: 0;
    border-radius: 0px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    -webkit-transition: .5s;
    transition: .5s
}

.padding {
    padding: 3rem !important
}

body {
    background-color: #f9f9fa
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}

.card-header {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    padding: 15px 20px;
    background-color: transparent;
    border-bottom: 1px solid rgba(77, 82, 89, 0.07)
}

.card-header .card-title {
    padding: 0;
    border: none
}

h4.card-title {
    font-size: 17px
}

.card-header>*:last-child {
    margin-right: 0
}

.card-header>* {
    margin-left: 8px;
    margin-right: 8px
}

.btn-secondary {
    color: #4d5259 !important;
    background-color: #e4e7ea;
    border-color: #e4e7ea;
    color: #fff
}

.btn-xs {
    font-size: 11px;
    padding: 2px 8px;
    line-height: 18px
}

.btn-xs:hover {
    color: #fff !important
}

.card-title {
    font-family: Roboto, sans-serif;
    font-weight: 300;
    line-height: 1.5;
    margin-bottom: 0;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(77, 82, 89, 0.07)
}

.ps-container {
    position: relative
}

.ps-container {
    -ms-touch-action: auto;
    touch-action: auto;
    overflow: hidden !important;
    -ms-overflow-style: none
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media .avatar {
    flex-shrink: 0
}

.avatar {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    border-radius: 100%;
    background-color: #f5f6f7;
    color: #8b95a5;
    text-transform: uppercase
}

.media-chat .media-body {
    -webkit-box-flex: initial;
    flex: initial;
    display: table
}

.media-body {
    min-width: 0
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
    font-weight: 100;
    color: #9b9b9b
}

.media>* {
    margin: 0 8px
}

.media-chat .media-body p.meta {
    background-color: transparent !important;
    padding: 0;
    opacity: .8
}

.media-meta-day {
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    margin-bottom: 0;
    color: #8b95a5;
    opacity: .8;
    font-weight: 400
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media-meta-day::before {
    margin-right: 16px
}

.media-meta-day::before,
.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb
}

.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb
}

.media-meta-day::after {
    margin-left: 16px
}

.media-chat.media-chat-reverse {
    padding-right: 12px;
    padding-left: 64px;
    -webkit-box-orient: horizontal;
    float:right;
    -webkit-box-direction: reverse;
    flex-direction: row-reverse
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media-chat.media-chat-reverse .media-body p {
    float: right;
    clear: right;
    background-color: #48b0f7;
    color: #fff
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px
}

.border-light {
    border-color: #f1f2f3 !important
}

.bt-1 {
    border-top: 1px solid #ebebeb !important
}

.publisher {
    position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 12px 20px;
    background-color: #f9fafb
}

.publisher>*:first-child {
    margin-left: 0
}

.publisher>* {
    margin: 0 8px
}

.publisher-input {
    -webkit-box-flex: 1;
    flex-grow: 1;
    border: none;
    outline: none !important;
    background-color: transparent
}

button,
input,
optgroup,
select,
textarea {
    font-family: Roboto, sans-serif;
    font-weight: 300
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #8b95a5;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear
}

.file-group {
    position: relative;
    overflow: hidden
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #cac7c7;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear
}

.file-group input[type="file"] {
    position: fixed;
    opacity: 0;
    z-index: -1;
    width: 20px
}

.text-info {
    color: #48b0f7 !important
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
                                                <li class="breadcrumb-item active" aria-current="page">@if(isset($Ticket)) {{$Ticket->subject}}  @endif Ticket</li>
                                            </ol>
                                        </nav>
                                        <br>
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="page-content page-container" id="page-content">
                                <div>
                                    <div class="row container ">
                                        <div class="col-md-12">
                                            <div class="card card-bordered">
                                                <div class="card-header">
                                                    <h4 class="card-title"><strong>@if(isset($Ticket)) {{$Ticket->subject}} @endif</strong></h4>  
                                                </div>
                                                <div class="ps-container ps-theme-default ps-active-y" id="chat-content" style="overflow-y: scroll !important; height:400px !important;">
                                                    @if(isset($Chats) && count($Chats) > 0)
                                                    @foreach($Chats as $chat)
                                                    <div class="media media-chat @if(DB::table('users')->where('id',$chat->reply_by)->pluck('role')->first() == 1 )  @else media-chat-reverse @endif">
                                                    <img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="...">

                                                        <div class="media-body">
                                                            <p>{{$chat->message}}</p>
                                                            @if($chat->image == null) 
                                                            @else
                                                            <br>
                                                        <img src="images/{{$chat->image}}" width="200px">
                                                        @endif
                                                            <p class="meta"><time datetime="2018">00:06</time></p>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <!-- <div class="media media-chat "> 
                                                        <div class="media-body">
                                                            <p>Hi</p>
                                                            <p class="meta"><time datetime="2018">23:58</time></p>
                                                        </div>
                                                </div> -->
                                                     @endforeach
                                                    @endif
                                                    <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                                                        <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps-scrollbar-y-rail" style="top: 0px; height: 0px; right: 2px;">
                                                        <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 2px;"></div>
                                                    </div>
                                                </div>
                                                <div class="publisher bt-1 border-light"> 
                                                    <img class="avatar avatar-xs" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> 
                                               
                                                    <input class="publisher-input replymessage" type="text" name="message" placeholder="Write something"> 
                                                <span class="publisher-btn file-group"> 
                                                    <label for="getfile" style="cursor: pointer;"> 
                                                        <i class="fa fa-paperclip file-browser"></i> 
                                                    </label>
                                                    <input type="file" id="getfile" value=""> 
                                                </span> 
                                                   
                                                    <a class="publisher-btn text-info" onclick="SendMessage({{$Ticket->id}})" data-abc="true">
                                                        <i class="fa fa-paper-plane"></i>
                                                    </a> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
              
                        </div>
                    </div>
                </div>
                <!-- sa-app__body / end -->
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
                 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
               <script>         
                    function SendMessage($id) {
                        var reply= $('.replymessage').val();
                        if(reply ==''){
                            
                            $('.replymessage').css({"border-color": "#C1E0FF", 
                                    "border-width":"2px", 
                                    "border-style":"solid"});

                            }
                            else{
                            var filename = $('#getfile').val();
                            if(filename == ''){
                                filename=null;
                            }
                            else{
                            if (filename.substring(3,11) == 'fakepath') {
                                filename = filename.substring(12);
                            } // For Remove fakepath
                            }
                      
                         
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                    $.ajax({
                        url: "TicketReply/",
                        type: "post",
                        data: {
                            id:$id, reply: reply, image:filename
                        }, 
                        success: function (Response) { 
                            $('.replymessage').val('');
                            console.log(Response);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            swal("Error", "Please try again", "error");
                        }
                    });
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