 <footer>
     <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <div class="inner-content">
                     <p>Copyright © 2022 Tanamas Industry Comunitas</p>
                 </div>
             </div>
         </div>
     </div>
 </footer>


 <!-- Bootstrap core JavaScript -->
 <script src="{{ url('web/vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ url('web/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>


 <!-- Additional Scripts -->
 <script src="{{ url('web/assets/js/custom.js') }}"></script>
 <script src="{{ url('web/assets/js/owl.js') }}"></script>
 <script type="text/javascript">
     function submitForm() {
         $('#muter_beh').show();
         $('#submit_form').hide();
         setTimeout(function() {
             window.location.href = "{{ url('/') }}";
         }, 7000);
     }
 </script>
 </body>

 </html>
