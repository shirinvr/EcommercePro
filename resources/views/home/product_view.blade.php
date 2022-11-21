<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          

          <div>
            <form action="{{ url('search_product') }}" method="GET">
               @csrf
               <input style="width: 500px; border-radius: 10px;" type="text" name="search" placeholder="search product">
               <input style="border-radius: 10px;" type="submit" value="search">
            </form>
          </div>
       </div>


            @if (session()->has('message'))
                     <div class="alert alert-success">

                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}

                     </div>
            @endif

            
       <div class="row">

         @foreach ($product as $products)
            
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{ url('show_details',$products->id) }}" class="option1">
                        show details
                      </a>

                           <form action="{{ url('add_cart',$products->id) }}" method="POST">
                              @csrf

                              <div class="row">

                                 <div class="col-md-4">
                                    <input type="number" name="quantity" min="1" value="1" style="border-radius: 20px; width: 100px;">
                                  </div>
                                 <div class="col-md-4">
                                    <input type="submit" value="Add to cart" style="border-radius: 20px; padding: 10px 45px 11px 45px;">
                                  </div>
                                 
                              </div>

                           </form>

                   </div>
                </div>
                <div class="img-box">
                   <img src="product/{{ $products->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{ $products->title }}
                   </h5>

                   @if ($products->discount_price!=null)

                   <h6 style="color:red;">
                     Discount Price <br>
                     ${{ $products->discount_price }}
                   </h6>
                   
                   <h6 style="text-decoration: line-through; color:blue;">
                     Price <br>
                     ${{ $products->price }}
                   </h6>

                   @else   
                   <h6 style="color:blue;">
                     Price <br>
                     ${{ $products->price }}
                   </h6>
                   @endif

                </div>
             </div>
          </div>
   
         @endforeach


               <span style="padding-top: 20px;">
                  {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
               </span>
         

    </div>
 </section>