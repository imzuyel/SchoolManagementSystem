@extends('frontend.layouts')

@section('content')
  <main>
    <!--=====================================================-->
    <!--=================== Home section ====================-->
    <!--=====================================================-->
    <section class="home"
      id="home">

      <div class="deco-shape shape-1">
        <img src="{{ asset('/') }}frontend/assets/images/shape-1.png"
          alt="art shape"
          width="70">
      </div>
      <div class="deco-shape shape-2">
        <img src="{{ asset('/') }}frontend/assets/images/shape-2.png"
          alt="art shape"
          width="55">
      </div>
      <div class="deco-shape shape-3">
        <img src="{{ asset('/') }}frontend/assets/images/shape-3.png"
          alt="art shape"
          width="120">
      </div>
      <div class="deco-shape shape-4">
        <img src="{{ asset('/') }}frontend/assets/images/shape-4.png"
          alt="art shape"
          width="30">
      </div>

      <div class="home-left">

        <p class="section-subtitle">Welcome To Online Coaching</p>

        <h1 class="main-heading">
          Get Class From Top
          <span class="underline-img">Instructor <img src="{{ asset('/') }}frontend/assets/images/banner-line.png"
              alt="line"></span>
        </h1>

        <p class="section-text">
          Integer in magna in est ultrices bibendum eget enim et dui imperdiet faucibus. Fusce eu tristique felis.
        </p>

        <div class="home-btn-group">
          <button class="btn btn-primary">
            <p class="btn-text">Explore Courses</p>
            <span class="square"></span>
          </button>

          <button class="btn btn-secondary">
            <p class="btn-text">Contact Us</p>
            <span class="square"></span>
          </button>
        </div>

      </div>

      <div class="home-right">

        <div class="img-box">

          <img src="{{ asset('/') }}frontend/assets/images/banner-img-bg.png"
            alt="colorful background shape"
            class="background-shape">
          <img src="{{ asset('/') }}frontend/assets/images/banner-img.png"
            alt="banner image"
            class="banner-img">

          <img src="{{ asset('/') }}frontend/assets/images/banner-aliment-icon-1.png"
            alt=""
            class="icon-1 smooth-zigzag-anim-1"
            width="250">
          <img src="{{ asset('/') }}frontend/assets/images/banner-aliment-icon-2.png"
            alt=""
            class="icon-2 smooth-zigzag-anim-2"
            width="240">
          <img src="{{ asset('/') }}frontend/assets/images/banner-aliment-icon-3.png"
            alt=""
            class="icon-3 smooth-zigzag-anim-3"
            width="195">
          <img src="{{ asset('/') }}frontend/assets/images/banner-aliment-icon-4.png"
            alt=""
            class="icon-4 drop-anim">

        </div>

      </div>

    </section>
    <!--=====================================================-->
    <!--================= Home section end ==================-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--============= Courses category section ==============-->
    <!--=====================================================-->
    <section class="category">
      <p class="section-subtitle">Course Category</p>
      <h2 class="section-title">Explore Popular Courses</h2>
      <ul class="course-item-group">
        <!------- Single item ------->
        <li class="course-category-item">
          <div class="wrapper">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-1.png"
              alt="category icon"
              class="category-icon default">

            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-1-w.png"
              alt="category icon white"
              class="category-icon hover">
          </div>

          <div class="course-category-content">
            <h3 class="category-title">
              <a href="#">Learn Data Science</a>
            </h3>
            <p class="category-subtitle">Data is Everything</p>
          </div>

        </li>
        <!------- Single item ------->
        <li class="course-category-item">
          <div class="wrapper">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-2.png"
              alt="category icon"
              class="category-icon default">

            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-2-w.png"
              alt="category icon white"
              class="category-icon hover">
          </div>
          <div class="course-category-content">
            <h3 class="category-title">
              <a href="#">Business Strategy</a>
            </h3>

            <p class="category-subtitle">Improve your business</p>
          </div>

        </li>
        <!------- Single item ------->
        <li class="course-category-item">
          <div class="wrapper">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-3.png"
              alt="category icon"
              class="category-icon default">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-3-w.png"
              alt="category icon white"
              class="category-icon hover">
          </div>
          <div class="course-category-content">
            <h3 class="category-title">
              <a href="#">Learn Art & Design</a>
            </h3>

            <p class="category-subtitle">Fun & Challenging</p>
          </div>

        </li>
        <!------- Single item ------->
        <li class="course-category-item">
          <div class="wrapper">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-4.png"
              alt="category icon"
              class="category-icon default">

            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-4-w.png"
              alt="category icon white"
              class="category-icon hover">
          </div>

          <div class="course-category-content">
            <h3 class="category-title">
              <a href="#">Learn Lifestyle</a>
            </h3>

            <p class="category-subtitle">New Skills, New You</p>
          </div>

        </li>
        <!------- Single item ------->
        <li class="course-category-item">
          <div class="wrapper">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-5.png"
              alt="category icon"
              class="category-icon default">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-5-w.png"
              alt="category icon white"
              class="category-icon hover">
          </div>
          <div class="course-category-content">
            <h3 class="category-title">
              <a href="#">Learn Marketing</a>
            </h3>

            <p class="category-subtitle">Improve your business</p>
          </div>

        </li>
        <!------- Single item ------->
        <li class="course-category-item">
          <div class="wrapper">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-6.png"
              alt="category icon"
              class="category-icon default">
            <img src="{{ asset('/') }}frontend/assets/images/course-category-icon-6-w.png"
              alt="category icon white"
              class="category-icon hover">
          </div>
          <div class="course-category-content">
            <h3 class="category-title">
              <a href="#">Learn Finance</a>
            </h3>
            <p class="category-subtitle">Fun & Challenging</p>
          </div>
        </li>
      </ul>
    </section>
    <!--=====================================================-->
    <!--=========== Courses category section end ============-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--=================== About section ===================-->
    <!--=====================================================-->
    <section class="about"
      id="about">
      <div class="about-left">
        <div class="img-box">
          <img src="{{ asset('/') }}frontend/assets/images/about-img-bg.png"
            alt="about bg"
            class="about-bg">
          <img src="{{ asset('/') }}frontend/assets/images/about-img.png"
            alt="about person"
            class="about-img">
          <img src="{{ asset('/') }}frontend/assets/images/banner-aliment-icon-1.png"
            alt=""
            class="icon-1 smooth-zigzag-anim-1"
            width="250">
          <img src="{{ asset('/') }}frontend/assets/images/banner-aliment-icon-3.png"
            alt=""
            class="icon-2 smooth-zigzag-anim-3"
            width="195">
        </div>
      </div>
      <div class="about-right">
        <p class="section-subtitle">About Us</p>
        <h2 class="section-title">We Have Best Online Education</h2>
        <p class="section-text">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia eveniet nam a excepturi labore dicta
          aliquam, inventore ratione rem voluptatum praesentium consequuntur aperiam quae corrupti maiores facilis.
          Consectetur.
        </p>

        <ul class="about-ul">
          <li>
            <ion-icon name="checkmark-circle"></ion-icon>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia.</p>
          </li>
          <li>
            <ion-icon name="checkmark-circle"></ion-icon>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia.</p>
          </li>
          <li>
            <ion-icon name="checkmark-circle"></ion-icon>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
          </li>
        </ul>
        <button class="btn btn-primary">
          <p class="btn-text">Explore More</p>
          <span class="square"></span>
        </button>
      </div>
    </section>
    <!--=====================================================-->
    <!--================= About section end =================-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--================== Courses section ==================-->
    <!--=====================================================-->
    <section class="course"
      id="course">
      <p class="section-subtitle">Our Online Courses</p>
      <h2 class="section-title">Find The Right Online Course For You</h2>
      <div class="course-grid">
        <!------- Single item ------->
        <div class="course-card">
          <div class="course-banner">
            <img src="{{ asset('/') }}frontend/assets/images/course-1.jpg"
              alt="course banner">

            <div class="course-tag-box">
              <a href="#"
                class="badge-tag orange">Business</a>
              <a href="#"
                class="badge-tag blue">Marketing</a>
            </div>
          </div>

          <div class="course-content">

            <h3 class="card-title">
              <a href="#">Become product manager learn skills.</a>
            </h3>

            <div class="wrapper border-bottom">

              <div class="author">
                <img src="{{ asset('/') }}frontend/assets/images/course-instructor-img.jpg"
                  alt="course instructor image"
                  class="author-img">

                <a href="#"
                  class="author-name">Lillian Wals</a>
              </div>

              <div class="rating">
                <ion-icon name="star"></ion-icon>
                <p>5.0 (2k)</p>
              </div>

            </div>

            <div class="wrapper">
              <div class="course-price">$50.00</div>

              <div class="enrolled">
                <div class="icon-user">
                  <img src="{{ asset('/') }}frontend/assets/images/student-icon.png"
                    alt="user icon">
                </div>

                <p>600k</p>
              </div>
            </div>

          </div>

        </div>
        <!------- Single item ------->
        <div class="course-card">
          <div class="course-banner">
            <img src="{{ asset('/') }}frontend/assets/images/course-2.jpg"
              alt="course banner">
            <div class="course-tag-box">
              <a href="#"
                class="badge-tag orange">Business</a>
              <a href="#"
                class="badge-tag blue">Marketing</a>
            </div>
          </div>

          <div class="course-content">

            <h3 class="card-title">
              <a href="#">Fashion and luxury fashion in a changing.</a>
            </h3>

            <div class="wrapper border-bottom">

              <div class="author">
                <img src="{{ asset('/') }}frontend/assets/images/course-instructor-img.jpg"
                  alt="course instructor image"
                  class="author-img">

                <a href="#"
                  class="author-name">Lillian Wals</a>
              </div>

              <div class="rating">
                <ion-icon name="star"></ion-icon>
                <p>4.7 (5k)</p>
              </div>

            </div>

            <div class="wrapper">
              <div class="course-price">$80.00</div>

              <div class="enrolled">
                <div class="icon-user">
                  <img src="{{ asset('/') }}frontend/assets/images/student-icon.png"
                    alt="user icon">
                </div>

                <p>545k</p>
              </div>
            </div>

          </div>

        </div>
        <!------- Single item ------->
        <div class="course-card">
          <div class="course-banner">
            <img src="{{ asset('/') }}frontend/assets/images/course-3.jpg"
              alt="course banner">
            <div class="course-tag-box">
              <a href="#"
                class="badge-tag orange">Business</a>
              <a href="#"
                class="badge-tag blue">Marketing</a>
            </div>
          </div>
          <!------- Single item ------->
          <div class="course-content">
            <h3 class="card-title">
              <a href="#">Learning to write as a professional.</a>
            </h3>
            <div class="wrapper border-bottom">
              <div class="author">
                <img src="{{ asset('/') }}frontend/assets/images/course-instructor-img.jpg"
                  alt="course instructor image"
                  class="author-img">
                <a href="#"
                  class="author-name">Zuyel Rana</a>
              </div>
              <div class="rating">
                <ion-icon name="star"></ion-icon>
                <p>6.1 (3k)</p>
              </div>
            </div>
            <div class="wrapper">
              <div class="course-price">$9.90</div>
              <div class="enrolled">
                <div class="icon-user">
                  <img src="{{ asset('/') }}frontend/assets/images/student-icon.png"
                    alt="user icon">
                </div>
                <p>37k</p>
              </div>
            </div>
          </div>
        </div>

        <!------- Single item ------->
        <div class="course-card">
          <div class="course-banner">
            <img src="{{ asset('/') }}frontend/assets/images/course-4.jpg"
              alt="course banner">
            <div class="course-tag-box">
              <a href="#"
                class="badge-tag orange">Business</a>
              <a href="#"
                class="badge-tag blue">Marketing</a>
            </div>
          </div>
          <div class="course-content">
            <h3 class="card-title">
              <a href="#">Improving accessibility of Your markdown.</a>
            </h3>
            <div class="wrapper border-bottom">
              <div class="author">
                <img src="{{ asset('/') }}frontend/assets/images/course-instructor-img.jpg"
                  alt="course instructor image"
                  class="author-img">
                <a href="#"
                  class="author-name">Mahi Hasan</a>
              </div>
              <div class="rating">
                <ion-icon name="star"></ion-icon>
                <p>5.00 (3.9k)</p>
              </div>
            </div>
            <div class="wrapper">
              <div class="course-price">$49.90</div>
              <div class="enrolled">
                <div class="icon-user">
                  <img src="{{ asset('/') }}frontend/assets/images/student-icon.png"
                    alt="user icon">
                </div>
                <p>891k</p>
              </div>
            </div>
          </div>
        </div>

        <!------- Single item ------->
        <div class="course-card">
          <div class="course-banner">
            <img src="{{ asset('/') }}frontend/assets/images/course-5.jpg"
              alt="course banner">
            <div class="course-tag-box">
              <a href="#"
                class="badge-tag orange">Business</a>
              <a href="#"
                class="badge-tag blue">Laravel</a>
            </div>
          </div>
          <div class="course-content">
            <h3 class="card-title">
              <a href="#">Master query in a short period of time.</a>
            </h3>
            <div class="wrapper border-bottom">
              <div class="author">
                <img src="{{ asset('/') }}frontend/assets/images/course-instructor-img.jpg"
                  alt="course instructor image"
                  class="author-img">
                <a href="#"
                  class="author-name">Lillian Wals</a>
              </div>
              <div class="rating">
                <ion-icon name="star"></ion-icon>
                <p>4.8 (1k)</p>
              </div>
            </div>
            <div class="wrapper">
              <div class="course-price">$78.00</div>
              <div class="enrolled">
                <div class="icon-user">
                  <img src="{{ asset('/') }}frontend/assets/images/student-icon.png"
                    alt="user icon">
                </div>
                <p>204k</p>
              </div>
            </div>
          </div>
        </div>
        <!------- Single item ------->
        <div class="course-card">
          <div class="course-banner">
            <img src="{{ asset('/') }}frontend/assets/images/course-6.jpg"
              alt="course banner">
            <div class="course-tag-box">
              <a href="#"
                class="badge-tag orange">Business</a>
              <a href="#"
                class="badge-tag blue">Marketing</a>
            </div>
          </div>
          <div class="course-content">
            <h3 class="card-title">
              <a href="#">Business Intelligence analyst Course 2022.</a>
            </h3>
            <div class="wrapper border-bottom">
              <div class="author">
                <img src="{{ asset('/') }}frontend/assets/images/course-instructor-img.jpg"
                  alt="course instructor image"
                  class="author-img">
                <a href="#"
                  class="author-name">Lillian Wals</a>
              </div>
              <div class="rating">
                <ion-icon name="star"></ion-icon>
                <p>4.9 (23k)</p>
              </div>
            </div>
            <div class="wrapper">
              <div class="course-price">$199.00</div>
              <div class="enrolled">
                <div class="icon-user">
                  <img src="{{ asset('/') }}frontend/assets/images/student-icon.png"
                    alt="user icon">
                </div>
                <p>1.3M</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="btn btn-primary">
        <p class="btn-text">View All Course</p>
        <span class="square"></span>
      </button>

    </section>
    <!--=====================================================-->
    <!--================ Courses section end ================-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--=================== Event section ===================-->
    <!--=====================================================-->
    <section class="event">
      <div class="event-left">
        <div class="event-banner">
          <img src="{{ asset('/') }}frontend/assets/images/event-img.jpg"
            alt="event banner"
            class="banner-img">
        </div>
        <button class="play smooth-zigzag-anim-1">
          <div class="play-icon pulse-anim">
            <ion-icon name="play-circle"></ion-icon>
          </div>
          <p>Watch Us !</p>
        </button>
      </div>
      <div class="event-right">
        <p class="section-subtitle">Our Events</p>
        <h2 class="section-title">Join Our Upcoming Events</h2>
        <div class="event-card-group">
          <!------- Single item ------->
          <div class="event-card">
            <div class="content-left">
              <p class="day">8</p>
              <p class="month">Nov, 2022</p>
            </div>
            <div class="content-right">
              <div class="schedule">
                <p class="time">11:30am To 7:30pm</p>
                <p class="place">Dhaka</p>
              </div>
              <a href="#"
                class="event-name">Business creativity workshops</a>
            </div>
          </div>
          <!------- Single item ------->
          <div class="event-card">
            <div class="content-left">
              <p class="day">15</p>
              <p class="month">Dec, 2022</p>
            </div>
            <div class="content-right">
              <div class="schedule">
                <p class="time">10:30am To 2:30pm</p>
                <p class="place">Thakurgaon</p>
              </div>
              <a href="#"
                class="event-name">Street Performance: Call for Art.</a>
            </div>
          </div>
          <!------- Single item ------->
          <div class="event-card">
            <div class="content-left">
              <p class="day">20</p>
              <p class="month">Dec, 2022</p>
            </div>
            <div class="content-right">
              <div class="schedule">
                <p class="time">10:30am To 2:30pm</p>
                <p class="place">Rangpur</p>
              </div>
              <a href="#"
                class="event-name">Digital transformation conference</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=====================================================-->
    <!--================= Event section end =================-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--================= Features section ==================-->
    <!--=====================================================-->
    <section class="features">
      <div class="features-left">
        <p class="section-subtitle">Our Features</p>
        <h2 class="section-title">See What Our Mission Are</h2>
        <ul>
          <li class="features-item">
            <div class="item-icon-box blue">
              <img src="{{ asset('/') }}frontend/assets/images/feature-icon-1.png"
                alt="feature icon">
            </div>
            <div class="wrapper">
              <h3 class="item-title">Student Life</h3>
              <p class="item-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde quaerat libero
                quam.
                Facere excepturi dolorem aspernatur?</p>

            </div>
          </li>
          <!------- Single item ------->
          <li class="features-item">
            <div class="item-icon-box pink">
              <img src="{{ asset('/') }}frontend/assets/images/feature-icon-2.png"
                alt="feature icon">
            </div>
            <div class="wrapper">
              <h3 class="item-title">Best Online Class</h3>
              <p class="item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum necessitatibus omnis
                molestiae magni aliquam consequuntur?</p>
            </div>
          </li>
          <!------- Single item ------->
          <li class="features-item">
            <div class="item-icon-box purple">
              <img src="{{ asset('/') }}frontend/assets/images/feature-icon-3.png"
                alt="feature icon">
            </div>
            <div class="wrapper">
              <h3 class="item-title">24x7 Program</h3>
              <p class="item-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque magni sunt
                blanditiis beatae qui?</p>
            </div>
          </li>
        </ul>
      </div>
      <div class="features-right">
        <img src="{{ asset('/') }}frontend/assets/images/coure-features-img.jpg"
          alt="core features image">
      </div>
    </section>
    <!--=====================================================-->
    <!--=============== Features section end ================-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--================ Instructor section =================-->
    <!--=====================================================-->
    <section class="instructor">
      <p class="section-subtitle">Best Coach</p>
      <h2 class="section-title">Our Expert Instructor</h2>
      <div class="instructor-grid">
        <!------- Single item ------->
        <div class="instructor-card">
          <div class="instructor-img-box">
            <img src="{{ asset('/') }}frontend/assets/images/instructor-1.jpg"
              alt="instructor Masum Rana">
            <div class="social-link">
              <a href="#"
                class="facebook">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <a href="#"
                class="instagram">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <a href="#"
                class="twitter">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </div>
          </div>
          <h4 class="instructor-name">Masum Rana</h4>
          <p class="instructor-title">Instructor</p>
        </div>
        <!------- Single item ------->
        <div class="instructor-card">
          <div class="instructor-img-box">
            <img src="{{ asset('/') }}frontend/assets/images/instructor-2.jpg"
              alt="instructor Habib Rana">
            <div class="social-link">
              <a href="#"
                class="facebook">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <a href="#"
                class="instagram">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <a href="#"
                class="twitter">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </div>
          </div>
          <h4 class="instructor-name">Habib Rana</h4>
          <p class="instructor-title">Instructor</p>
        </div>
        <!------- Single item ------->
        <div class="instructor-card">
          <div class="instructor-img-box">
            <img src="{{ asset('/') }}frontend/assets/images/instructor-3.jpg"
              alt="instructor fiona dean">
            <div class="social-link">
              <a href="#"
                class="facebook">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <a href="#"
                class="instagram">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <a href="#"
                class="twitter">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </div>
          </div>
          <h4 class="instructor-name">Fiona Dean</h4>
          <p class="instructor-title">Instructor</p>
        </div>
        <!------- Single item ------->
        <div class="instructor-card">
          <div class="instructor-img-box">
            <img src="{{ asset('/') }}frontend/assets/images/instructor-4.jpg"
              alt="instructor Zuyel Rana">
            <div class="social-link">
              <a href="#"
                class="facebook">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
              <a href="#"
                class="instagram">
                <ion-icon name="logo-instagram"></ion-icon>
              </a>
              <a href="#"
                class="twitter">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </div>
          </div>
          <h4 class="instructor-name">Zuyel Rana</h4>
          <p class="instructor-title">Instructor</p>
        </div>
      </div>
    </section>
    <!--=====================================================-->
    <!--============== Instructor section end ===============-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--================ Testimonial section ================-->
    <!--=====================================================-->
    <section class="testimonials">
      <div class="testimonials-left">
        <p class="section-subtitle">Testimonial</p>
        <h2 class="section-title">What Our Client Says About Us</h2>
        <p class="section-text">
          Proin et lacus eu odio tempor porttitor id vel augue. Vivamus volutpat vehicula sem, et imperdiet enim
          tempor id.
          Phasellus lobortis efficitur nisl eget vehicula. Donec viverra blandit nunc, nec tempor ligula ullamcorper
          venenatis.
        </p>
      </div>
      <div class="testimonials-right swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide testimonials-card">
            <img src="{{ asset('/') }}frontend/assets/images/quote.png"
              alt="quote icon"
              class="quote-img">
            <p class="testimonials-text">
              "Proin feugiat tortor non neque eleifend, at fermentum est elementum. Ut mollis leo odio vulputate
              rutrum.
              Nunc sagittis
              sit amet ligula ut eleifend. Mauris consequat mauris sit amet turpis commodo fermentum. Quisque
              consequat
              tortor ut nisl
              finibus".
            </p>
            <div class="testimonials-client">
              <div class="client-img-box">
                <img src="{{ asset('/') }}frontend/assets/images/client.jpg"
                  alt="client Nano Diva">
              </div>
              <div class="client-detail">
                <h4 class="client-name">Nano Diva</h4>
                <p class="client-title">Customer</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide testimonials-card">
            <img src="{{ asset('/') }}frontend/assets/images/quote.png"
              alt="quote icon"
              class="quote-img">
            <p class="testimonials-text">
              "Proin feugiat tortor non neque eleifend, at fermentum est elementum. Ut mollis leo odio vulputate
              rutrum.
              Nunc sagittis
              sit amet ligula ut eleifend. Mauris consequat mauris sit amet turpis commodo fermentum. Quisque
              consequat
              tortor ut nisl
              finibus".
            </p>
            <div class="testimonials-client">
              <div class="client-img-box">
                <img src="{{ asset('/') }}frontend/assets/images/client.jpg"
                  alt="client Nano Diva">
              </div>
              <div class="client-detail">
                <h4 class="client-name">Nano Diva</h4>
                <p class="client-title">Customer</p>
              </div>
            </div>
          </div>
          <div class="swiper-slide testimonials-card">
            <img src="{{ asset('/') }}frontend/assets/images/quote.png"
              alt="quote icon"
              class="quote-img">
            <p class="testimonials-text">
              "Proin feugiat tortor non neque eleifend, at fermentum est elementum. Ut mollis leo odio vulputate
              rutrum.
              Nunc sagittis
              sit amet ligula ut eleifend. Mauris consequat mauris sit amet turpis commodo fermentum. Quisque
              consequat
              tortor ut nisl
              finibus".
            </p>
            <div class="testimonials-client">
              <div class="client-img-box">
                <img src="{{ asset('/') }}frontend/assets/images/client.jpg"
                  alt="client Nano Diva">
              </div>
              <div class="client-detail">
                <h4 class="client-name">Nano Diva</h4>
                <p class="client-title">Customer</p>
              </div>
            </div>
          </div>
        </div>

        <div class="swiper-pagination"></div>
      </div>
    </section>
    <!--=====================================================-->
    <!--============== Testimonial section end ==============-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--=================== Blog Section ====================-->
    <!--=====================================================-->
    <section class="blog"
      id="blog">
      <p class="section-subtitle">Our Blog</p>
      <h2 class="section-title">Latest Blog & News</h2>
      <div class="blog-grid">
        <div class="blog-card">
          <div class="blog-banner-box">
            <img src="{{ asset('/') }}frontend/assets/images/blog-1.jpg"
              alt="blog banner">
          </div>
          <div class="blog-content">
            <!------- Single item ------->
            <h3 class="blog-title">
              <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
            </h3>
            <div class="wrapper">
              <div class="blog-publish-date">
                <img src="{{ asset('/') }}frontend/assets/images/calendar.png"
                  alt="calendar icon">
                <a href="#">07 Jan, 2022</a>
              </div>
              <div class="blog-comment">
                <img src="{{ asset('/') }}frontend/assets/images/comment.png"
                  alt="comment icon">
                <a href="#">3 Comments</a>
              </div>
            </div>
          </div>
        </div>
        <!------- Single item ------->
        <div class="blog-card">
          <div class="blog-banner-box">
            <img src="{{ asset('/') }}frontend/assets/images/blog-2.jpg"
              alt="blog banner">
          </div>
          <div class="blog-content">
            <h3 class="blog-title">
              <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
            </h3>
            <div class="wrapper">
              <div class="blog-publish-date">
                <img src="{{ asset('/') }}frontend/assets/images/calendar.png"
                  alt="calendar icon">
                <a href="#">04 Jan, 2022</a>
              </div>
              <div class="blog-comment">
                <img src="{{ asset('/') }}frontend/assets/images/comment.png"
                  alt="comment icon">
                <a href="#">10 Comments</a>
              </div>
            </div>
          </div>
        </div>
        <!------- Single item ------->
        <div class="blog-card">
          <div class="blog-banner-box">
            <img src="{{ asset('/') }}frontend/assets/images/blog-3.jpg"
              alt="blog banner">
          </div>
          <div class="blog-content">
            <h3 class="blog-title">
              <a href="#">Lorem ipsum dolor sit amet consectetur adipisicing.</a>
            </h3>
            <div class="wrapper">
              <div class="blog-publish-date">
                <img src="{{ asset('/') }}frontend/assets/images/calendar.png"
                  alt="calendar icon">
                <a href="#">01 Jan, 2022</a>
              </div>
              <div class="blog-comment">
                <img src="{{ asset('/') }}frontend/assets/images/comment.png"
                  alt="comment icon">
                <a href="#">5 Comments</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=====================================================-->
    <!--================= Blog Section end ==================-->
    <!--=====================================================-->

    <!--=====================================================-->
    <!--================== Contact section ==================-->
    <!--=====================================================-->
    <section class="contact">
      <div class="contact-card"
        id="contact">
        <img src="{{ asset('/') }}frontend/assets/images/cta-bg-img.png"
          alt="shape"
          class="contact-card-bg">
        <h2>Start Your Best Online Classes With Us</h2>
        <button class="btn btn-primary">
          <p class="btn-text">Contact Us</p>
          <span class="square"></span>
        </button>
      </div>
    </section>
    <!--=====================================================-->
    <!--================ Contact section end ================-->
    <!--=====================================================-->
  </main>
@endsection
