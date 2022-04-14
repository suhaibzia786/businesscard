<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Home | Digital Business Card</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('website/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('website/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('website/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('website/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('website/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('website/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('website/img/logo.png') }}" alt="">
                <span>Digital Business Card</span>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#features">Features</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">App Demo</a></li>
                    <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
                    <li><a class="nav-link scrollto" href="#faq">FAQs</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    <li><a class="getstarted scrollto" href="{{ route('subscription', ['package_id' => 0 ]) }}">Get
                            Started</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">We offer modern solutions for bussiness & VCard Generation</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">A full pledge managing panel for bussiness and VCard
                    </h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('subscription', ['package_id' => 0]) }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Get Started</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('website/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container" data-aos="fade-up">

                <div class="row gy-4">

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="232"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Happy Clients</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="1134"
                                    data-purecounter-duration="1" class="purecounter"></span>
                                <p>Cards</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-headset" style="color: #15be56;"></i>
                            <div>
                                <span>24/7</span>
                                <p>Customer Of Support</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="count-box">
                            <i class="bi bi-people" style="color: #bb0852;"></i>
                            <div>
                                <span data-purecounter-start="0" data-purecounter-end="7" data-purecounter-duration="1"
                                    class="purecounter"></span>
                                <p>Team</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Features</h2>
                    <p>Key features of the system</p>
                </header>

                <div class="row">

                    <div class="col-lg-6">
                        <img src="{{ asset('website/img/features.png') }}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                        <div class="row align-self-center gy-4">

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Management Tool</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Summarize Dashboards</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Company Landing Page</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>VCard Generation</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Business Card Generation</h3>
                                </div>
                            </div>

                            <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
                                <div class="feature-box d-flex align-items-center">
                                    <i class="bi bi-check"></i>
                                    <h3>Card Templating</h3>
                                </div>
                            </div>

                        </div>
                    </div>

                </div> <!-- / row -->

            </div>

        </section><!-- End Features Section -->

        {{-- <!-- ======= Portfolio Section ======= -->
        <section id="appDemo" class="portfolio">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Portfolio</h2>
                    <p>Check our latest work</p>
                </header>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">App</li>
                            <li data-filter=".filter-card">Card</li>
                            <li data-filter=".filter-web">Web</li>
                        </ul>
                    </div>
                </div>

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            <img src="{{ asset('website/img/portfolio/portfolio-1.jpg') }}" class=" img-fluid"
        alt="">
        <div class="portfolio-info">
            <h4>App 1</h4>
            <p>App</p>
            <div class="portfolio-links">
                <a href="{{ asset('website/img/portfolio/portfolio-1.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="App 1"><i
                        class="bi bi-plus"></i></a>
                <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
            </div>
        </div>
        </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-2.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-2.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-3.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App 2</h4>
                    <p>App</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-3.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="App 2"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-4.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 2</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-4.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="Card 2"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-5.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 2</h4>
                    <p>Web</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-5.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="Web 2"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-6.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>App 3</h4>
                    <p>App</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-6.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="App 3"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-7.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 1</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-7.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="Card 1"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-8.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Card 3</h4>
                    <p>Card</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-8.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="Card 3"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <div class="portfolio-wrap">
                <img src="{{ asset('website/img/portfolio/portfolio-9.jpg') }}" class=" img-fluid" alt="">
                <div class="portfolio-info">
                    <h4>Web 3</h4>
                    <p>Web</p>
                    <div class="portfolio-links">
                        <a href="{{ asset('website/img/portfolio/portfolio-9.jpg') }}" data-gallery="
                                        portfolioGallery" class="portfokio-lightbox" title="Web 3"><i
                                class="bi bi-plus"></i></a>
                        <a href="portfolio-details.html" title="More Details"><i class="bi bi-link"></i></a>
                    </div>
                </div>
            </div>
        </div>

        </div>

        </div>

        </section><!-- End Portfolio Section --> --}}

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Pricing</h2>
                    <p>Check our Pricing</p>
                </header>

                <div class="row gy-4" data-aos="fade-left">
                    @foreach($packages as $package)
                    <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            @if($package->featured)
                            <span class="featured">Featured</span>
                            @endif
                            <h3
                                style="color: {{ $package->no_of_cards==0 ? '#07d5c0' : $package->no_of_cards==10 ? '#65c600;' : $package->no_of_cards==50 ? '#ff901c;' : '#ff0071' }};">
                                {{ $package->title }}</h3>
                            <div class="price"><sup>$</sup>{{ $package->price }}<span> / {{ $package->interval }}</span>
                            </div>
                            <img src="{{ asset('website/img').'/'.$package->icon }}" class="img-fluid" alt="">
                            <ul>
                                @foreach($features as $feature)
                                @if($feature->package_id==$package->id)
                                <li class="{{ $feature->is_available ? '' : 'na' }}">{{ $feature->feature }}</li>
                                @endif
                                @endforeach
                                <li>No of Cards:
                                    <span
                                        class="text-success">{{ $package->no_of_cards == -1 ? 'unlimited' : $package->no_of_cards }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('subscription', ['package_id'=> $package->id]) }}" class="btn-buy">Buy
                                Now</a>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </section><!-- End Pricing Section -->

        <!-- ======= F.A.Q Section ======= -->
        <section id="faq" class="faq">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>F.A.Q</h2>
                    <p>Frequently Asked Questions</p>
                </header>

                <div class="row">
                    <div class="col-lg-6">
                        <!-- F.A.Q List 1-->
                        <div class="accordion accordion-flush" id="faqlist1">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-1">
                                        Question 1
                                    </button>
                                </h2>
                                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Answer 1
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-2">
                                        Question 2
                                    </button>
                                </h2>
                                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Answer 2
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq-content-3">
                                        Question 3
                                    </button>
                                </h2>
                                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                    <div class="accordion-body">
                                        Answer 3
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6">

                        <!-- F.A.Q List 2-->
                        <div class="accordion accordion-flush" id="faqlist2">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2-content-1">
                                        Question 4
                                    </button>
                                </h2>
                                <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Answer 4
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2-content-2">
                                        Question 5
                                    </button>
                                </h2>
                                <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Answer 5
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#faq2-content-3">
                                        Question 6
                                    </button>
                                </h2>
                                <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                    <div class="accordion-body">
                                        Answer 6
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section><!-- End F.A.Q Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-geo-alt"></i>
                                    <h3>Address</h3>
                                    <p>A108 Adam Street,<br>New York, NY 535022</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-telephone"></i>
                                    <h3>Call Us</h3>
                                    <p>+1 5589 55488 55<br>+1 6678 254445 41</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>info@example.com<br>contact@example.com</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bi bi-clock"></i>
                                    <h3>24/7</h3>
                                    <p>Customer Service</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="forms/contact.php" method="post" class="php-email-form">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                        required></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('website/img/logo.png') }}" alt="">
                            <span>Digital Business Card</span>
                        </a>
                        <p>Managing Tool with summarize dashboard for generating business card and vcard for the team
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('home') }}">Home</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#feature">Features</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#pricing">Pricing</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">App Demo</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#faq">FAQs</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-6 footer-links">
                        <h4>Features</h4>
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Portals</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">VCards</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Business Cards</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Team Adding</a></li>
                            <li><i class="bi bi-chevron-right"></i> <a href="#">Summarize Dashboard</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                        <h4>Contact Us</h4>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Digital Business Card</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="#">Syed Suhaib Zia</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('website/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('website/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('website/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('website/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('website/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('website/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('website/js/main.js') }}"></script>

</body>

</html>