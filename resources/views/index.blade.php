<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Pondok Sayf El Falah</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />
    <!-- Favicon -->
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon" />

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Teko:wght@400;500;600&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
      <a href="#" class="navbar-brand ms-3 ms-lg-0">
        <h1 class="text-primary m-0 Judul"><img class="me-3" src="{{ asset('assets/img/IconFalahNoBg.png') }}" alt="Icon" />Sayf EL Falah</h1>
      </a>
      <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="" class="nav-item nav-link active">Home</a>
          <a href="#About" class="nav-item nav-link">About</a>
          <a href="#Program" class="nav-item nav-link">Program</a>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pendidikan</a>
            <div class="dropdown-menu border-0 m-0">
              <a href="" class="dropdown-item">Tk & Kb</a>
              <a href="https://sekolahalamselfa.com/" class="dropdown-item">SD Alam</a>
              <a href="" class="dropdown-item">Pondok Pesantren</a>
            </div>
          </div>
          <a
            href="https://wa.me/6285217176495?text=Assalamualaikum%20Ustadz,%20Saya%20ingin%20bertanya%20tentang%20Pendaftaran%20Pondok%20/%20atau%20tentang%20pondok%20secara%20Keseluruhan%20..."
            class="nav-item nav-link"
            >Contact</a
          >
        </div>
        <a
          href="https://wa.me/6285217176495?text=Assalamualaikum%20Ustadz,%20Saya%20ingin%20bertanya%20tentang%20Pendaftaran%20Pondok%20/%20atau%20tentang%20pondok%20secara%20Keseluruhan%20..."
          class="btn btn-primary rounded-pill py-2 px-4 d-none d-lg-block"
          >Daftar</a
        >
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid p-0 pb-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative" data-dot="<img src={{ asset('assets/img/masjidselfa1.jpg') }}>">
          <img class="img-fluid" src="{{ asset('assets/img/masjidselfa1.jpg') }}" alt="" />
          <div class="owl-carousel-inner">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-10 col-lg-8">
                  <h1 class="display-1 text-white animated slideInDown">Selamat Datang di Ponpes Sayf El Falah</h1>
                  <p class="fs-5 fw-medium text-white mb-2 pb-3 pt-5">
                    Pondok Pesantren Sayf El Falah adalah lembaga pendidikan Islam yang berkomitmen mencetak generasi beriman, bertakwa, dan
                    berakhlak mulia.
                  </p>
                  <!-- <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Selengkapnya</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src={{ asset('assets/img/sayfelfalah-pb-1.jpg') }}>">
          <img class="img-fluid" src="{{ asset('assets/img/sayfelfalah-pb-1.jpg') }}" alt="" />
          <div class="owl-carousel-inner">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-10 col-lg-8">
                  <h1 class="display-1 text-white animated slideInDown">Selamat Datang di Ponpes Sayf El Falah</h1>
                  <p class="fs-5 fw-medium text-white mb-2 pb-3 pt-5">
                    Pondok Pesantren Sayf El Falah adalah lembaga pendidikan Islam yang berkomitmen mencetak generasi beriman, bertakwa, dan
                    berakhlak mulia.
                  </p>
                  <!-- <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Selengkapnya</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="owl-carousel-item position-relative" data-dot="<img src={{ asset('assets/img/masjidselfa2.jpg') }}>">
          <img class="img-fluid" src="{{ asset('assets/img/masjidselfa2.jpg') }}" alt="" />
          <div class="owl-carousel-inner">
            <div class="container">
              <div class="row justify-content-start">
                <div class="col-10 col-lg-8">
                  <h1 class="display-1 text-white animated slideInDown">Selamat Datang di Ponpes Sayf El Falah</h1>
                  <p class="fs-5 fw-medium text-white mb-2 pb-3 pt-5">
                    Pondok Pesantren Sayf El Falah adalah lembaga pendidikan Islam yang berkomitmen mencetak generasi beriman, bertakwa, dan
                    berakhlak mulia.
                  </p>
                  <!-- <a href="" class="btn btn-primary py-3 px-5 animated slideInLeft">Selengkapnya</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel End -->

<!-- About Start -->
<div id="About" class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img">
                    @if ($about->image_1)
                    <img class="img-fluid" src="{{ asset('storage/' . $about->image_1) }}" alt="Gambar 1" />
                    @endif
                     @if ($about->image_2)
                    <img class="img-fluid" src="{{ asset('storage/' . $about->image_2)}}" alt="" />
                    @endif
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h4 class="section-title">{{ $about->title_section}}</h4>
                <h1 class="display-5 mb-4 title-Section">{{ $about->sub_title}}</h1>
                <p>
                 {!! nl2br(e($about->description)) !!}
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

