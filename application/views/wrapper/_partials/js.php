<!-- Required Js -->
<script src="<?php echo base_url() ?>/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/vendor-all.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/ripple.js"></script>






<!-- prism Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/prism.js"></script>

<!-- Lightbox Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/ekko-lightbox.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins/lightbox.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/pages/ac-lightbox.js"></script>

<!-- Lightweight WYSIWYG editor Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/trumbowyg.min.js"></script>

<!-- Input Mask Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/jquery.mask.min.js"></script>

<!-- bootstrap-tagsinput-latest Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins/bootstrap-tagsinput.min.js"></script>

<!-- Bootstrap tags Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/bootstrap-maxlength.js"></script>

<!-- form-advance custom js -->
<script src="<?php echo base_url() ?>/assets/js/pages/form-advance-custom.js"></script>

<!-- Datepicker Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/moment.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/plugins/daterangepicker.js"></script>
<script src="<?php echo base_url() ?>/assets/js/pages/ac-datepicker.js"></script>

<!-- minicolors Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/jquery.minicolors.min.js"></script>

<!-- select2 Js -->
<script src="<?php echo base_url() ?>/assets/js/plugins/select2.full.min.js"></script>
<script src="<?php echo base_url() ?>assets/sweetalert/sweetalert.min.js"></script>

<!-- form-select-custom Js -->
<script src="<?php echo base_url() ?>/assets/js/pages/form-select-custom.js"></script>
<script>
	// 	$(document).ready(function () {
    //     $('.preloader').fadeOut(600);
    // });
    var vw = $(window)[0].innerWidth;
    $("#mobile-collapse").on('click', function(e) {
        if (vw > 991) {
            $(".pcoded-navbar:not(.theme-horizontal)").toggleClass("navbar-collapsed");
        } else {
            $(".pcoded-navbar").toggleClass('mob-open');
            e.stopPropagation();
        }
    });
    $(".pcoded-navbar").on('click tap', function(e) {
        e.stopPropagation();
    });
    $('.pcoded-main-container,.pcoded-header').on("click", function() {
        if (vw < 992) {
            if ($(".pcoded-navbar").hasClass("mob-open") == true) {
                $(".pcoded-navbar").removeClass('mob-open');
                $("#mobile-collapse,#mobile-collapse1").removeClass('on');
            }
        }
    });
    if (vw < 992) {
        if ($('.pcoded-navbar').hasClass('theme-horizontal')) {
            $('.pcoded-navbar').addClass('theme-horizontal-dis');
            $('.pcoded-navbar').removeClass('theme-horizontal');
        }
    } else {
        if ($('.pcoded-navbar').hasClass('theme-horizontal-dis')) {
            $('.pcoded-navbar').addClass('theme-horizontal');
            $('.pcoded-navbar').removeClass('theme-horizontal-dis');
        }
    }

</script>
