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
      <a href="{{ route('add.expense') }}" class="btn btn-primary rounded-pill waves-effect waves-light">Adicionar Despesas </a>  
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Despesas do dia</h4>
                                </div>
                            </div>
                        </div>     


                        <!-- end page title --> 

    @php
    $date = date("d-m-Y");
    $expense = App\Models\Expense::where('date',$date)->sum('amount');
    @endphp


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

           <h4 class="header-title">Despesas do dia </h4>   
           <h4 style="color:rgb(0, 0, 0); font-size: 30px;" align="center"> Total : ${{ $expense }}</h4>      
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Detalhes</th>
                                <th>Quantia</th>
                                <th>Mês</th>
                                <th>Ano</th> 
                                <th>Ação</th>
                            </tr>
                        </thead>


        <tbody>
        	@foreach($today as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->details }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->month }}</td>
                <td>{{ $item->year }}</td> 
                <td>
<a href="{{ route('edit.expense',$item->id) }}" class="btn btn-blue rounded-pill waves-effect waves-light">Editar</a> 

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