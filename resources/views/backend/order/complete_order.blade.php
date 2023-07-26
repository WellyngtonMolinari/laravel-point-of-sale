@extends('admin_dashboard')
@section('admin')

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Pedidos Confirmados</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagem</th>
                                <th>Nome</th>
                                <th>Data do Pedido</th>
                                <th>Pagamento</th>
                                <th>Cobrança</th>
                                <th>Valor</th>
                                <th>Estado</th>
                                <th>Ação</th>
                            </tr>
                        </thead>


        <tbody>
        	@foreach($orders as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td> <img src="{{ asset($item->customer->image) }}" style="width:50px; height: 40px;"> </td>
                <td>{{ $item['customer']['name'] }}</td>
                <td>{{ $item->order_date }}</td>
                <td>{{ $item->payment_status }}</td>
                <td>{{ $item->invoice_no }}</td>
                <td>{{ $item->pay }}</td>
                <td> <span class="badge bg-success">{{ $item->order_status }}</span> </td>
                <td>
<a href="{{ url('order/invoice-download/'.$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light"> PDF </a>

                </td>
            </tr>
            @endforeach
        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->




                    </div> <!-- container -->

                </div> <!-- content -->


@endsection 