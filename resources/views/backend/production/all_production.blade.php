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
<a href="{{ route('all.production') }}" class="btn btn-info rounded-pill waves-effect waves-light">Importar </a>  
&nbsp;&nbsp;&nbsp;
<a href="{{ route('all.production') }}" class="btn btn-danger rounded-pill waves-effect waves-light">Exportar </a>  
&nbsp;&nbsp;&nbsp;
      <a href="{{ route('all.production') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Adicionar Produção </a>  
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Todas Produções</h4>
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
                                <th>Nome do Modelo</th>
                                <th>Categoria</th>
                                <th>Cliente</th>
                                <th>Imagem</th>
                                <th>Qtd.</th>
                                <th>Prazo de Entrega</th>
                                <th>Preço de Custo</th>
                                <th>Lucro </th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>


        <tbody>
        	@foreach($production as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td> <img src="{{ asset($item->production_image) }}" style="width:50px; height: 40px;"> </td>
                <td>{{ $item->production_name }}</td>
                <td>{{ $item->category_id }}</td>
                <td>{{ $item->customer_id }}</td>
                <td>{{ $item->production_store }}</td>
                <td>{{ $item->deadline_date }}</td>
                <td>{{ $item->cost_price }}</td>
                <td>{{ $item->profit_price }}</td>
                    <td>
{{-- @if()
<span class="badge rounded-pill bg-success">Em Andamento</span>
@else
<span class="badge rounded-pill bg-danger">Concluído</span>
@endif --}}
                    </td>
                <td>
<a href="{{ route('all.production',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil" aria-hidden="true"></i></a>
<a href="{{ route('all.production',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>

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