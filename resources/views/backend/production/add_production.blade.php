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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar Produção</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Adicionar Produção</h4>
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
        <form method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
        	@csrf

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Adicionar Produção</h5>

            <div class="row">


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome da Produção</label>
            <input type="text" name="production_name" class="form-control"   >

        </div>
    </div>


              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Categoria </label>
            <select name="category_id" class="form-select" id="example-select">
                    <option selected disabled >Selecionar Categoria</option>
                    @foreach($category as $cat)
        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                     @endforeach
                </select>

        </div>
    </div>


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Cliente </label>
            <select name="customer_id" class="form-select" id="example-select">
                    <option selected disabled >Selecionar Cliente </option>
                    @foreach($customer as $cus)
        <option value="{{ $cus->id }}">{{ $cus->name }}</option>
                     @endforeach
                </select>

        </div>
    </div>



              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Quantidade    </label>
            <input type="text" name="production_store" class="form-control "   >

           </div>
        </div>



              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Prazo de Entrega   </label>
            <input type="date" name="deadline_date" class="form-control "   >

           </div>
        </div>


              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Preço de Custo  </label>
            <input type="text" name="cost_price" class="form-control "   >

           </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Preço de Venda  </label>
                <input type="text" name="selling_price" class="form-control "   >
    
               </div>
            </div>

              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Lucro    </label>
            <input type="text" name="profit_price" class="form-control "   >

           </div>
        </div>




   <div class="col-md-12">
<div class="mb-3">
        <label for="example-fileinput" class="form-label">Customer Image</label>
        <input type="file" name="production_image" id="image" class="form-control">

    </div>
 </div> <!-- end col -->


   <div class="col-md-12">
<div class="mb-3">
        <label for="example-fileinput" class="form-label"> </label>
        <img id="showImage" src="{{  url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail"
                alt="profile-image">
    </div>
 </div> <!-- end col -->



            </div> <!-- end row -->



            <div class="text-end">
                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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