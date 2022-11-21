<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

        <style type="text/css">

            .div_center
            {
                text-align: center;
                padding-top: 10px;
            }
            .font_size
            {
                font-size: 30px;
                padding-bottom: 10px;
            }

            .htable{
                border-collapse: collapse;
                border-radius: 0.5em;
                overflow: hidden;
                width: 100%;
                margin: auto;
                text-align: center;
                margin-top: 5px;
                box-shadow: 3px 3px 3px silver;
            }

            img
            {
                max-height: 80px;
                border-radius: 5px;
                padding-bottom: 5px;
                margin-left: 35px;
                overflow: hidden;
            }
            .th_dsg
            {
                background: rgb(23, 74, 105);
                padding: 20px;
            }

            .htable tr{
                transition: all 0.2s ease-in;
                background: rgb(73, 73, 73);
            }

            tr:hover{
                transform: scale(1.01);
                color: black;
            }
             
             

        </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                    @if (session()->has('message'))
                        <div class="alert alert-success">

                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{session()->get('message')}}

                        </div>
                    @endif
                
              <div class="div_center">
                  <h2 class="font_size">Product Details</h2>
                   <table class="htable">
                     
                        <th class="th_dsg">Product Title</th>
                        <th class="th_dsg">Description</th>
                        <th class="th_dsg">Quantity</th>
                        <th class="th_dsg">Category</th>
                        <th class="th_dsg">Price</th>
                        <th class="th_dsg">Discount Price</th>
                        <th class="th_dsg">Product Image</th>
                        <th class="th_dsg">Delete</th>
                        <th class="th_dsg">Edit</th>
                    
                     
                        @foreach ($product as $product)

                        <tr id="tr_color">
                            <td class="td_dsg">{{ $product->title }}</td>
                            <td class="td_dsg">{{ $product->description }}</td>
                            <td class="td_dsg">{{ $product->quantity }}</td>
                            <td class="td_dsg">{{ $product->category }}</td>
                            <td class="td_dsg">{{ $product->price }}</td>
                            <td class="td_dsg">{{ $product->discount_price }}</td>
                            <td class="td_dsg">
                                <img src="/product/{{ $product->image }}">
                            </td>
                            <td class="td_dsg"><a href="{{ url('delete_product',$product->id) }}" class="btn btn-danger" onclick="return confirm('Confirm Delete')">Delete</a></td>
                            <td class="td_dsg"><a href="{{ url('update_product',$product->id) }}" class="btn btn-primary">Edit</a></td>
                        </tr>
                        
                        @endforeach

                   </table>

              </div>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>