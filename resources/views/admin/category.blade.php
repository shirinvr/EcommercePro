<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

        <style type="text/css">

            .div_center
            {
                text-align: center;
                margin: 10px 40px 40px 40px;
            }
            .h2_font
            {
                font-size: 30px;
                padding-bottom: 10px;
                font-weight: bold;
            }

            .right-section{
                width: 474px;
                height: 100px;
                background-color: black;
                border-radius: 15px;
                margin-left: 23%;
                }

            .input-group{
                width: 300px;
                position: relative;
                border-radius: 5px;
                top: 40px;
                margin-left: 30px;
            }

            .center
            {
                margin: auto;
                width: 50%;
                text-align: center;
            }
            table{
                border-collapse: collapse;
                border-radius: 1em;
                overflow: hidden;
            }

            .tr_color
            {
                background: rgb(23, 74, 105);
                padding: 20px;
                height: 47px;
            }
            .td_dsg
             {
                margin-top: 5px;
                background: rgb(73, 73, 73);
             }
             .td_dsg a
             {
                margin-bottom: 10px;
             }

             .submit-button{
                color: rgb(70, 137, 179);
                padding: auto;
                border-radius: 5px;
                width: 125px;
                height: 40px;
                float: right;
                cursor: pointer;
                border: 1px solid rgb(70, 105, 179);
            }

            .submit-button:hover{
                color: black;
                box-shadow: 0 3px 4px white;
                background-color: rgb(0, 134, 179);
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
                    <h2 class="h2_font">Add Category</h2>
                    <form action="{{url('/add_category')}}" method="POST">
                        @csrf
                            <div class="right-section">
                                <input type="text" class="input-group" name="category" placeholder="category name">
                            
                                <input type="submit" class="submit-button" name="submit" value="Add Category">
                            </div>
                            </form>
                            
                </div>

                <table class="center">
                    <tr class="tr_color">
                        <th class="th_dsg">Category name</th>
                        <th class="th_dsg">Action</th>
                    </tr>

                    @foreach ($data as $data)

                    <tr>
                        <td class="td_dsg">{{ $data->category_name }}</td>
                        <td class="td_dsg"><a onclick="return confirm('Confirm Delete')" class="btn btn-danger" href="{{ url('delete_category',$data->id) }}">Delete</a></td>
                    </tr>

                    @endforeach

                </table>
            </div>
          
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>