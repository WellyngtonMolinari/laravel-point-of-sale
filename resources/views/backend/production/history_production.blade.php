@extends('admin_dashboard')
@section('admin')

<div class="content">
    <!-- Start Content -->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('add.production') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Adicionar Produção </a>  
                        </ol>
                    </div>
                    <h4 class="page-title">Histórico de Produção</h4>
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
                                    <th>Nome do Modelo</th>
                                    <th>Categoria</th>
                                    <th>Cliente</th>
                                    <th>Qtd.</th>
                                    <th>Finalizado em</th>
                                    <th>Prazo de Entrega</th>
                                    <th>Preço Custo (R$)</th>
                                    <th>Preço Venda (R$)</th>
                                    <th>Lucro Unid. (R$)</th>
                                    <th>Lucro Total (R$)</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>

    <tbody>
        @foreach($finishedProduction as $key => $item)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td><img src="{{ asset($item->production_image) }}" style="width:50px; height: 40px;"></td>
            <td>{{ $item->production_name }}</td>
            <td>{{ $item->category->category_name }}</td>
            <td>{{ $item->customer->name }}</td>
            <td>{{ $item->production_store }}</td>
            <td>{{ date('d/m/Y', strtotime($item->updated_at)) }}</td>
            <td>{{ date('d/m/Y', strtotime($item->deadline_date)) }}</td>
            <td>{{ $item->cost_price }}</td>
            <td>{{ $item->selling_price }}</td>
            <td>{{ $item->profit_price }}</td>
            <td>{{ $item->profit_quantity }}</td>
            <td>
                <span class="badge rounded-pill bg-success">Finalizado</span>
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