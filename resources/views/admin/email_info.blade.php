<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    
    @include('admin.css')

        <style type="text/css">

                .right-section{
                width: 600px;
                background-color: black;
                border-radius: 15px;
                padding: 40px 0;
                box-shadow: 0 3px 6px silver;
                margin: 2% 0 0 28%;
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

            .input-group input{
                border: none;
                padding: 7px;
                margin-top: 5px;
                outline: none;
                color: black;
                border-bottom: 1px solid black;
                border-radius: 5px;
                }

            .submit-section{
                text-align: center;
                }
            .submit-button{
                color: white;
                border: none;
                padding: 10px 0;
                margin-top: 15px;
                border-radius: 5px;
                width: 200px;
                cursor: pointer;
                border: 1px solid rgb(70, 137, 179);
                }

            .submit-button:hover{
                box-shadow: 0 3px 4px white;
                background-color: rgb(0, 134, 179);
                }
        /* right section end*/ 

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
                
                <div class="right-section">
                    <h1 style="text-align: center; font-size: 25px;">Send Email to {{ $order->email }}</h1>

                    <form action="{{ url('send_user_email',$order->id) }}" method="POST">

                        @csrf

                        <div class="input-group">
                            <input type="text" id="greeting" />
                            <label for="greeting">Email Greeting</label>
                        </div>
                        <div class="input-group">
                            <input type="text" id="fline" />
                            <label for="fline">Email firstline</label>
                        </div>
                        <div class="input-group">
                            <input type="text" id="body" />
                            <label for="body">Email Body</label>
                        </div> 
                        <div class="input-group">
                            <input type="text" id="button" />
                            <label for="button">Email button name</label>
                        </div> 
                        <div class="input-group">
                            <input type="text" id="url" />
                            <label for="url">Email url</label>
                        </div> 
                        <div class="input-group">
                            <input type="text" id="lline" />
                            <label for="lline">Email Lastline</label>
                        </div> 
                        <div class="submit-section">
                            <input type="submit" class="submit-button" value="Send">
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