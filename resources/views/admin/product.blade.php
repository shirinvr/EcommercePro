<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
        <style type="text/css">

            .div_center
            {
                text-align: center;
            }

            .right-section{
                text-align: center;
                width: 600px;
                background-color: black;
                border-radius: 15px;
                padding: 2px 0;
                box-shadow: 0 3px 6px silver;
                margin: 0 0 0 28%;
            }
            
            .font_size
            {
                font-size: 30px;
            }

            .input-group{
                width: 400px;
                margin: 30px auto;
                display: flex;
                flex-direction: column;
                top: 10px;
                }

            .input-group label{
                position: absolute;
                color: #2098ca;
                top: -18px;
                font-size: 18px;
                }

            .input-group .input {
                border-radius: 5px;
            }

            .input-group input{
                border: none;
                padding: 7px;
                margin-top: 5px;
                outline: none;
                color: #2098ca;
                border-bottom: 1px solid black;
                border-radius: 5px;
                }

            .submit-section{
                text-align: center;
                margin-bottom: 10px;
                }
            .submit-button{
                color: white;
                border: none;
                padding: 10px 0;
                margin-top: 3px;
                border-radius: 5px;
                width: 150px;
                cursor: pointer;
                border: 1px solid rgb(70, 137, 179);
                }

            .submit-button:hover{
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
              <div class="right-section">
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                                <div class="input-group">
                                    <label>Product Title  :</label>
                                    <input type="text" placeholder="Add Title" required>
                                </div>
            
                                <div class="input-group">
                                    <label>Product Description  :</label>
                                    <input type="text" placeholder="Add description" required>
                                </div>
            
                                <div class="input-group">
                                    <label>Product price  :</label>
                                    <input type="number" name="price" placeholder="Add product price" required>
                                </div>
            
                                <div class="input-group">
                                    <label>Discount Price  :</label>
                                    <input type="number" name="discountprice" placeholder="Add discount price">
                                </div>
            
                                <div class="input-group">
                                    <label>Product Quantity  :</label>
                                    <input type="number" min="0" name="quantity" placeholder="Add quantity" required>
                                </div>
            
                                <div class="input-group">
                                    <label>Product Category  :</label>
                                    <select name="category" class="input" placeholder="Add category" required>
                                        <option value="" selected="">Add category</option>
                                        
                                        @foreach ($category as $category)
                                            
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        
                                        @endforeach

                                    </select>
                                </div>
            
                                <div class="input-group">
                                    <label>Product image  :</label>
                                    <input type="file" name="image" required>
                                </div>
            
                                <div class="submit-section">
                                    <input type="submit" value="Add product" class="submit-button">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>