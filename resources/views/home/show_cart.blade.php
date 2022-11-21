<!DOCTYPE html>
<html>
   <head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


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
                table
                {
                  width: 1000px;
                  border: 2px solid black;
                  border-radius: 10px;
                  overflow: hidden;
                }
                th,td
                  {
                    background: rgb(177, 149, 149);
                  }
                .th_dsg
                  {
                    font-size: 30px;
                    padding: 5px;
                    background: rgb(0, 111, 148);
                  }
                  img
                  {
                    max-height: 100px;
                    border-radius: 5px;
                  }
            </style>

   </head>
   <body>

    @include('sweetalert::alert')


      <div class="hero_area">

         <!-- header section starts -->
         @include('home.header')
         <!-- end header section -->



                    @if (session()->has('message'))
                      <div class="alert alert-success">

                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                          {{session()->get('message')}}

                      </div>
                    @endif



      <div style="margin: auto; text-align: center;">
        <table>
            <tr>
                <th class="th_dsg">Product title</th>
                <th class="th_dsg">Product quantity</th>
                <th class="th_dsg">Price</th>
                <th class="th_dsg">image</th>
                <th class="th_dsg">action</th>
            </tr>

            <?php $totalprice=0; ?>

            @foreach ($cart as $cart)
                
            <tr>
                <td>{{ $cart->product_title }}</td>
                <td>{{ $cart->quantity }}</td>
                <td>{{ $cart->price }}</td>
                <td><img src="/product/{{ $cart->image }}"></td>
                <td>
                    <a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('/remove_cart',$cart->id) }}">Remove</a>
                </td>
            </tr>

            <?php $totalprice=$totalprice + $cart->price ?>

            @endforeach

        </table>

            <div>
                <h1 style="font-size: 20px; padding: 40px;">Total price: {{ $totalprice }}</h1>
            </div>


            <div>

              <h1 style="font-size: 20px; padding-bottom: 15px;">Order Now</h1>
              <a href="{{ url('cash_order') }}" class="btn btn-danger" style="margin-bottom: 15px;">Cash On Delivery</a>
              <a href="{{ url('stripe',$totalprice) }}" class="btn btn-danger" style="margin-bottom: 15px;">Pay By Card</a>

            </div>

      </div>

      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Famms</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Famms</a>
         
         </p>
      </div>

      <script>
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
            title: "are you sure to cancel product",
            text: "You will not be able to revert this",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willCancel) => {

                if (willCancel) {

                  window.location.href = urlToRedirect;

                }

          });
        }
      </script>



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