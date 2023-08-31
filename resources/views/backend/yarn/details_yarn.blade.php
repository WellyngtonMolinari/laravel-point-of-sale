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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Detalhes do Fio</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Detalhes do Fio</h4>
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
        <form method="post" action="{{ route('yarn.update') }}" enctype="multipart/form-data">
        	@csrf

           <input type="hidden" name="id" value="{{ $yarn->id }}"> 

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Detalhes do Estoque de Fio</h5>

            <div class="row">


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome do Fio</label>
            <p class="text-primary">{{ $yarn->yarn_name }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Cor do Fio</label>
            <p class="text-primary">{{ $yarn->yarn_color }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Lote do Fio</label>
            <p class="text-primary">{{ $yarn->yarn_garage }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Modelo a Produzir</label>
            <p class="text-primary">{{ optional($yarn->production)->production_name }}</p>

        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Peso total do Lote em Kg </label>
            <p class="text-primary">{{ $yarn->yarn_totalweight }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Peso do Modelo de Produção</label>
            <p class="text-primary">{{ optional($yarn->production)->production_weight }}</p>
        </div>
    </div>
    

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Quantidade de Cones</label>
            <p class="text-primary">{{ $yarn->yarn_totalqtty }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Produção estimada de Peças</label>
            <p class="text-primary">{{ $yarn->production_estimate }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Peso de cada Cone em Kg</label>
            <p class="text-primary">{{ $yarn->yarn_weightpunt }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Categoria da Produção</label>
            <p class="text-primary">{{ $yarn->category->category_name }}</p>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Fornecedor</label>
            <p class="text-primary">{{ $yarn->supplier->name }}</p>
        </div>
    </div>


    

      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Data de Compra  </label>
             <p class="text-primary">{{ date('d/m/Y', strtotime($yarn->buying_date)) }}</p>
        </div>
    </div>




    @if(Auth::user()->can('pos.menu'))
 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Valor Pago</label>
             <p class="text-primary">R${{ $yarn->buying_price }}</p>
        </div>
    </div>

    @endif


   <div class="col-md-12">
<div class="mb-3">
        <label for="example-fileinput" class="form-label">Imagem do Fio</label>
        <img id="showImage" src="{{  asset($yarn->yarn_image) }}" class="rounded-circle avatar-lg img-thumbnail"
                alt="profile-image">
    </div>
 </div> <!-- end col -->



            </div> <!-- end row -->


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



<script type="text/javascript">
	
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload =  function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>







@endsection