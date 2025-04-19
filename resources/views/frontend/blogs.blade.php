@extends('frontend.layouts.master')
@section('title', 'Services')
@push('custom_css')

@endpush
<body>

    <header>
        <div class="container emp-header-top">
         <div class="row emp-header-top-row">
            <div class="col-md-5 logo-col">
               <img src="{{asset('front')}}/assets/images/logo.png" alt="">
            </div>
            <div class="col-md-7">
               <div class="row">
                  <div class="col-md-3 h-icon-col">
                     <div class="h-icon">
                        <span><i class="fa-solid fa-phone-volume"></i></span>
                     </div>
                     <div class="h-icon-d">
                        <p class="h-icon-title">Call Us On</p>
                        <p class="text-light"> <a href="tel:0466824777">0466 824 777</a> </p>
                     </div>
                  </div>
                  <div class="col-md-6 h-icon-col">
                     <div class="h-icon">
                        <span><i class="fa-solid fa-envelope"></i></span>
                     </div>
                     <div class="h-icon-d">
                        <p class="h-icon-title" >Email</p>
                        <p class="text-light"> <a href="mailto:info@empowermenopause.com.au">info@empowermenopause.com.au</a> </p>
                     </div>
                  </div>
                  <div class="col-md-3 contact-btn">
                     <a class="dark-btn" href="#">Chat Now</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid emp-menu">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <nav class="navbar navbar-expand-xl navbar-light">
                     <div class="">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <ul class="navbar-nav">
                              <!-- <li class="nav-item service-drop">
                                 <a class="nav-link" href="#">Home</a>
                                 <ul class="menu-drop" >
                                    <li><a href="">123</a></li>
                                    <li><a href="">123</a></li>
                              </ul>
                              </li> -->
                              <li class="nav-item">
                                 <a class="nav-link " href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="services.html">Services</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="products.html">Products</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link active" href="blog.html">Blog</a>
                              </li>
                              <li class="nav-item">
                              <a class="nav-link" href="faqs.html">FAQS</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact-us.html">Contact Us</a>
                                 </li>
                           </ul>
                        </div>
                     </div>
                     </nav>
               </div>
               <div class="col-md-3 search-col">
                     <div class="search-container">
                       <form class="banner-search" action="">
                         <button type="submit"><i class="fa fa-search"></i></button>
                         <input type="text" placeholder="Search something here!" name="search">
                       </form>
                     </div>
                 
               </div>
               <div class="col-md-1 emp-social">
                  <a href="https://www.instagram.com/accounts/login/?next=%2Fmelissahowcroft1%2F&source=omni_redirect" ><div><span><i class="fa-brands fa-square-instagram"></i></span></div></a> 
                  <a href="https://www.facebook.com/profile.php?id=61575039335593" >
                  <div><span><i class="fa-brands fa-facebook-f"></i></span> </div></a>
                    <a href="https://www.linkedin.com/authwall?trk=bf&trkInfo=AQEwjzG5ponOQwAAAZY2FgFwbWjDk8D17dgjtfANjw9lawtWztVfeCmc3zwWzk-88OOUg0z9or8ahNOCDVjiT-5bnr2iyh6JuOInP-qSI7Uk1F4_ndBDB-wwtx5wgsI0QJkGCKg=&original_referer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F106848055%2Fadmin%2Fdashboard%2F" >
                  <div><span><i class="fa-brands fa-linkedin"></i></span> </div></a>
               </div>
            </div>
         </div>

      </div>
    </header>

    <section class="hero-sec" >
      <div class="container">
         <div class="row">
            <div class="col-md-6 banner-col-right" data-aos="fade-right"
            data-aos-offset="300"
            data-aos-easing="ease-in-sine">
            <h3>
               Welcome to EMA
                <!-- <a href="" class="typewrite" data-period="2000" data-type='[ "Welcome to EMA", "Welcome to EMA", "Welcome to EMA", "Welcome to EMA" ]'>
                  <span class="wrap"></span>
                </a><span> </span> -->
              </h3>
               <h1>"Blog"
               </h1>
               <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</p>
               </p>
               <div class="banner-bnt">
                  <div> <a class="dark-btn" href="{{route('book.consultation')}}">Book a Consultation</a> </div>
                  <div> <a class="light-btn" href="">Learn More</a> </div>
               </div>

            </div>
            <div class="col-md-6 banner-col-left" data-aos="fade-up"
            data-aos-duration="3000">
               <img src="{{asset('front')}}/assets/images/home-banner-img.png" alt="">
            </div>
         </div>
      </div>
    </section>

    <section class="blog-sec" >
      <div class="container">
         <div class="row blog-title-row">
            <h1 class="text-center" >Our Blog</h1>
            <p class="text-center" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
         </div>

         <div class="my-blog-main">
            <div class="row">
                
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="blog-con aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
                        <div class="blog-img">
                            <img src="{{asset('front')}}/assets/images/blog-img-1.jpg" alt="">
                        </div>
                        <div class="blog-content">
                            <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                            <a href="#" class="blog-btn">Read More</a>
                        </div>
                        <div class="blog-date-con">
                            <span>19</span>
                            <span>Dec</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                  <div class="blog-con aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
                      <div class="blog-img">
                          <img src="{{asset('front')}}/assets/images/blog-img-2.jpg" alt="">
                      </div>
                      <div class="blog-content">
                          <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
                          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                          <a href="#" class="blog-btn">Read More</a>
                      </div>
                      <div class="blog-date-con">
                          <span>20</span>
                          <span>Dec</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12 col-12">
               <div class="blog-con aos-init aos-animate" data-aos="fade-up" data-aos-duration="1500">
                   <div class="blog-img">
                       <img src="{{asset('front')}}/assets/images/blog-img-3.png" alt="">
                   </div>
                   <div class="blog-content">
                       <h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h4>
                       <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                       <a href="#" class="blog-btn">Read More</a>
                   </div>
                   <div class="blog-date-con">
                       <span>21</span>
                       <span>Dec</span>
                   </div>
               </div>
           </div>
        

        
                
        
            </div>
            </div>


      </div>
    </section>

    <footer class="footer-sec">
      <div class="container">
         <div class="row">
            <div class="col-md-4">
               <img src="{{asset('front')}}/assets/images/footer-logo.webp" alt="">
               <p class="text-white mt-3">Lorem Ipsum is simply dummy text of the printing and Ipsum is simply dummy text of the printing and . Lorem typesetting industry. Lorem Ipsum has been the.</p>
               <!-- <form action="" class="newsletter">
                  <input type="text" placeholder="Enter your email">
                  <button type="submit">Send</button>
               </form> -->
            </div>
            <div class="col-md-3">
               <div class="footer-list  left-padding">
                  <h4 class="footer-heading">Quick Links</h4>
                  <ul>
                     <li><a class="nav-link" href="index.html">Home</a></li>
                     <li><a class="nav-link" href="about.html">About</a></li>
                     <li><a class="nav-link" href="services.html">Services</a></li>
                     <li><a class="nav-link" href="products.html">Products</a></li>
                     <li><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-5">
               <div class="footer-list">
                  <h4 class="footer-heading">Contact Us</h4>
                  <ul class="icon-flex">
                     <li>
                        <i class="fa-solid fa-phone-volume"></i>
                     </li>
                     <li>
                        <p>Call Us On</p>
                        <a href="#">0466 824 777</a></li>
                  </ul>
                  <ul class="icon-flex">
                     <li>
                        <i class="fa-solid fa-envelope"></i>
                     </li>
                     <li>
                        <p>Email</p>
                        <a href="mailto:info@empowermenopause.com.au">info@empowermenopause.com.au</a></li>
                  </ul>
                  <form action="" class="newsletter">
                     <input type="text" placeholder="Enter your email">
                     <button type="submit">Send</button>
                  </form>
               </div>
            </div>
            <div class="col-12 copyright">
               <p class="text-white text-center">Copyright © 2025 All right reserved.</p>
            </div>
         </div>
      </div>
   </footer>


    <script src="{{asset('front')}}/assets/bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
    <script src="{{asset('front')}}/assets/bootstrap/js/dropdown.js" > </script>

    <!-- owlcarousel -->
    <script src="{{asset('front')}}/assets/OwlCarousel/jquery.min.js"></script>
    <script src="{{asset('front')}}/assets/OwlCarousel/owl.carousel.min.js"></script>
    <script src="{{asset('front')}}/assets/js/custom.js"></script>

    <script src="{{asset('front')}}/assets/js/jquery.lazyload.min.js" ></script>
    <script src="{{asset('front')}}/assets/js/jquery.fancybox.min.js" ></script>
    <script src="{{asset('front')}}/assets/js/script.js"></script>

    <!-- animation aos js -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:2
        },
        1000:{
            items:2
        }
    }
})
    </script>


</body>
</html>