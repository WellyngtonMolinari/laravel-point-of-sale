@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

 <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar Adiantamentos</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Todos Adiantamentos</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

<div class="row">


  <div class="col-lg-8 col-xl-12">
<div class="card">
    <div class="card-body">





    <!-- end timeline content-->

    <div class="tab-pane" id="settings">
        <form method="post" action="{{ route('advance.salary.store') }}" >
        	@csrf

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Adicionar Adiantamento</h5>

            <div class="row">


 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome do Funcionário   </label>
           <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" id="example-select">
                    <option selected disabled >Selecionar Funcionário </option>
                    @foreach($employee as $item)
                    <option value="{{  $item->id }}">{{  $item->name }}</option>
                    @endforeach
                </select> 
        </div>
    </div>


 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Mês Referente   </label>
           <select name="month" class="form-select @error('month') is-invalid @enderror" id="example-select">
                    <option selected disabled >Selecionar Mês </option>
                    <option value="January">Janeiro</option>
                    <option value="February">Fevereiro</option>
                    <option value="March">Março</option>
                    <option value="April">Abril</option>
                    <option value="May">Maio</option>
                    <option value="Jun">Junho</option>
                    <option value="July">Julho</option>
                    <option value="August">Agosto</option>
                    <option value="September">Setembro</option>
                    <option value="October">Outubro</option>
                    <option value="November">Novembro</option>
                    <option value="December">Dezembro</option> 
                </select>
                 @error('month')
      <span class="text-danger"> {{ $message }} </span>
            @enderror

        </div>
    </div>


      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Selecionar Ano    </label>
           <select name="year" class="form-select @error('year') is-invalid @enderror" id="example-select">
                    <option selected disabled >Selecionar Ano </option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
                 @error('year')
      <span class="text-danger"> {{ $message }} </span>
            @enderror

        </div>
    </div>


 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Valor de Adiantamento   </label>
            <input type="text" name="advance_salary" class="form-control @error('advance_salary') is-invalid @enderror"   >
             @error('advance_salary')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>



            </div> <!-- end row -->



            <div class="text-end">
                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Salvar</button>
            </div>
        </form>
    </div>
    <!-- end settings content-->


                                    </div>
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->

                    </div> <!-- container -->

                </div> <!-- content -->




@endsection