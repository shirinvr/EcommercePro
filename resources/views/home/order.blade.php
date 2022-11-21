<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion website</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />

      <style type="text/css">
      
         table{
            margin-left: 300px;
            border-radius: 0.5em;
            overflow: hidden;
            width: 1000px;
            padding-left: 30px;
         }

         img
         {
            max-height: 100px;
            margin-bottom: 5px;
            border-radius: 5px;
         }
         .th_dsg
         {
            margin-right: 60px;
            padding-left: 20px;
            background: rgb(0, 128, 171);
            height: 60px;
         }
         .td_dsg
         {
            padding-left: 20px;
            background: rgb(177, 149, 149);
         }
         #tdimg_dsg
         {
            padding-left: 55px;
            background: rgb(73, 73, 73);
         }

    </style>
   </head>
   <body>
      

         <!-- header section starts -->
         @include('home.header')
         <!-- end header section -->

         <div>
            <table>
               <tr>
                  <th class="th_dsg">Product</th>
                  <th class="th_dsg">quantity</th>
                  <th class="th_dsg">Price</th>
                  <th class="th_dsg">Payment status</th>
                  <th class="th_dsg">Delivery status</th>
                  <th class="th_dsg">Image</th>
                  <th class="th_dsg">order</th>
               </tr>

               @foreach ($order as $order)
               <tr>
                  <td class="td_dsg">{{ $order->product_title }}</td>
                  <td class="td_dsg">{{ $order->quantity }}</td>
                  <td class="td_dsg">{{ $order->price }}</td>
                  <td class="td_dsg">{{ $order->payment_status }}</td>
                  <td class="td_dsg">{{ $order->delivery_status }}</td>
                  <td class="td_dsg">
                     <img src="product/{{ $order->image }}">
                  </td>
                  @if ($order->delivery_status=='processing')
                     
                  <td class="td_dsg"><a onclick="return confirm('Confirm cancel order')" href="{{ url('cancel_order',$order->id) }}" class="btn btn-danger">cancel</a>
                  @else
                     <td class="td_dsg">cancelled</td>
                  @endif
               </tr>
               @endforeach
            </table>
         

      
      <!-- jQery -->
      <script src="../home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="../home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="../home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="../home/js/custom.js"></script>
   </body>
</html>