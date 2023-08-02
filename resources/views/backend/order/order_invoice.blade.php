<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Comprovante de Pagamento</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
    }
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: purple;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: purple;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: purple; font-size: 26px;"><strong>`Nome da Empresa`</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
                Nome da Empresa
               Email:support@email.com <br>
               Celular: (35) 9-245454545 <br>
               Rua Marechal Deodoro, 939. Jacutinga - MG. <br>

            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;"></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;">
<strong>Nome do Cliente:</strong> {{ $order->customer->name }}  <br>
<strong>Email do Cliente:</strong> {{ $order->customer->email }}   <br>
<strong>Celular do Cliente:</strong> {{ $order->customer->phone }}   <br>

<strong>Endereço: {{ $order->customer->address }} </strong>  

         </p>
        </td>
        <td>
          <p class="font">
<h3><span style="color: purple;">Pedido n°:</span> # {{ $order->invoice_no }}  </h3>
Data do Pedido:  {{ date('d/m/Y', strtotime($order->order_date)) }} <br>

         </p>
        </td>
    </tr>
  </table>
  <br/>
<h3>Produtos</h3>


  <table width="100%">
    <thead style="background-color: purple; color:#FFFFFF;">
      <tr class="font">
         {{-- <th>Imagem </th> --}}
        <th>Nome do Produto</th>
        <th>Código do Produto</th>
        <th>Quantidade</th>
        <th>Preço</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>

     @foreach($orderItem as $item)
      <tr class="font">
        {{-- <td align="center">
<img src="{{ public_path($item->product->product_image) }} " height="50px;" width="50px;" alt="">
        </td> --}}
        <td align="center"> {{ $item->product->product_name }} </td>

        <td align="center"> {{ $item->product->product_code }} </td>
        <td align="center"> {{ $item->quantity }} </td>



        <td align="center">R${{ $item->product->selling_price }} </td>
         <td align="center">R$ {{ $item->total }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
<h2><span style="color: purple;">Total:</span> R${{ $order->total }} </h2>
            {{-- <h2><span style="color: purple;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Agradecemos pela preferênia</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Assinatura</h5>
    </div>
</body>
</html>