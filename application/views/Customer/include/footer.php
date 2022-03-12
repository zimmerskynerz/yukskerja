<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= base_url('assets') ?>/js/libs/jquery-3.1.1.min.js"></script>
<script src="<?= base_url('assets') ?>/bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?= base_url('assets') ?>/js/app.js"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script src="<?= base_url('assets') ?>/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="<?= base_url('assets') ?>/plugins/apex/apexcharts.min.js"></script>
<script src="<?= base_url('assets') ?>/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= base_url('assets') ?>/plugins/table/datatable/datatables.js"></script>
<script>
    $('#zero-config').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7
    });
</script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="<?= base_url('assets') ?>/js/scrollspyNav.js"></script>
<script src="<?= base_url('assets') ?>/plugins/select2/select2.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/select2/custom-select2.js"></script>
<!--  BEGIN CUSTOM SCRIPTS FILE  -->
<script src="<?= base_url('assets') ?>/plugins/dropify/dropify.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/blockui/jquery.blockUI.min.js"></script>
<!-- <script src="plugins/tagInput/tags-input.js"></script> -->
<script src="<?= base_url('assets') ?>/js/users/account-settings.js"></script>
</body>

<!-- Mirrored from designreset.com/cork/ltr/demo6/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Aug 2021 03:57:54 GMT -->

</html>