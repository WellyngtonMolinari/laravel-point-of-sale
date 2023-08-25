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
      <a href="{{ route('add.yarn') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Adicionar Fio </a>  
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Todos Fios</h4>
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
                                <th>Nome do Fio</th>
                                <th>Fornecedor</th>
                                <th>Lote</th>
                                <th>Cor</th>
                                <th>Data da Compra</th>
                                <th>Peso Total (KG)</th>
                                <th>Ações</th>
                            </tr>
                        </thead>


<tbody>
    @foreach($yarn as $key => $item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td> <img src="{{ asset($item->yarn_image) }}" style="width:50px; height: 40px;"> </td>
            <td>{{ $item->yarn_name }}</td>
            <td>{{ $item['supplier']['name'] }}</td>
            <td>{{ $item->yarn_garage }}</td>
            <td>{{ $item->yarn_color }}</td>
            <td>{{ date('d/m/Y', strtotime($item->buying_date)) }}</td>
            <td>{{ $item->yarn_totalweight }}</td>

            <td>
                @if(Auth::user()->can('production.edit'))
                    <a href="{{ route('edit.yarn',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                @endif
                @if(Auth::user()->can('production.delete'))
                    <a href="{{ route('delete.yarn',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                @endif

                <a href="{{ route('details.yarn',$item->id) }}" class="btn btn-info rounded-pill waves-effect waves-light" title="Details"><i class="fa fa-eye" aria-hidden="true"></i></a>
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