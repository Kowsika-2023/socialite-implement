<!-- footer starts -->

<div class="foo_ter">
    <div class="d-flex flex-wrap w-95">
        <div class="col-md-3 col-12 px-3 mt-3 text-center">
            <img src="./assets/img/logo.png" alt="">
        </div>
        <div class="col-md-4 col-sm-6 col-12 px-2 mt-3">
            <div class="gen_ral">

                <h6>Get in Touch</h6>
                <div class="d-flex align-items-start mt-2">
                    <span class="material-symbols-outlined me-2 mt-0">my_location</span>
                    <div>
                        <h5>Day my wrok</h5>
                        <p> No: 04/108, Amman Koil Street, Thelliyur, Agaram, Porur, Chennai, Tamil Nadu 600026.
                        </p>
                    </div>
                </div>
                <div class="d-flex align-items-center mt-2">

                    <span class="material-symbols-outlined me-2">phone_in_talk</span></i>
                    <a href="tel:+91 81900 41444">+91 81900 41444</a>
                </div>
                <div class="pho_e d-flex align-items-center mt-2">
                    <span class="material-symbols-outlined me-2">mark_as_unread</span>
                    <a href="mailto:demo@gmail.com">demo@gmail.com</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-6 px-2 mt-3">
            <div class="li_st ">
                <h6>Quick Links</h6>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About Us</a>
                    </li>
                    <li>
                        <a href="services.php">Service</a>
                    </li>
                    <li>
                        <a href="membership.php">Membership</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 mt-3 px-2 col-6 text-center">
            <h6>Follow us</h6>
            <div class="fa_ce">
                <a href=""><i class="fa-brands fa-google "></i></a>
                <a href=""><i class="fa-brands fa-facebook-f "></i></a>
                <a href=""><i class="fa-brands fa-twitter "></i></a>
            </div>
            <p>2023 All rights Reserved
                by <a href="https://www.ninositsolution.com/"> Ninositsolution</a></p>
        </div>
    </div>
</div>

<!-- footer ends -->
<!-- float icon -->
<div class="social_icon">
    <ul>
        <li> <a class="en_quiry" href="" data-bs-toggle="modal" data-bs-target="#enquiry-popup">
                <i class="fa-solid fa-user-pen"></i>
            </a>
        </li>
        <li>
            <a class="wh_at" target="_blank" href="https://api.whatsapp.com/send?phone=+919791171024&amp;text=Day%20My%20Work ">
                <i class="fa-brands fa-whatsapp"></i></a>
        </li>
    </ul>

</div>
<!-- float icon end -->

<!-- enquiry form starts -->

<div class="modal job-form" id="enquiry-popup">
    <div class="modal-dialog mo-di">
        <div class="modal-content">
            <h4 class="modal-title mt-2 ps-3">Enquiry Now</h4>
            <div class="fot_enq">
                <button data-bs-dismiss="modal" class="clse_btn">
                    <i class="fa-solid fa-xmark "></i>
                </button>
            </div>
            <form action="" method="post">
                <div class="my-3 px-3">
                    <label for="name">Name</label>
                    <input type="name" class="form-control form-design" id="name" required placeholder="Enter Name" name="name" />
                </div>
                <div class="my-3 px-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-design" id="email" class="form-control" required placeholder="Enter Email" name="email" />
                </div>
                <div class="my-3 px-3">
                    <label for="">Phone</label>
                    <input type="number" class="form-control form-design" id="mobile" required placeholder="Enter Phone Number" name="mobile" pattern="[6-9]{1}[0-9]{9}" minlength="10" return false; />

                </div>
                <div class="my-3 px-3">
                    <label for="">Expert Name</label>
                    <input type="name" class="form-control form-design" id="name" required placeholder="Enter Expert Name" name="name" />
                </div>
                <div class="my-3 px-3">
                    <label for="message">Message</label>
                    <textarea class="form-control form-design" placeholder="type here..." required name="message" rows="4" id="message"></textarea>
                </div>
                <div class="re_ser text-center py-2">
                    <input class="btn-des" type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- enquiry form ends -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.owl_service').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },

            1000: {
                items: 3
            }
        }
    });
    $('.owl_member').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },

            1000: {
                items: 1
            }
        }
    });
</script>
<!-- owl -->
<!-- accordion -->
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>
<!-- accordion -->
<!-- search bar -->
<script>
    $(document).ready(function() {

        var $terms = [
                'search',
                'test',
                'css',
                'apple',
                'bear',
                'cat',
                'crabapple',
                'creep',
                'czar',
                'danger',
                'dominant',
                'doppler',
                'everclear',
                'evangelism',
                'frodo'
            ].sort(),
            $return = [];

        function strInArray(str, strArray) {
            for (var j = 0; j < strArray.length; j++) {
                if (strArray[j].match(str) && $return.length < 5) {
                    var $h = strArray[j].replace(str, '<strong>' + str + '</strong>');
                    $return.push('<li class="prediction-item"><span class="prediction-text">' + $h + '</span></li>');
                }
            }
        }

        function nextItem(kp) {
            if ($('.focus').length > 0) {
                var $next = $('.focus').next(),
                    $prev = $('.focus').prev();
            }

            if (kp == 38) { // Up

                if ($('.focus').is(':first-child')) {
                    $prev = $('.prediction-item:last-child');
                }

                $('.prediction-item').removeClass('focus');
                $prev.addClass('focus');

            } else if (kp == 40) { // Down

                if ($('.focus').is(':last-child')) {
                    $next = $('.prediction-item:first-child');
                }

                $('.prediction-item').removeClass('focus');
                $next.addClass('focus');
            }
        }

        $(function() {
            $('#search-bar').keydown(function(e) {
                $key = e.keyCode;
                if ($key == 38 || $key == 40) {
                    nextItem($key);
                    return;
                }

                setTimeout(function() {
                    var $search = $('#search-bar').val();
                    $return = [];

                    strInArray($search, $terms);

                    if ($search == '' || !$('input').val) {
                        $('.output').html('').slideUp();
                    } else {
                        $('.output').html($return).slideDown();
                    }

                    $('.prediction-item').on('click', function() {
                        $text = $(this).find('span').text();
                        $('.output').slideUp(function() {
                            $(this).html('');
                        });
                        $('#search-bar').val($text);
                    });

                    $('.prediction-item:first-child').addClass('focus');

                }, 50);
            });
        });

        $('#search-bar').focus(function() {
            if ($('.prediction-item').length > 0) {
                $('.output').slideDown();
            }

            $('#searchform').submit(function(e) {
                e.preventDefault();
                $text = $('.focus').find('span').text();
                $('.output').slideUp();
                $('#search-bar').val($text);
                $('input').blur();
            });
        });

        $('#search-bar').blur(function() {
            if ($('.prediction-item').length > 0) {
                $('.output').slideUp();
            }
        });

    });
</script>
<!-- search bar end -->