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
        <a href=" {{ route('add.customer') }} " class="btn btn-primary rounded-pill waves-effect waves-light">Adicionar Cliente</a>
                        </ol>
                    </div>
                    <h4 class="page-title">Todos os Clientes</h4>
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
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>Nome da Loja</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                        
                        
            <tbody>
                @foreach($customer as $key=> $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td> <img src="{{ asset($item->image) }}" style="width:50px; height: 40px;"> </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->shopname }}</td>
                    <td>
    <a href="{{ route('edit.customer',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Editar</a>
    <a href="{{ route('delete.customer',$item->id) }}" class="btn btn-danger rounded-pill waves-effect waves-light" id="delete">Deletar</a>

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