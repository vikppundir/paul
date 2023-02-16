<script>
// login JS
        $(".sign-up").click(function () {
            $(".signup-box").css("display", "block");
            $(".login-inner").css("display", "none");
        });
        $(".login-text").click(function () {
            $(".signup-box").css("display", "none");
            $(".login-inner").css("display", "block");
        });
        $("#forgt-pass").click(function () {
            $(".forgot-pass").css("display", "block");
            $(".login-inner").css("display", "none");
        });
        $("#login-return").click(function () {
            $(".forgot-pass").css("display", "none");
            $(".login-inner").css("display", "block");
        });
        $("#sign-mail").click(function () {
            $(".Sign-in").css("display", "block");
            $(".signup-box").css("display", "none");
        });
        $("#sign-txt").click(function () {
            $(".Sign-in").css("display", "none");
            $(".login-inner").css("display", "block");
        });
        $(document).ready(function () {
            $(".mentor-sign-up").click(function () {
                $("#login").addClass("visible-pop-up");
            });
        });
        $(document).ready(function () {
            $(".cross-pop-up").click(function () {
                $("#login").addClass("visible-transition");
                $("#login").removeClass("visible-pop-up");
                $(".login-main").removeClass("pop-up-transform");
            });
        });
        $(document).ready(function () {
            $(".mentor-sign-up").click(function () {
                $(".login-main").addClass("pop-up-transform");
            });
        });
</script>