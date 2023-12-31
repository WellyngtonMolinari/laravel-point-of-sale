@extends('admin_dashboard')
@section('admin')

@php
 $date = date('d-F-Y');
 $today_paid = App\Models\Order::where('order_date',$date)->sum('pay');

 $total_paid = App\Models\Order::sum('pay');
 $total_due = App\Models\Order::sum('due'); 

 $completeorder = App\Models\Order::where('order_status','complete')->get(); 

  $pendingorder = App\Models\Order::where('order_status','pending')->get(); 

@endphp

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <form class="d-flex align-items-center mb-3">
                                            <div class="input-group input-group-sm">
                                                <input type="text" class="form-control border-0" id="dash-daterange">
                                                <span class="input-group-text bg-blue border-blue text-white">
                                                    <i class="mdi mdi-calendar-range"></i>
                                                </span>
                                            </div>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-2">
                                                <i class="mdi mdi-autorenew"></i>
                                            </a>
                                            <a href="javascript: void(0);" class="btn btn-blue btn-sm ms-1">
                                                <i class="mdi mdi-filter-variant"></i>
                                            </a>
                                        </form>
                                    </div>
                                    <h4 class="page-title">Histórico</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

@if(Auth::user()->can('expense.menu'))
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                            <i class="fe-dollar-sign font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1">$<span data-plugin="counterup">{{ $total_paid }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Recebidos </p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                            <i class="fe-alert-circle font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <h3 class="text-dark mt-1">$<span data-plugin="counterup">{{ $total_due  }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">A receber</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->


    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-warning border-warning border shadow">
                            <i class="fe-file-text font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="text-end">
                            <h3 class="text-dark mt-1"> <span data-plugin="counterup">{{ count($pendingorder)  }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Pedidos</p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

    <div class="col-md-6 col-xl-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                            <i class="fe-check font-22 avatar-title text-white"></i>
                        </div>
                    </div>
                    <div class="col-6">
                    <div class="text-end">
                            <h3 class="text-dark mt-1"> <span data-plugin="counterup">{{ count($completeorder)  }}</span></h3>
                            <p class="text-muted mb-1 text-truncate">Finalizados </p>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
        </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->

</div>
@endif
                        <!-- end row-->

                        <div class="row">
                            

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body pb-2">
                                        <div class="float-end d-none d-md-inline-block">
                                            <div class="btn-group mb-2">
                                                <button type="button" class="btn btn-xs btn-light">Hoje</button>
                                                <button type="button" class="btn btn-xs btn-light">Semana</button>
                                                <button type="button" class="btn btn-xs btn-secondary">Mês</button>
                                            </div>
                                        </div>
    
                                        <h4 class="header-title mb-3">Gráfico</h4>

                                        <!-- Graphics -->
                                        <div dir="ltr">
                                            <div id="sales-analytics" class="mt-4" data-colors="#1abc9c,#4a81d4"></div>
                                        </div>
                                        <!-- End graphics -->
                                        
                                    </div>
                                </div> <!-- end card -->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                        <div class="row">
                         

                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Edit Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                                <!-- item-->
                                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            </div>
                                        </div>
    
{{-- @php
    $pendingOrders = App\Models\Order::where('order_status', 'pending')->get();
    $completeOrders = App\Models\Order::where('order_status', 'complete')->get();
    $pendingDue = App\Models\Order::sum('due');
@endphp --}}
        <h4 class="header-title mb-3">Últimas transações</h4>

<div class="table-responsive">
    <table class="table table-borderless table-nowrap table-hover table-centered m-0">

        <thead class="table-light">
            <tr>
                <th>Clientes</th>
                <th>Data</th>
                <th>Pagamentos</th>
                <th>Estado</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <h5 class="m-0 fw-normal">Themes Market</h5>
                </td>

                <td>
                    Oct 15, 2023
                </td>

                <td>
                    $5848.68
                </td>

                <td>
                    <span class="badge bg-soft-warning text-warning">Em andamento</span>
                </td>

                <td>
                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                </td>
            </tr>

            <tr>
                <td>
                    <h5 class="m-0 fw-normal">Freelance</h5>
                </td>

                <td>
                    Oct 12, 2023
                </td>

                <td>
                    $1247.25
                </td>

                <td>
                    <span class="badge bg-soft-success text-success">Pago</span>
                </td>

                <td>
                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                </td>
            </tr>

            <tr>
                <td>
                    <h5 class="m-0 fw-normal">Share Holding</h5>
                </td>

                <td>
                    Oct 10, 2023
                </td>

                <td>
                    $815.89
                </td>

                <td>
                    <span class="badge bg-soft-success text-success">Pago</span>
                </td>

                <td>
                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                </td>
            </tr>

            <tr>
                <td>
                    <h5 class="m-0 fw-normal">Envato's Affiliates</h5>
                </td>

                <td>
                    Oct 03, 2023
                </td>

                <td>
                    $248.75
                </td>

                <td>
                    <span class="badge bg-soft-danger text-danger">Não pago</span>
                </td>

                <td>
                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                </td>
            </tr>

            <tr>
                <td>
                    <h5 class="m-0 fw-normal">Marketing Revenue</h5>
                </td>

                <td>
                    Sep 21, 2023
                </td>

                <td>
                    $978.21
                </td>

                <td>
                    <span class="badge bg-soft-warning text-warning">Em andamento</span>
                </td>

                <td>
                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                </td>
            </tr>

            <tr>
                <td>
                    <h5 class="m-0 fw-normal">Advertise Revenue</h5>
                </td>

                <td>
                    Sep 15, 2023
                </td>

                <td>
                    $358.10
                </td>

                <td>
                    <span class="badge bg-soft-success text-success">Pago</span>
                </td>

                <td>
                    <a href="javascript: void(0);" class="btn btn-xs btn-light"><i class="mdi mdi-pencil"></i></a>
                </td>
            </tr>

        </tbody>
            </table>
        </div> <!-- end .table-responsive-->
                    </div>
                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        
                    </div> <!-- container -->

                </div> <!-- content -->
@endsection