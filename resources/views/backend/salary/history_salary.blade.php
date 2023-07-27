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
                        <div class="tab-pane" id="settings">
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Histórico Salários</h5>

                            <!-- ... previous code ... -->
@foreach($historysalary as $item)
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome do Funcionário</label>
            <strong style="color: #000000;">{{ $item['employee']['name'] }}</strong>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Mês do Salário</label>
            <strong style="color: #000000;">
                @if(isset($item['salary_month']))
                    {{ date("F", strtotime($item['salary_month'])) }}
                @else
                    Salário não disponível
                @endif
            </strong>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Salário do Funcionário</label>
            <strong style="color: #000000;">
                @if(isset($item['employee']['salary']))
                    {{ $item['employee']['salary'] }}
                @else
                    Salário do Funcionário não disponível
                @endif
            </strong>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Adiantamentos</label>
            <strong style="color: #000000;">
                @if(isset($item['advance']['advance_salary']))
                    {{ $item['advance']['advance_salary'] }}
                @else
                    Adiantamentos não disponível
                @endif
            </strong>
        </div>
    </div>

    @php
    $amount = isset($item['employee']['salary']) && isset($item['advance']['advance_salary'])
        ? $item['employee']['salary'] - $item['advance']['advance_salary']
        : null;
    @endphp

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Salário Devido</label>
            <strong style="color: #000000;">
                @if(isset($item['advance']['advance_salary']) && $item['advance']['advance_salary'] === null)
                    <span>Sem salário</span>
                @elseif(isset($amount))
                    {{ round($amount) }}
                @else
                    Salário devido não disponível
                @endif
            </strong>
        </div>
    </div>
</div> <!-- end row -->
@endforeach
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
