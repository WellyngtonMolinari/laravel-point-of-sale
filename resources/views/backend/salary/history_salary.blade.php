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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Histórico Salários</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Histórico Salários</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-8 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <!-- end timeline content-->
                        @foreach($historysalary as $item)
                        <div class="tab-pane" id="settings">
                            <h5 class="mb-4 text-uppercase">
                                <i class="mdi mdi-account-circle me-1"></i>
                                Histórico de "{{ $item['employee']['name'] }}" 
                                <label for="firstname" class="form-label">/ Mês Referente: </label>
            <strong style="color: #000000;">
                @if(isset($item['salary_month']))
                    {{ \Carbon\Carbon::parse($item['salary_month'])->locale('pt_BR')->isoFormat('MMMM YYYY') }}
                @else
                    Mês não disponível
                @endif
            </strong>
                            </h5>

 

<div class="row">

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Salário do Funcionário: </label>
            <strong style="color: #000000;">
                @if(isset($item['employee']['salary']))
                    R${{ $item['employee']['salary'] }},00
                @else
                    Salário do Funcionário não disponível
                @endif
            </strong>
        </div>
    </div>

    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Adiantamentos: </label>
            <strong style="color: red;">
                @if(isset($item['advance_salary']))
                   R${{ $item['advance_salary'] }},00
                @else
                    Adiantamentos não disponível
                @endif
            </strong>
        </div>
    </div>

    @php
    $amount = isset($item['employee']['salary']) && isset($item['advance_salary'])
        ? $item['employee']['salary'] - $item['advance_salary']
        : null;
    @endphp

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Salário Pago: </label>
            <strong style="color: green;">
                @if(isset($amount))
                R${{ $amount }},00
                @else
                    Salário pago não disponível
                @endif
            </strong>
        </div>
    </div>
</div> <!-- end row -->
@endforeach
<!-- ... previous code ... -->

<div class="row">
    <div class="col-md-12 text-end">
        <strong style="color: green;">Total Salários Pagos:
            @php
            $totalPaidSalaries = 0;
            $totalAdvancedAmounts = 0;
            @endphp

            @foreach($historysalary as $item)
                @php
                $totalPaidSalaries += $item['employee']['salary'] ?? 0;
                $totalAdvancedAmounts += $item['advance_salary'] ?? 0;
                @endphp
            @endforeach

            R${{ $totalPaidSalaries - $totalAdvancedAmounts }},00
        </strong>
    </div>
</div> <!-- end row -->

<!-- ... rest of the code ... -->


                        </div>
                        <!-- end settings content-->
                    </div>
                </div>
                <!-- end card-->
            </div>
            <!-- end col -->
        </div>
        <!-- end row-->
    </div>
    <!-- container -->
</div>
<!-- content -->
@endsection
