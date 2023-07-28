@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
/* Style for the "Lucro" field */
#profit_price,
#profit_price:focus {
    border-color: green; /* Border color when focused or unfocused */
    color: green; /* Text color */
}

/* Style for the "Lucro por quantidade" field */
#profit_quantity,
#profit_quantity:focus {
    border-color: green; /* Border color when focused or unfocused */
    color: green; /* Text color */
}
</style>

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
        <form id="myForm2" method="post" action="{{ route('production.store') }}" enctype="multipart/form-data">
        	@csrf

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Adicionar Produção</h5>

            <div class="row">


    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Nome da Produção</label>
            <input type="text" name="production_name" class="form-control"   >

        </div>
    </div>


              <div class="col-md-6">
        <div class="form-group mb-3">
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
        <div class="form-group mb-3">
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
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Prazo de Entrega   </label>
            <input type="date" name="deadline_date" class="form-control "   >

           </div>
        </div>


        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="firstname" class="form-label">Preço de Custo Unitário (R$)</label>
                <input type="text" name="cost_price" id="cost_price" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="firstname" class="form-label">Preço de Venda Unitário (R$)</label>
                <input type="text" name="selling_price" id="selling_price" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="firstname" class="form-label">Quantidade</label>
                <input type="text" name="production_store" id="production_store" class="form-control">
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Lucro por Unidade (R$)</label>
                <input type="text" name="profit_price" id="profit_price" class="form-control" readonly>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="firstname" class="form-label">Lucro por Quantidade (R$)</label>
                <input type="text" name="profit_quantity" id="profit_quantity" class="form-control" readonly>
            </div>
        </div>




   <div class="col-md-12">
<div class="mb-3">
        <label for="example-fileinput" class="form-label">Imagem</label>
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
    $(document).ready(function () {
        // Function to calculate and update the profit
        function calculateProfit() {
            const costPrice = parseFloat($("#cost_price").val());
            const sellingPrice = parseFloat($("#selling_price").val());

            if (!isNaN(costPrice) && !isNaN(sellingPrice)) {
                const profit = sellingPrice - costPrice;
                $("#profit_price").val(profit.toFixed(2)); // Display the profit with two decimal places
            }
        }

        // Function to calculate and update the "Lucro x Quantidade" field
        function calculateProfitQuantity() {
            const profitPrice = parseFloat($("#profit_price").val());
            const productionStore = parseFloat($("#production_store").val());

            if (!isNaN(profitPrice) && !isNaN(productionStore)) {
                const profitQuantity = profitPrice * productionStore;
                $("#profit_quantity").val(profitQuantity.toFixed(2)); // Display the result with two decimal places
            }
        }

        // Call the functions when the page loads (in case there are values pre-filled)
        calculateProfit();
        calculateProfitQuantity();

        // Call the functions whenever the inputs change
        $("#cost_price, #selling_price").on("input", calculateProfit);
        $("#profit_price, #production_store").on("input", calculateProfitQuantity);
    });
</script>
                

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm2').validate({
            rules: {
                production_name: {
                    required : true,
                }, 
                category_id: {
                    required : true,
                }, 
                customer_id: {
                    required : true,
                }, 
                production_store: {
                    required : true,
                }, 
                product_garage: {
                    required : true,
                }, 
                deadline_date: {
                    required : true,
                }, 
                cost_price: {
                    required : true,
                }, 
                selling_price: {
                    required : true,
                },
            },
            messages :{
                production_name: {
                    required : 'Digite o Nome do Produto!',
                }, 
                category_id: {
                    required : 'Selecione a Categoria',
                },
                customer_id: {
                    required : 'Selecione o Cliente',
                },
                production_store: {
                    required : 'Digite a Quantidade',
                },
                deadline_date: {
                    required : 'Selecione o Prazo de Entrega',
                },
                cost_price: {
                    required : 'Digite o preço de Custo',
                },
                selling_price: {
                    required : 'Digite o preço de Venda',
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