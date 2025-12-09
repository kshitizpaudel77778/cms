                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                
            </div>
            <!-- End of Content Wrapper -->



        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
        </a>
        
        <script src="<?php echo base_url(); ?>public/admin/js/sb-admin-2.min.js"></script>
        <script src="<?php echo base_url(); ?>public/admin/js/custom.js"></script>

        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>

        <?php
        if($this->session->flashdata('success')):
            echo '
            <script>
            toastr.success(\''.$this->session->flashdata('success').'\');
            </script>
            ';
        endif;
        if($this->session->flashdata('error')):
            echo '
            <script>
            toastr.error(\''.$this->session->flashdata('error').'\');
            </script>
            ';
        endif;
        ?>
    </body>
</html>