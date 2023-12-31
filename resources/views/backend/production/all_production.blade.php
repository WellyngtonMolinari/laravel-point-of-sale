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
&nbsp;&nbsp;&nbsp;
<a href="{{ route('export.production') }}" class="btn btn-danger rounded-pill waves-effect waves-light">Exportar </a>  
&nbsp;&nbsp;&nbsp;
      <a href="{{ route('add.production') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Adicionar Produção </a>  
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
                                <th>Imagem</th>
                                <th>Nome do Modelo</th>
                                <th>Categoria</th>
                                <th>Cliente</th>
                                <th>Qtd.</th>
                                <th>Prazo de Entrega</th>
                                <th>Estado</th>
                                <th>Ações</th>
                            </tr>
                        </thead>


<tbody>
    @foreach($production as $key => $item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td> <img src="{{ asset($item->production_image) }}" style="width:50px; height: 40px;"> </td>
            <td>{{ $item->production_name }}</td>
            <td>{{ $item['category']['category_name'] }}</td>
            <td>{{ $item['customer']['name'] }}</td>
            <td>{{ $item->production_store }}</td>
            <td>{{ date('d/m/Y', strtotime($item->deadline_date)) }}</td>
            <td>
                @if($item->production_status == 'Em Andamento')
                    <span class="badge rounded-pill bg-danger">Em Andamento</span>
                @else
                    <span class="badge rounded-pill bg-success">Finalizado</span>
                @endif
            </td>
            <td>
                @if(Auth::user()->can('production.edit'))
                    <a href="{{ route('edit.production',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                @endif
                @if(Auth::user()->can('production.delete'))
                    <a href="{{ route('delete.production',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @endif

                <a href="{{ route('details.production',$item->id) }}" class="btn btn-info rounded-pill waves-effect waves-light" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>

                @if($item->production_status == 'Finalizado' && $item->production_store > 0)
                    <form action="{{ route('add.production.stock', $item->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill waves-effect waves-light" title="Add to Stock">Produto
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                    </form>
                @endif
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