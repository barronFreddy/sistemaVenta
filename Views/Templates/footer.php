</div>
<footer>
    <div class="footer-area">
        <p>© Sistema de ventas <a href="https://colorlib.com/wp/"></a>.</p>
    </div>
</footer>
</div>

<div id="cambiarCotrasena" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h6>Modificar Contraseña</h6>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmCambiarContrasena" onsubmit="frmCambiarContrasena(event);">
                    <div class="form-gp">
                        <label for="actual">Contraseña</label>
                        <input type="password" id="actual" name="actual" required>
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="nueva">Contraseña Nueva</label>
                        <input type="password" id="nueva" name="nueva" required>
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="confirma">Confirmar contraseña</label>
                        <input type="password" id="confirma" name="confirma" required>
                        <i class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="btn" type="submit">Modificar</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
        <!-- footer area end-->
    <!-- page container area end -->
  
    <!-- jquery latest version -->
  
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- bootstrap 4 js -->
    <script src="<?php echo base_url;?>asset/js/popper.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url;?>asset/js/jquery.slicknav.min.js"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/demo/datatables-demo.js"></script>

    <!-- Start datatable js -->
    <script src="<?php echo base_url; ?>Assets/DataTables/datatables.js"></script>
    <script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <!-- others plugins -->
    <script>
        const base_url = "<?php echo base_url;?>";
    </script>
    <script src="<?php echo base_url;?>Assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url;?>Assets/js/funciones.js"></script>
    <script src="<?php echo base_url;?>Assets/js/select2.min.js"></script>
    
    <script src="<?php echo base_url;?>asset/js/plugins.js"></script>
    <script src="<?php echo base_url;?>asset/js/scripts.js"></script>
    
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>

    <!-- all line chart activation -->
    <script src="<?php echo base_url;?>asset/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="<?php echo base_url;?>asset/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="<?php echo base_url;?>asset/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="<?php echo base_url;?>asset/js/plugins.js"></script>
    <script src="<?php echo base_url;?>asset/js/scripts.js"></script>

</body>

</html>
