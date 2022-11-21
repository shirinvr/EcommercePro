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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvihz0PPSSiiqn/+/3e7Jo4EaG7TubfwGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


   </head>
   <body>

      @include('sweetalert::alert')


      <div class="hero_area">

         <!-- header section starts -->
         @include('home.header')
         <!-- end header section -->

         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->

      </div>

      <!-- why section -->
      @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->


      {{-- comment and reply system starts here --}}

      <div style="padding-left: 290px">
      <h1 style="font-size: 30px; padding: 20px 0">Comments</h1>
      

      <form style="margin-bottom: 20px;" action="{{ url('add_comment') }}" method="POST">
         @csrf
         <textarea style="height: 150px; width: 600px;" placeholder="comment here" name="comment"></textarea>
         <br>
         <input type="submit" class="btn btn-primary" value="comment" style="margin-left: 0;">
      </form>
      </div>
      <div style="padding-left: 290px">
         <h1 style="font-size: 20px; padding-bottom: 20px;">All comments</h1>
      </div>

      @foreach ($comment as $comment)

      <div style="padding-left: 290px">
         <b>{{ $comment->name }}</b>
         <p>{{ $comment->comment }}</p>
         <a style="color: rgb(49, 87, 100);" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>

                  @foreach ($reply as $rep)
                     @if ($rep->comment_id==$comment->id)
                        
                           <div>
                              <b>{{ $rep->name }}</b>
                              <p>{{ $rep->reply }}</p>
                           </div>
                           <a style="color: rgb(49, 87, 100);" href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment->id }}">Reply</a>
                     
                     @endif
                              
                  @endforeach


      </div>

      @endforeach


      {{-- Reply textbox --}}

      <div style="display: none;" class="replyDiv">

         <form action="{{ url('add_reply') }}" method="POST">

         <input type="text" id="commentId" name="commentId" hidden="">
         <textarea placeholder="text here" style="width: 600px;" name="reply"></textarea>

         <br>

         <button type="submit" class="btn btn-warning">Reply</button>
         <a href="javascript::void(0);" class="btn" onclick="reply_close(this)">Close</a>

         </form>
      </div>
   



      {{-- comment and reply system ends here --}}



      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->

      <!-- client section -->
      @include('home.client')
      <!-- end client section -->

      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>


      <script type="text/javascript">

         function reply(caller)
         {
            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));

            $('.replyDiv').show();
         }

         function reply_close(caller)
         {

            $('.replyDiv').hide();
         }

      </script>
      
      <script>
         document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
         });

         window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
         };
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