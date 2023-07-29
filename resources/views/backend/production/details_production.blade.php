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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Detalhes da Produção</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Detalhes da Produção</h4>
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
        <form method="post" action="{{ route('production.update') }}" enctype="multipart/form-data">
        	@csrf

           <input type="hidden" name="id" value="{{ $production->id }}"> 

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Detalhes da Produção</h5>

            <div class="row">


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome da Produção</label>
            <p class="text-danger">{{ $production->production_name }}</p>
        </div>
    </div>


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Categoria da Produção</label>
            <p class="text-danger">{{ $production->category->category_name }}</p>
        </div>
    </div>




    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Cliente</label>
            <p class="text-danger">{{ $production->customer->name }}</p>
        </div>
    </div>




      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Prazo de Entrega  </label>
             <p class="text-danger">{{ date('d/m/Y', strtotime($production->deadline_date)) }}</p>
        </div>
    </div>




    @if(Auth::user()->can('pos.menu'))
 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Preço de Custo Unitário (R$)    </label>
             <p class="text-danger">{{ $production->cost_price }}</p>
        </div>
    </div>

     <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Preço de Venda Unitário (R$) </label>

              <p class="text-danger">{{ $production->selling_price }}</p>
        </div>
    </div>
    @endif

      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Quantidade    </label>

              <p class="text-danger">{{ $production->production_store }}</p>
        </div>
    </div>

    @if(Auth::user()->can('pos.menu'))
      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Lucro por Unidade (R$)    </label>

             <p class="text-danger">{{ $production->profit_price }}</p>
        </div>
    </div>


     <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Lucro por Quantidade (R$) </label>
            <p class="text-danger">{{ $production->profit_quantity }}</p>
        </div>
    </div>
    @endif


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Estado </label>
            <p class="text-danger">{{ $production->production_status }}</p>
        </div>
    </div>



   <div class="col-md-12">
<div class="mb-3">
        <label for="example-fileinput" class="form-label">Imagem</label>
        <img id="showImage" src="{{  asset($production->production_image) }}" class="rounded-circle avatar-lg img-thumbnail"
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