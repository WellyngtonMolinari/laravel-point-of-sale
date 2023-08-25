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
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Adicionar Fio</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Adicionar Fio</h4>
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
        <form id="myForm" method="post" action="{{ route('yarn.store') }}" enctype="multipart/form-data">
        	@csrf

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Adicionar Novo Estoque de Fio</h5>

            <div class="row">

                <div class="form-group col-md-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nome do Fio</label>
                        <input type="text" name="yarn_name" class="form-control"   >
            
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="yarn_totalweight" class="form-label">Peso Total dos Fios em Kg (Exemplo: 20.350)</label>
                        <input type="text" name="yarn_totalweight" id="yarn_totalweight" class="form-control" placeholder="20.350" pattern="\d+(\.\d{1,3})?" title="Enter a valid weight in the format 20.350">
                    </div>
                </div>
            
                    
            
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="yarn_totalqtty" class="form-label">Quantidade de Cones</label>
                            <input type="text" name="yarn_totalqtty" id="yarn_totalqtty" class="form-control" placeholder="Digite a quantidade" required>
                        </div>
                    </div>
            
            <div class="col-md-6">
                        <div class="mb-3">
                            <label for="yarn_weightpunt" class="form-label">Peso de cada Cone em Kg</label>
                            <input type="text" name="yarn_weightpunt" id="yarn_weightpunt" class="form-control" readonly>
                        </div>
                    </div>


              <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Categoria </label>
            <select name="category_id" class="form-select" id="example-select">
                    <option selected disabled >Selecionar Categoria </option>
                    @foreach($category as $cat)
        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                     @endforeach
                </select>

        </div>
    </div>

          <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Fornecedor </label>
            <select name="supplier_id" class="form-select" id="example-select">
                    <option selected disabled >Selecionar Fornecedor </option>
                    @foreach($supplier as $sup)
        <option value="{{ $sup->id }}">{{ $sup->name }}</option>
                     @endforeach
                </select>

        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Modelo da Produção</label>
            <select name="production_id" class="form-select" id="production-select">
                <option selected disabled>Selecionar Produção</option>
                @foreach($production as $prod)
                    <option value="{{ $prod->id }}" data-weight="{{ $prod->production_weight }}">{{ $prod->production_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="yarn_model" class="form-label">Peso do Modelo de Produção</label>
            <input type="text" name="yarn_model" id="yarn_model" class="form-control" readonly>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Produção estimada em Peças</label>
            <input type="text" name="production_estimate" class="form-control "   >

           </div>
        </div>

        <div class="form-group col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Cor do Fio</label>
                <input type="text" name="yarn_color" class="form-control"   >
    
            </div>
        </div>

        <div class="form-group col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Lote do Fio</label>
                <input type="text" name="yarn_garage" class="form-control"   >
    
            </div>
        </div>




              <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Data de Compra  </label>
            <input type="date" name="buying_date" class="form-control "   >

           </div>
        </div>




              <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Preço de Compra  </label>
            <input type="text" name="buying_price" class="form-control "   >

           </div>
        </div>






   <div class="col-md-12">
<div class="form-group mb-3">
        <label for="example-fileinput" class="form-label">Imagem do Fio</label>
        <input type="file" name="yarn_image" id="image" class="form-control">

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
    $(document).ready(function () {

        // Function to calculate and update the total weight
        function calculateTotalWeight() {
            const yarnWeight = parseFloat($("#yarn_totalweight").val());
            const yarnQtty = parseFloat($("#yarn_totalqtty").val());

            if (!isNaN(yarnWeight) && !isNaN(yarnQtty)) {
                const totalWeight = yarnWeight / yarnQtty;
                $("#yarn_weightpunt").val(totalWeight.toFixed(3)); // Display the result with three decimal places
            }
        }

        // Call the functions when the page loads (in case there are values pre-filled)
        calculateTotalWeight();

        // Call the functions whenever the inputs change
        $("#yarn_totalweight, #yarn_totalqtty").on("input", calculateTotalWeight);


        $("#production-select").on("change", function () {
            const selectedProductionId = $(this).val();
            const selectedProductionWeight = $(this).find("option:selected").data("weight");
            
            if (selectedProductionWeight) {
                $("#yarn_model").val(selectedProductionWeight);
            } else {
                $("#yarn_model").val("");
            }
        });
    });
</script>

                

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                product_name: {
                    required : true,
                }, 
                category_id: {
                    required : true,
                }, 
                supplier_id: {
                    required : true,
                }, 
                product_garage: {
                    required : true,
                }, 
                product_store: {
                    required : true,
                }, 
                buying_date: {
                    required : true,
                }, 
                expire_date: {
                    required : true,
                }, 
                buying_price: {
                    required : true,
                }, 
                selling_price: {
                    required : true,
                }, 
                product_image: {
                    required : true,
                },  
            },
            messages :{
                product_name: {
                    required : 'Please Enter Product Name',
                }, 
                category_id: {
                    required : 'Please Select Category',
                },
                supplier_id: {
                    required : 'Please Select Supplier',
                },
                product_garage: {
                    required : 'Please Enter Product Garage',
                },
                product_store: {
                    required : 'Please Enter Product Store',
                },
                buying_date: {
                    required : 'Please Slect Buying Date',
                },
                expire_date: {
                    required : 'Please Slect Expire Date',
                },
                buying_price: {
                    required : 'Please Enter Buying Price',
                },
                selling_price: {
                    required : 'Please Enter Selling Price',
                },
                product_image: {
                    required : 'Please Select Product Image',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>


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