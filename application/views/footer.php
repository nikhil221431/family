<!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Premium <a href="https://datagrid.co.in/" target="_blank">Datagrid Solutions</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2021. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  
  <script src="<?php echo base_url("assets/vendors/select2/select2.min.js");?>"></script>
  <script src="<?php echo base_url("assets/js/select2.js");?>"></script>

  <script>

    $(document).ready(function(){

      $("#logout").on("click", function(){

        var form_data = {};

        $.post( "<?php echo site_url('Family/logoutuser');?>" ,form_data,function(message) {

          alert(message.message);

          if(message.output == "TRUE"){

            // location.reload(true);
            window.location = "<?php  echo site_url('login'); ?>";
          }

        }, 'json');
      });
    });
  </script>
</body>

</html>