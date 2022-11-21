<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

        <style type="text/css">

             .title_dsg
             {
                text-align: center;
                font-size: 25px;
                font-weight: bold;
                padding-bottom: 20px;
             }
             table{
                border-radius: 1em;
                overflow: hidden;
             }
            .table_dsg
             {
                text-align: center;
                margin: auto;
                width: 100%;
             }

             img
             {
                max-height: 100px;
                margin-bottom: 5px;
                border-radius: 5px;
             }
             .th_dsg
             {
                background: rgb(0, 128, 171);
                height: 60px;
             }
             .td_dsg
             {
                background: rgb(73, 73, 73);
             }
             #tdimg_dsg
             {
                padding-left: 55px;
                background: rgb(73, 73, 73);
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
                <h1 class="title_dsg">All Orders</h1>


                <div style="padding: 0 0 30px 450px;">
                    <form action="{{ url('search') }}" method="GET">
                        @csrf
                        <input type="text" style="color: black;" name="search" placeholder="search product details">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form> 
                </div>


                    <table class="table_dsg">
                        <tr>
                            <th class="th_dsg">Name</th>
                            <th class="th_dsg">Email</th>
                            <th class="th_dsg">Address</th>
                            <th class="th_dsg">Phone</th>
                            <th class="th_dsg">Product title</th>
                            <th class="th_dsg">Quantity</th>
                            <th class="th_dsg">Price</th>
                            <th class="th_dsg">Payment Status</th>
                            <th class="th_dsg">Delivery Status</th>
                            <th class="th_dsg">Image</th>
                            <th class="th_dsg">Delivered</th>
                            <th class="th_dsg">Print PDF</th>
                            <th class="th_dsg">Send Email</th>
                        </tr>

                        @forelse ($order as $order)

                            <tr>
                                <td class="td_dsg">{{ $order->name }}</td>
                                <td class="td_dsg">{{ $order->email }}</td>
                                <td class="td_dsg">{{ $order->address }}</td>
                                <td class="td_dsg">{{ $order->phone}}</td>
                                <td class="td_dsg">{{ $order->product_title }}</td>
                                <td class="td_dsg">{{ $order->quantity }}</td>
                                <td class="td_dsg">{{ $order->price }}</td>
                                <td class="td_dsg">{{ $order->payment_status }}</td>
                                <td class="td_dsg">{{ $order->delivery_status }}</td>
                                <td id="tdimg_dsg">
                                    <img src="/product/{{ $order->image }}">
                                </td>


                                <td class="td_dsg">
                                    @if ($order->delivery_status=='processing')
                                        
                                    <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('Confirm Product Delivery ?')" class="btn btn-primary">Deliver</a>

                                    @else
                                    <p style="color: rgb(116, 255, 47);">Delivered</p>

                                    @endif
                                </td>


                                <td class="td_dsg">
                                    <a class="btn btn-danger" href="{{ url('print_pdf',$order->id) }}">Print</a>
                                </td>

                                <td class="td_dsg">
                                    <a href="{{ url('send_email',$order->id) }}" class="btn btn-info">Send</a>
                                </td>


                            </tr>

                            @empty
                            <tr>
                                <td colspan="16">No data found</td>
                            </tr>
            

                        @endforelse

                    </table>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>