 <footer>
     <div class="container">
         <div class="inner-content">
             <div class="row">
                 <div class="col-md-12">
                     <p>Copyright © 2022 Tanamas Industry Comunitas</p>
                 </div>
             </div>
             <br>
             <br>
             <br>
             <div class="row">
                 <div class="col-md-12">
                     <iframe
                         src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.630992222739!2d106.799978!3d-6.180121000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f68bd0334fe1%3A0xa7e3f12a13ec5ac3!2sPT.%20TANAMAS%20INDUSTRY%20COMUNITAS%20Furniture%20%26%20Handicrafts%20Exporters!5e0!3m2!1sid!2sid!4v1700291402748!5m2!1sid!2sid"
                         width="800" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                         referrerpolicy="no-referrer-when-downgrade"></iframe>
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
