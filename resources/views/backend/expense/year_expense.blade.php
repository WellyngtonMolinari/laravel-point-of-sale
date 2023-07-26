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
                                    <h4 class="page-title">Despesas Anuais</h4>
                                </div>
                            </div>
                        </div>     


                        <!-- end page title --> 

    @php
    $year = date("Y");
    $expenseyear = App\Models\Expense::where('year',$year)->sum('amount');
    @endphp


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

           <h4 class="header-title"> Despesas do ano </h4>   
           <h4 style="color:rgb(0, 0, 0); font-size: 30px;" align="center"> Total : ${{ $expenseyear }}</h4>      
                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Detalhes</th>
                                <th>Quantia</th>
                                <th>Ano</th>  
                            </tr>
                        </thead>


        <tbody>
        	@foreach($yearexpense as $key=> $item)
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $item->details }}</td>
                <td>{{ $item->amount }}</td>
                <td>{{ $item->year }}</td> 

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