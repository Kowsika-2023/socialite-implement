<!-- footer starts -->
<?php  
        $service_members = App\Models\ServiceMember::where('status',1)->get(); 
     
        ?>
<div class="foo_ter">
    <div class="d-flex flex-wrap w-95">
        <div class="col-md-3 col-12 px-3 mt-3 text-center">
            <img src="{{asset('assets/img/logo.png')}}" alt="your image">
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
                        <a href="{{route('frontendviews.index')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('frontendviews.about')}}">About Us</a>
                    </li>
                    <li>
                        <a href="{{route('frontendviews.services')}}">Service</a>
                    </li>
                    <li>
                        <a href="{{route('frontendviews.membership')}}">Membership</a>
                    </li>
                    <li>
                        <a href="{{route('frontendviews.contact')}}">Contact</a>
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


<!-- Normal Enquiry -->
<div class="modal job-form" id="enquiry-popup">
    <div class="modal-dialog mo-di">
        <div class="modal-content">
            <h4 class="modal-title mt-2 ps-3">Enquiry Now</h4>
            <div class="fot_enq">
                <button data-bs-dismiss="modal" class="clse_btn">
                    <i class="fa-solid fa-xmark "></i>
                </button>
            </div>
            <form action="{{route('frontendviews.mail.id')}}" id="loaderfrm" method="post">
                @csrf
                @method('POST')

                <div class="my-3 px-3">
                    <label for="name">Name</label>
                    <input type="name" class="form-control form-design @error('name') is-invalid @enderror" id="name"  required placeholder="Enter Name" name="name" />
                </div>
                    @error('name')
                    <span class="alert alert-danger">{{ $message }}</span>
                    @enderror

                <div class="my-3 px-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control form-design  @error('email') is-invalid @enderror" id="email" class="form-control" required placeholder="Enter Email" name="email" />
                </div>
                @error('email')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                <div class="my-3 px-3">
                    <label for="number">Phone</label>
                    <input type="text" class="form-control form-design  @error('mobile') is-invalid @enderror" maxlength="10" pattern="[6789][0-9]{9}" id="mobile" required placeholder="Enter Phone Number" name="mobile"  />

                </div>
                @error('mobile')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                <div class="my-3 px-3">
                    <label for="subject">Subject</label>
                    <input type="subject" class="form-control form-design  @error('subject') is-invalid @enderror" id="subject" required placeholder="Enter subject" name="subject" />
                </div>
                @error('subject')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

                <div class="my-3 px-3">
                    <label for="message">Message</label>
                    <textarea class="form-control form-design  @error('message') is-invalid @enderror" placeholder="type here..." required name="message" rows="4" id="message"></textarea>
                </div>
                @error('message')
                    <span class="alert alert-danger">{{ $message }}</span>
                @enderror

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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div id="myDIV" style="display: none;">
    <p></p>
</div>
<!-- contact form ends -->

<style type="text/css">
    #myDIV {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
        background: #0000004d url('/assets/img/loader.gif') no-repeat center center;
        z-index: 10000;
    }
</style>

<!-- loader for normal enquiry -->
<div id="footerLoad" style="display: none;
                                position: fixed;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                width: 100%;
                                background: rgba(0,0,0,0.75) url('assets/img/loader.gif') no-repeat center center;z-index: 10000;">
</div>



<script>
    let waitspinner = $('#footerLoad');
    jQuery('#loaderfrm').submit(function(e) {
        e.stopPropagation()
        waitspinner.show();
    });
    @if(session('status'))
    Swal.fire({
        position: 'center',
        imageUrl: "{{ asset('assets/icon/mail.gif') }}",
        icon: '{{ session('
        type ')}}',
        title: "Enquiry submitted successfully ",
        showConfirmButton: false,
        timer: 1500
    });
    waitspinner.hide();
    @endif

    let waitspinner1 = $('#footerLoad');
    jQuery('#loadermail').submit(function(e) {
        e.stopPropagation()
        waitspinner1.show();
    });
    @if(session('status'))
    Swal.fire({
        position: 'center',
        imageUrl: "{{ asset('assets/icon/mail.gif') }}",
        icon: '{{ session('
        type ')}}',
        title: "Enquiry submitted successfully ",
        showConfirmButton: false,
        timer: 1500
    });
    waitspinner1.hide();
    @endif

</script>
<script>
function myFunction1() {
        console.log("images1");
       
        var x = document.getElementById("myDIV");
        console.log("images2");
        var af = document.getElementById("name1").value;
        console.log(af);
        var bf = document.getElementById("email1").value;
        var cf = document.getElementById("mobile1").value;
        var df = document.getElementById("subject1").value;
        var ef = document.getElementById("expert_name1").value;
        var ff = document.getElementById("message1").value;


        console.log(af);
        console.log("images123");
        console.log("hided", af, bf, cf, df, ff);

        if(af){
            console.log("jjj");
        }
        
        if (af && bf && cf && df && ef && ff) {
            console.log("hidesfsdf");
            if (x.style.display == "none") {
                console.log("hide");
                x.style.display = "block";
            } else {
                console.log("show");
                x.style.display = "none";
            }
        }
    }
    </script>

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




</body>
</html>