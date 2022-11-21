<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

        <style type="text/css">

            .div_center
            {
                text-align: center;
                padding-top: 40px;
            }
            .font_size
            {
                font-size: 40px;
                padding-bottom: 40px;
            }
            .input_color
            {
                color: #000;
                border-radius: 5px;
            }
            label
            {
                display: inline-block;
                width: 200px;
            }
            .div_design
            {
                padding-bottom: 15px;
            }
            img
            {
                margin-left: 750px;
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
                    <h1 class="font_size">Update product</h1>
                    <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="div_design">
                            <label>Product Title  :</label>
                            <input type="text" class="input_color" name="title" placeholder="Add title" required value="{{ $product->title }}">
                        </div>
    
                        <div class="div_design">
                            <label>Product Description  :</label>
                            <input type="text" class="input_color" name="description" placeholder="Add description" required value="{{ $product->description }}">
                        </div>
    
                        <div class="div_design">
                            <label>Product price  :</label>
                            <input type="number" class="input_color" name="price" placeholder="Add product price" required value="{{ $product->price }}">
                        </div>
    
                        <div class="div_design">
                            <label>Discount Price  :</label>
                            <input type="number" class="input_color" name="discountprice" placeholder="Add discount price" value="{{ $product->discount_price }}">
                        </div>
    
                        <div class="div_design">
                            <label>Product Quantity  :</label>
                            <input type="number" class="input_color" min="0" name="quantity" placeholder="Add quantity" required value="{{ $product->quantity }}">
                        </div>
    
                        <div class="div_design">
                            <label>Product Category  :</label>
                            <select class="input_color" name="category" required>
                                <option value="{{ $product->category }}" selected="">{{ $product->category }}</option>
                                
                                @foreach ($category as $category)
                                    
                                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                
                                @endforeach

                            </select>
                        </div>

                        <div class="div_design">
                            <label>Current Product image :</label>
                            <img width="100px" height="100px" src="/product/{{ $product->image }}">
                        </div>

                        <div class="div_design">
                            <label>Change Product image :</label>
                            <input type="file" name="image">
                        </div>
    
                        <div>
                            <input type="submit" value="Update product" class="btn btn-primary">
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