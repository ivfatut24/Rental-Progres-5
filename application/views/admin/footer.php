</main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-right">
                            <p class="mb-0">
                                &copy; 2020
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

<!-- <script src="app.js"></script> -->
<script src="<?php echo base_url('assets/cardoor/js/jquery-3.2.1.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/feather.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/bootstrap.bundle.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/datatable-theme.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/moment-with-locales.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/daterangepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/cardoor/js/jquery-confirm.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/adminltew/js/script.js') ?>"></script>
    <script type="text/javascript">
        $(function () {
            feather.replace()
            $("#table").dataTable({
            'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }],
            "order": []
            });
        });
    </script>
</body>

</html>