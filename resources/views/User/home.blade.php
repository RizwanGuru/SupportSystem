@extends('themelayout.app')
   
@section('content')
 
  <!-- sa-app -->
  <div class="sa-app sa-app--desktop-sidebar-shown sa-app--mobile-sidebar-hidden sa-app--toolbar-fixed">
      @include('themelayout.sidebar')
       <!-- sa-app__content -->
       <div class="sa-app__content">
       @include('themelayout.header')
            <!-- sa-app__body -->
                <div id="top" class="sa-app__body px-2 px-lg-4">
                    <div class="container pb-6">
                        <div class="py-5">
                            <div class="row g-4 align-items-center">
                                <div class="col"><h1 class="h3 m-0">Dashboard</h1></div>
                                 
                            </div>
                        </div>
                        <div class="row g-4 g-xl-5">
                          
                            <div class="col-12 col-xxl-3 d-flex">
                                <div
                                    class="card flex-grow-1 saw-chart-circle"
                                    data-sa-data='[{"label":"Pending","value":{{$PercentagePending}},"color":"#ffd333"},{"label":"Rejected","value":{{$PercentageRejected}},"color":"#e62e2e"},{"label":"In Progress","value":{{$PercentageInProgress}},"color":"#29cccc"},{"label":"Completed","value":{{$PercentageCompleted}},"color":"#5dc728"}]'
                                    data-sa-container-query='{"600":"saw-chart-circle--size--lg"}'
                                >
                                    <div class="sa-widget-header saw-chart-circle__header">
                                        <h2 class="sa-widget-header__title">Percentage</h2>
                                        <div class="sa-widget-header__actions">
                                            
                                        </div>
                                    </div>
                                    <div class="saw-chart-circle__body">
                                        <div class="saw-chart-circle__container"><canvas></canvas></div>
                                    </div>
                                    <div class="sa-widget-table saw-chart-circle__table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th class="text-center">Percentage</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="saw-chart-circle__symbol" style="--saw-chart-circle__symbol--color: #ffd333"></div>
                                                            <div class="ps-2">Pending</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$PercentagePending}} %</td>
                                                    
                                                </tr>
                                               
                                                
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="saw-chart-circle__symbol" style="--saw-chart-circle__symbol--color: #29cccc"></div>
                                                            <div class="ps-2">In Progress</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$PercentageInProgress}} %</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="saw-chart-circle__symbol" style="--saw-chart-circle__symbol--color: #5dc728"></div>
                                                            <div class="ps-2">Completed</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$PercentageCompleted}} %</td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="saw-chart-circle__symbol" style="--saw-chart-circle__symbol--color: #e62e2e"></div>
                                                            <div class="ps-2">Rejected</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$PercentageRejected}} %</td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                             
                        </div>
                    </div>
                </div>
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