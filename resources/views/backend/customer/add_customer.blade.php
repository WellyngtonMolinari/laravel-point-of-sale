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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Clientes</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Adicionar Cliente</h4>
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

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Adicionar Cliente</h5>

            <div class="row">


    <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome do Cliente *</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"   >
             @error('name')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>


              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Email do Cliente *</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"   >
             @error('email')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>




              <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Celular do Cliente *</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"   >
             @error('phone')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>


      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Endereço do Cliente   </label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"   >
             @error('address')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>



      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome da Loja do Cliente    </label>
            <input type="text" name="shopname" class="form-control @error('shopname') is-invalid @enderror"   >
             @error('shopname')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>






 <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Titular da Conta    </label>
            <input type="text" name="account_holder" class="form-control @error('account_holder') is-invalid @enderror"   >
             @error('account_holder')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>

     <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Número da Conta    </label>
            <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"   >
             @error('account_number')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>

      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Nome do Banco    </label>
            <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror"   >
             @error('bank_name')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>


      <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Agência Bancária    </label>
            <input type="text" name="bank_branch" class="form-control @error('bank_branch') is-invalid @enderror"   >
             @error('bank_branch')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>


     <div class="col-md-6">
        <div class="mb-3">
            <label for="firstname" class="form-label">Cidade do Cliente   </label>
            <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"   >
             @error('city')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
        </div>
    </div>




   <div class="col-md-12">
<div class="mb-3">
        <label for="example-fileinput" class="form-label">Imagem do Cliente</label>
        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
          @error('image')
      <span class="text-danger"> {{ $message }} </span>
            @enderror
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