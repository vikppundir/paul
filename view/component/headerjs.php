<script> 
$(window).scroll(function () {
            var scroll = $(window).scrollTop();
            if (scroll > 0) {
                $("header").addClass("header-shadow");
            }
            else {
                $("header").removeClass("header-shadow");
            }
        });
        $(document).ready(function () {
            $(".mentor-ham-burger").click(function () {
                $(".menu").addClass("tranform30");
            });
        });
        $(document).ready(function () {
            $(".cross-menu").click(function () {
                $(".menu").removeClass("tranform30");
            });
        });
</script>