<!-- Pendidikan Start -->
<div class="container-xxl py-5">
    <div class="container pt-5">
        <div class="row g-4">
            @foreach ($pendidikans as $pendidikan)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="fact-item text-center bg-light h-100 p-5 pt-0">
                    <div class="fact-icon">
                        @if ($pendidikan->icon)
                        <img src="{{ asset('storage/' . $pendidikan->icon)}}" class="img-fluid"
                         alt="" style="height: 80px; object-fit: contain;">
                        @endif
                        <img src="" alt="">
                    </div>
                <h3 class="mb-3 title-Section">{{ $pendidikan->title }}</h3>
                <p class="mb-0">{!! nl2br(e($pendidikan->description)) !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Pendidikan End -->

<!-- Statistics Section Start -->
<div class="container-xxl py-5 mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="border border-3 border-primary p-4 bg-light shadow-lg rounded-4">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-3 col-6 text-center">
                            <h1 class="display-4" data-toggle="counter-up">2023</h1>
                            <h5 class="mt-2">Tahun Berdiri</h5>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <h1 class="display-4" data-toggle="counter-up">{{$totalSantri + 11}}</h1>
                            <h5 class="mt-2">Santri</h5>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <h1 class="display-4" data-toggle="counter-up">10</h1>
                            <h5 class="mt-2">Pengurus</h5>
                        </div>
                        <div class="col-md-3 col-6 text-center">
                            <h1 class="display-4" data-toggle="counter-up">{{ $totalLembaga }}</h1>
                            <h5 class="mt-2">Lembaga</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Statistics Section End -->

    <!-- Team Start -->
<div class="container-xxl py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            @php $section = sectionHeader('team'); @endphp
          <h4 class="section-title">{{ $section->title }}</h4>
          <h1 class="displa y-5 mb-4 title-Section">{{ $section->subtitle }}</h1>
        </div>
      <div class="row g-0 team-items">
     @foreach ($teams as $index => $team)
    <div class="col-lg-3 col-md-6">
        <div class="team-item position-relative wow fadeInUp" data-wow-delay="{{ 0.2 * $index}}s">
            <div class="position-relative">
                <img class="img-fluid" src="{{ asset('storage/' . $team->photo) }}" alt="{{ $team->name }}" />
                <div class="team-social text-center">
                    @if ($team->facebook)
                        <a class="btn btn-square" href="{{ $team->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if ($team->twitter)
                        <a class="btn btn-square" href="{{ $team->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    @endif
                    @if ($team->instagram)
                        <a class="btn btn-square" href="{{ $team->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                    @endif
                </div>
            </div>
            <div class="bg-light text-center p-4">
                <h3 class="mt-2 title-Section">{{ $team->name }}</h3>
                <span class="text-primary">{{ $team->position }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>

      </div>
</div>
    <!-- Team End -->

<!-- Program Start -->
<div id="Program" class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            @php $section = sectionHeader('program'); @endphp
            <h4 class="section-title">{{ $section->title }}</h4>
            <h1 class="display-5 mb-4 title-Section">{{$section->subtitle}}</h1>
        </div>
        <div class="row g-4">
            @foreach ($programs as $program)
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="program-item d-flex position-relative text-center h-100">
                    <img class="bg-img" src="{{ asset('storage/' . $program->image) }}" alt="" />
                    <div class="program-text p-5">
                        <img src="{{ asset('storage/' . $program->icon) }}" alt="" style="height: 70px;" class="mb-3" />
                        <h3 class="mb-3 title-program">{{ $program->title }}</h3>
                        <p class="mb-4">{{ $program->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Program End -->

<!-- Lembaga Start -->
<div id="lembaga" class="py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h4 class="section-title text-primary">Lembaga Pendukung</h4>
        </div>
        <div class="swiper lembaga-slider">
            <div class="swiper-wrapper">
                @foreach ($lembagas as $lembaga)
                <div class="swiper-slide text-center">
                    @if ($lembaga->logo)
                        <img src="{{ asset('storage/' . $lembaga->logo) }}" alt="{{ $lembaga->nama_lembaga }}" class="lembaga-logo">
                    @else
                        <img src="{{ asset('images/default-logo.png') }}" alt="Default Logo" class="lembaga-logo">
                    @endif
                    <h5 class="text-title modern-title">{{ $lembaga->nama_lembaga }}</h5>
                </div>
                @endforeach
            </div>
            <div class="swiper-pagination modern-pagination"></div>
        </div>
    </div>
</div>
<!-- Lembaga End -->

<!-- Blog Start -->
<div id="blog" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
              @php $section = sectionHeader('blog'); @endphp
            <h4 class="section-title">{{ $section->title }}</h4>
            <h1 class="display-5 mb-4 title-Section">{{$section->subtitle}}</h1>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach ($blogs as $blog)
            <div class="col-lg-3 col-md-6 d-flex">
                <div class="card shadow-sm h-100 border-0 w-100">
                    <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}" style="height: 350px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-title">{{ $blog->title }}</h5>
                        <p class="card-text text-muted">
                            {{ \Illuminate\Support\Str::limit(strip_tags($blog->content), 100, '...') }}
                        </p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            {{-- <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a> --}}
                            @if ($blog->instagram_link)
                            <a href="{{ $blog->instagram_link }}" target="_blank" class="text-danger fs-4">
                                <i class="bi bi-instagram"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Blog End -->

<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
            <h4 class="section-title">Testimoni</h4>
            <h1 class="display-5 mb-4 title-Section">Pendapat Wali Santri Tentang Pondok</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src={{ asset('assets/img/testimonial-1.jpg') }} alt=''>">
                <p class="fs-5">
                    Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.
                </p>
                <h3>Client Name</h3>
                <span class="text-primary">Wali Santri</span>
            </div>
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src={{ asset('assets/img/testimonial-2.jpg') }} alt=''>">
                <p class="fs-5">
                    Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.
                </p>
                <h3>Client Name</h3>
                <span class="text-primary">Wali Santri</span>
            </div>
            <div class="testimonial-item text-center" data-dot="<img class='img-fluid' src={{ asset('assets/img/testimonial-3.jpg') }} alt=''>">
                <p class="fs-5">
                    Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.
                </p>
                <h3>Client Name</h3>
                <span class="text-primary">Wali Santri</span>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

    <!-- Feature Start -->
     {{-- <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h4 class="section-title">Why Choose Us!</h4>
            <h1 class="display-5 mb-4">Why You Should Trust Us? LSelengkapnya About Us!</h1>
            <p class="mb-4">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit,
              sed stet lorem sit clita duo justo magna dolore erat amet
            </p>
            <div class="row g-4">
              <div class="col-12">
                <div class="d-flex align-items-start">
                  <img class="flex-shrink-0" src="img/icons/icon-2.png" alt="Icon" />
                  <div class="ms-4">
                    <h3>Design Approach</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex align-items-start">
                  <img class="flex-shrink-0" src="img/icons/icon-3.png" alt="Icon" />
                  <div class="ms-4">
                    <h3>Innovative Solutions</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="d-flex align-items-start">
                  <img class="flex-shrink-0" src="img/icons/icon-4.png" alt="Icon" />
                  <div class="ms-4">
                    <h3>Project Management</h3>
                    <p class="mb-0">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="feature-img">
              <img class="img-fluid" src="img/about-2.jpg" alt="" />
              <img class="img-fluid" src="img/about-1.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- Feature End -->

    <!-- Project Start -->
    {{-- <div class="container-xxl project py-5">
      <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px">
          <h4 class="section-title">Our Projects</h4>
          <h1 class="display-5 mb-4 title-Section">Visit Our Latest Projects And Our Innovative Works</h1>
        </div>
        <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
          <div class="col-lg-4">
            <div class="nav nav-pills d-flex justify-content-between w-100 h-100 me-4">
              <button
                class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4 active"
                data-bs-toggle="pill"
                data-bs-target="#tab-pane-1"
                type="button"
              >
                <h3 class="m-0">01. Modern Complex</h3>
              </button>
              <button
                class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                data-bs-toggle="pill"
                data-bs-target="#tab-pane-2"
                type="button"
              >
                <h3 class="m-0">02. Royal Hotel</h3>
              </button>
              <button
                class="nav-link w-100 d-flex align-items-center text-start p-4 mb-4"
                data-bs-toggle="pill"
                data-bs-target="#tab-pane-3"
                type="button"
              >
                <h3 class="m-0">03. Mexwel Buiding</h3>
              </button>
              <button
                class="nav-link w-100 d-flex align-items-center text-start p-4 mb-0"
                data-bs-toggle="pill"
                data-bs-target="#tab-pane-4"
                type="button"
              >
                <h3 class="m-0">04. Shopping Complex</h3>
              </button>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="tab-content w-100">
              <div class="tab-pane fade show active" id="tab-pane-1">
                <div class="row g-4">
                  <div class="col-md-6" style="min-height: 350px">
                    <div class="position-relative h-100">
                      <img class="position-absolute img-fluid w-100 h-100" src="img/project-1.jpg" style="object-fit: cover" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                    <p class="mb-4">
                      Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et
                      sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Selengkapnya</a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-pane-2">
                <div class="row g-4">
                  <div class="col-md-6" style="min-height: 350px">
                    <div class="position-relative h-100">
                      <img class="position-absolute img-fluid w-100 h-100" src="img/project-2.jpg" style="object-fit: cover" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                    <p class="mb-4">
                      Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et
                      sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Selengkapnya</a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-pane-3">
                <div class="row g-4">
                  <div class="col-md-6" style="min-height: 350px">
                    <div class="position-relative h-100">
                      <img class="position-absolute img-fluid w-100 h-100" src="img/project-3.jpg" style="object-fit: cover" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                    <p class="mb-4">
                      Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et
                      sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Selengkapnya</a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tab-pane-4">
                <div class="row g-4">
                  <div class="col-md-6" style="min-height: 350px">
                    <div class="position-relative h-100">
                      <img class="position-absolute img-fluid w-100 h-100" src="img/project-4.jpg" style="object-fit: cover" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h1 class="mb-3">25 Years Of Experience In Architecture Industry</h1>
                    <p class="mb-4">
                      Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et
                      sit, sed stet lorem sit clita duo justo magna dolore erat amet
                    </p>
                    <p><i class="fa fa-check text-primary me-3"></i>Design Approach</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Innovative Solutions</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Project Management</p>
                    <a href="" class="btn btn-primary py-3 px-5 mt-3">Selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- Project End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-footer text-body footer mt-5 pt-5 px-0 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5 align-items-start">
          <div class="col-lg-3 col-md-6">
            <div class="d-flex align-items-center">
              <!-- <img src="img/IconFalahNoBg.png" alt="Logo" width="40"> -->
              <h3 class="title-footer mb-4">Sayf El Falah</h3>
            </div>
            <p class="mt-2 list-footer">
              Sayf El Falah adalah lembaga pendidikan berbasis pesantren yang berfokus pada pembinaan akhlak, akademik, dan keterampilan
              santri untuk masa depan yang lebih baik.
            </p>
          </div>

          <div class="col-lg-3 col-md-6">
            <h3 class="title-footer mb-4">Informasi</h3>
            <a class="btn btn-link" href="">Visi & Misi</a>
            <a class="btn btn-link" href="">Alur Pendidikan</a>
            <a class="btn btn-link" href="">Lembaga</a>
          </div>

          <div class="col-lg-3 col-md-6">
            <h3 class="title-footer mb-4">Kontak Kami</h3>
            <p class="mb-2">
              <i class="fa fa-phone-alt text-primary me-2"></i>
              <a class="list-footer" href="https://wa.me/6285217176495">Ustadz Furqan Syafrizal</a>
            </p>
            <p class="mb-2 list-footer"><i class="fa fa-envelope text-primary"></i> pesantrensayfelfalah@gmail.com</p>
            <div class="d-flex pt-2">
              <a class="btn btn-square btn-outline-body me-1" href=""><i class="fab fa-twitter"></i></a>
              <a class="btn btn-square btn-outline-body me-1" href=""><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-square btn-outline-body me-1" href=""><i class="fab fa-youtube"></i></a>
              <a class="btn btn-square btn-outline-body me-0" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <h3 class="title-footer mb-4">Address</h3>
            <p class="mb-2 list-footer">
              <i class="fa fa-map-marker-alt text-primary me-3"></i>Jl. Wahidin Sudiro Husodo No.36, Bramen, Sekarsuli, Kec. Klaten Utara,
              Kabupaten Klaten, Jawa Tengah 57438
            </p>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1222.7013959293104!2d110.60411067090085!3d-7.692333357861694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a43f01ae7ca55%3A0x3052ee63172a145f!2sMasjid%20Al-Muhajirin!5e0!3m2!1sid!2sid!4v1743005025922!5m2!1sid!2sid"
              width="100%"
              height="200"
              style="border: 0; border-radius: 10px"
              allowfullscreen=""
              loading="lazy"
            ></iframe>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->

    {{-- Swiper --}}
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>


  </body>
</html>
