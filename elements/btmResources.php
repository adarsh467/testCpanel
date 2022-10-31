        </div>

        <!-- JS -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

        <!-- Main JS -->
        <script src="assets/js/main.js"></script>

        <script>
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        </script>
        <?php if(isset($sucMsg)) { ?>
            <script type="text/javascript">
                $(function() {
                    toastr.success('<?= $sucMsg ?>');
                });
            </script>
        <?php } elseif(isset($errMsg)) { ?>
            <script type="text/javascript">
                $(function() {
                    toastr.error('<?= $errMsg ?>');
                });
            </script>
        <?php } ?>
    </body>
</html>