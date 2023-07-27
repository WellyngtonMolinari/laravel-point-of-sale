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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Editar Adiantamentos</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Editar Adiantamentos</h4>
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
        <form method="post" action="{{ route('advance.salary.update') }}" >
        	@csrf

            <input type="hidden" name="id" value="{{ $salary->id }}">

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Editar Adiantamentos</h5>

            <div class="row">


 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome do Funcionário   </label>
           <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" id="example-select">
                    <option selected disabled >Selecionar Funcionário </option>
                    @foreach($employee as $item)
                    <option value="{{  $item->id }}" {{ $item->id == $salary->employee_id ? 'selected' : '' }}>{{  $item->name }}</option>
                    @endforeach
                </select> 
        </div>
    </div>


 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Salário do Mês   </label>
           <select name="month" class="form-select @error('month') is-invalid @enderror" id="example-select">
<option selected disabled >Selecionar Mês</option>
<option value="January" {{ $salary->month == 'January' ? 'selected' : '' }}>Janeiro</option>
<option value="February"{{ $salary->month == 'February' ? 'selected' : '' }}>Fevereiro</option>
<option value="March"{{ $salary->month == 'March' ? 'selected' : '' }}>Março</option>
<option value="April"{{ $salary->month == 'April' ? 'selected' : '' }}>Abril</option>
<option value="May"{{ $salary->month == 'May' ? 'selected' : '' }}>Maio</option>
<option value="Jun"{{ $salary->month == 'Jun' ? 'selected' : '' }}>Junho</option>
<option value="July"{{ $salary->month == 'July' ? 'selected' : '' }}>Julho</option>
<option value="August"{{ $salary->month == 'August' ? 'selected' : '' }}>Agosto</option>
<option value="September"{{ $salary->month == 'September' ? 'selected' : '' }}>Setembro</option>
<option value="October"{{ $salary->month == 'October' ? 'selected' : '' }}>Outubro</option>
<option value="November"{{ $salary->month == 'November' ? 'selected' : '' }}>Novembro</option>
<option value="December"{{ $salary->month == 'December' ? 'selected' : '' }}>Dezembro</option> 
                </select>
                 @error('month')
      <span class="text-danger"> {{ $message }} </span>
            @enderror

        </div>
    </div>


      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Selecionar Ano   </label>
           <select name="year" class="form-select @error('year') is-invalid @enderror" id="example-select">
    <option selected disabled >Selecionar Ano </option>
    <option value="2023" {{ $salary->year == '2023' ? 'selected' : '' }}>2023</option>
    <option value="2024" {{ $salary->year == '2024' ? 'selected' : '' }}>2024</option>
    <option value="2025" {{ $salary->year == '2025' ? 'selected' : '' }}>2025</option>
    <option value="2026" {{ $salary->year == '2026' ? 'selected' : '' }}>2026</option>
                </select>
                 @error('year')
      <span class="text-danger"> {{ $message }} </span>
            @enderror

        </div>
    </div>


 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Adiantamentos   </label>
            <input type="text" name="advance_salary" class="form-control @error('advance_salary') is-invalid @enderror" value="{{ $salary->advance_salary }}"   >
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