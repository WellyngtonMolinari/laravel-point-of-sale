@extends('admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<style>
#production_estimate,
#yarn_weightpunt,
#yarn_model {
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
        <form id="myForm" method="post" action="{{ route('yarn.update') }}" enctype="multipart/form-data">
        	@csrf

            <input type="hidden" name="id" value="{{ $yarn->id }}">

            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Adicionar Novo Estoque de Fio</h5>

            <div class="row">

                <div class="form-group col-md-6">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Nome do Fio</label>
                        <input type="text" name="yarn_name" class="form-control" value="{{ $yarn->yarn_name }}"   >
            
                    </div>
                </div>

        <div class="form-group col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Cor do Fio</label>
                <input type="text" name="yarn_color" class="form-control" value="{{ $yarn->yarn_color }}"   >
    
            </div>
        </div>

        <div class="form-group col-md-6">
            <div class="mb-3">
                <label for="firstname" class="form-label">Lote do Fio</label>
                <input type="text" name="yarn_garage" class="form-control" value="{{ $yarn->yarn_garage }}"  >
    
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group mb-3">
                <label for="firstname" class="form-label">Modelo a Produzir</label>
                <select name="production_id" class="form-select" id="production-select">
                    <option selected disabled >Selecionar Modelo a Produzir </option>
                    @foreach($production as $prod)
            <option value="{{ $prod->id }}" data-weight="{{ $prod->production_weight }}"
                {{ $prod->production_name }}
            >
                            {{ $prod->production_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        
        

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="yarn_totalweight" class="form-label">Peso Total do Lote em Kg (Exemplo: 20.350)</label>
                        <input type="text" name="yarn_totalweight" id="yarn_totalweight" class="form-control" pattern="\d+(\.\d{1,3})?" title="Enter a valid weight in the format 20.350" value="{{ $yarn->yarn_totalweight }}">
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="yarn_model" class="form-label">Peso do Modelo de Produção</label>
                        <input type="text" name="yarn_model" id="yarn_model" class="form-control" value="{{ $yarn->yarn_model }}" readonly>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="yarn_totalqtty" class="form-label">Quantidade de Cones</label>
                        <input type="text" name="yarn_totalqtty" id="yarn_totalqtty" class="form-control"  value="{{ $yarn->yarn_totalqtty }}">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="firstname" class="form-label">Produção estimada de Peças</label>
                        <input type="text" name="production_estimate" id="production_estimate" class="form-control" value="{{ $yarn->production_estimate }}" readonly>
                    </div>
                </div>
                    
            
                    
            
            <div class="col-md-6">
                        <div class="mb-3">
                            <label for="yarn_weightpunt" class="form-label">Peso de cada Cone em Kg</label>
                            <input type="text" name="yarn_weightpunt" id="yarn_weightpunt" class="form-control" value="{{ $yarn->yarn_weightpunt }}" readonly>
                        </div>
                    </div>


    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Categoria </label>
            <select name="category_id" class="form-select" id="example-select">
                    <option selected disabled >Selecionar Categoria </option>
                    @foreach($category as $cat)
            <option value="{{ $cat->id }}" {{ $cat->id == $yarn->category_id ? 'selected' : ''  }} >{{ $cat->category_name }}</option>
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
        <option value="{{ $sup->id }}"  {{ $sup->id == $yarn->supplier_id ? 'selected' : ''  }}>{{ $sup->name }}</option>
                     @endforeach
                </select>

        </div>
    </div>




              <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Data de Compra  </label>
            <input type="date" name="buying_date" class="form-control " value="{{ $yarn->buying_date }}"  >

           </div>
        </div>


              <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="firstname" class="form-label">Valor Pago</label>
            <input type="text" name="buying_price" class="form-control " value="{{ $yarn->buying_price }}"  >

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
            <img id="showImage" src="{{  asset($yarn->yarn_image) }}" class="rounded-circle avatar-lg img-thumbnail"
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

    // Function to calculate and update the estimated production
    function calculateEstimatedProduction() {
        const yarnTotalWeight = parseFloat($("#yarn_totalweight").val());
        const yarnModelWeight = parseFloat($("#yarn_model").val());

        if (!isNaN(yarnTotalWeight) && !isNaN(yarnModelWeight) && yarnModelWeight !== 0) {
            const estimatedProduction = yarnTotalWeight / yarnModelWeight;
            const roundedProduction = Math.floor(estimatedProduction); // Round down to the nearest integer
            $("#production_estimate").val(roundedProduction);
        } else {
            $("#production_estimate").val("");
        }
    }

    // Call the function whenever the inputs change
    $("#yarn_totalweight, #yarn_model").on("input", calculateEstimatedProduction);
});
</script>

                

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                yarn_name: {
                    required : true,
                }, 
                category_id: {
                    required : true,
                }, 
                supplier_id: {
                    required : true,
                }, 
                yarn_totalweight: {
                    required : true,
                }, 
                yarn_totalqtty: {
                    required : true,
                }, 
                yarn_color: {
                    required : true,
                },
                yarn_garage: {
                    required : true,
                }, 
                production_id: {
                    required : true,
                }, 
                buying_date: {
                    required : true,
                },  
                buying_price: {
                    required : true,
                },
            },
            messages :{
                yarn_name: {
                    required : 'Adiciona o nome do fio!',
                }, 
                category_id: {
                    required : 'Adicione a categoria',
                },
                supplier_id: {
                    required : 'Adicione o fornecedor',
                },
                yarn_totalweight: {
                    required : 'Adicione o peso total',
                },
                yarn_totalqtty: {
                    required : 'Adicione a quantidade',
                },
                yarn_color: {
                    required : 'Adicione a cor',
                },
                yarn_garage: {
                    required : 'Adicione o Lote!',
                },
                production_id: {
                    required : 'Adicione algum modelo',
                },
                buying_date: {
                    required : 'Adicione a data de compra!',
                }, 
                buying_price: {
                    required : 'Adicione a o valor da compra!',
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