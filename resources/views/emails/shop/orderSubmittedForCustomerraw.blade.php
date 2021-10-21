<!DOCTYPE html>
<html>

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>


<body>

 Dear {{$customerShipping->first_name}}

    </div>



A new Order has been submitted


<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row clearfix">
      <div class="col-md-12">
        <table class="table table-bordered table-hover" id="tab_logic">
          <thead>
            <tr>

              <th class="text-center"> Product </th>
              <th class="text-center"> Price </th>
              <th class="text-center"> Qty </th>
              <th class="text-center"> Size </th>
              <th class="text-center"> discount price </th>
              <th class="text-center"> Total </th>
            </tr>
          </thead>

          <tbody>

            <tbody>
                @include('emails.shop.orderSubmittedItems',['order_items'=>$order->orderItems])

              </tbody>


          </tbody>

        </table>
      </div>
    </div>


  </div>


<div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tr>
            <th class="text-center">Grand Total</th>
        <td class="text-center">{{$order->total}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
