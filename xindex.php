<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ingeredients</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

<?= file_get_contents('./components/header.html'); ?>
<!--<div data-include="page1.html"></div>-->
<div class="main">
    <?= file_get_contents('./components/page1.html'); ?>
    <?= file_get_contents('./components/page2.html'); ?>
    <?= file_get_contents('./components/page3.html'); ?>
    <?= file_get_contents('./components/page4.html'); ?>
    <?= file_get_contents('./components/page5.html'); ?>
    <?= file_get_contents('./components/page6.html'); ?>
    <?= file_get_contents('./components/page7.html'); ?>
</div>

<span class="scroll-btn">
        <a href="#scroll_down" class="scroll_to">
            <span class="mouse gray"><span></span></span>
        </a>
    </span>

<?= file_get_contents('./components/footer.html'); ?>
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
<script src="./js/jquery.onepage-scroll.min.js"></script>
<link href='./css/onepage-scroll.css' rel='stylesheet' type='text/css'>
<script src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>

<script>

    $(document).ready(function(){

        $(".main").onepage_scroll({
            sectionContainer: "section", // sectionContainer accepts any kind of selector in case you don't want to use section
            easing: "ease", // Easing options accepts the CSS3 easing animation such "ease", "linear", "ease-in", "ease-out", "ease-in-out", or even cubic bezier value such as "cubic-bezier(0.175, 0.885, 0.420, 1.310)"
            animationTime: 500, // AnimationTime let you define how long each section takes to animate
            pagination: true, // You can either show or hide the pagination. Toggle true for show, false for hide.
            updateURL: false, // Toggle this true if you want the URL to be updated automatically when the user scroll to each page.
            keyboard: true,
            loop: false,
            beforeMove: function(index) {

//                        $('[data-animate]').removeClass('animate');
                $('[data-animate]').each(function () {
                    var $class = $(this).data('animate');
                    if ( $class ) $(this).removeClass($class);
                    $(this).removeClass('animate');
                });
//                        $('.section-' + index).find('[data-animate]').addClass('animate');
                $('.section-' + index).find('[data-animate]').each(function () {
                    var $delay = $(this).data('delay');
                    var $class = $(this).data('animate');
                    var t = this;

                    if ($delay) {
                        setTimeout(function () {
                            $(t).addClass('animate');
                        }, $delay * 1000);
                    } else {
//                                if ( $class ) $(this).addClass($class);
                        $(this).addClass('animate');
                    }
                    if ( $class ) {
                        var $classDelay = $(this).data($class + '-delay');
                        if ($classDelay) {
                            setTimeout(function () {
                                $(t).addClass($class);
                            }, $classDelay * 1000);
                        } else {
                            $(this).addClass($class);
                        }
                    }
                });
                console.log(index)
            },
        });

        $('.header-links a').click(function () {
            $('.main').moveTo($(this).data('section'));
            return false;
        })

        $('.portfolio-categories li a').click(function () {
            $('.portfolio-categories li').removeClass('active');
            $(this).parent().addClass('active');
            return false;
        })

        $(".owl-carousel").owlCarousel({
            responsive : {
                0:{
                    items:2,
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:5,
                    loop:false
                }
            }
        });

    });

</script>

</body>
</html>