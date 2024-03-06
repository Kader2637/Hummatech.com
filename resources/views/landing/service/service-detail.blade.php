@extends('landing.layouts.layouts.app')

@section('style')

    <style>
        .subtitle {
            text-transform: uppercase;
            font-weight: 600;
            color: #1273eb;
            margin-top: -5px;
            display: inline-block;
            background: linear-gradient(90deg, rgba(18, 115, 235, 1) 30%, rgba(4, 215, 242, 1) 100%);
            -webkit-background-clip: text;
            -moz-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .about-us-area .thumb {
            padding-left: unset;
            padding-right: 50px;
        }

        .about-us-area .thumb::after {
            right: 0;
            top: 5rem !important;
            left: unset !important;
        }

        .about-us-area .container {
            position: relative;
        }

        .about-us-area .about-triangle {
            position: absolute;
            z-index: -1;
            top: -7.5rem;
            right: -7.5rem;
        }

        @media screen and (max-width: 992px) {
            .about-us-area .about-triangle {
                right: 0;
            }

            .about-us-area .thumb {
                padding-top: 50px;
                padding-right: unset;
            }
        }
    </style>
        <style>
            /* Custom styles for the timeline */
            .timeline {
                position: relative;
                padding: 40px 0;
            }

            .timeline::before {
                content: '';
                position: absolute;
                width: 4px;
                height: 100%;
                background: #ced4da;
                left: 50%;
                top: 0;
                transform: translateX(-50%);
            }

            .timeline-item {
                margin-bottom: 50px;
                position: relative;
            }

            .timeline-item::after {
                content: '';
                display: table;
                clear: both;
            }

            .timeline-item-content {
                position: relative;
                width: 45%;
                border-radius: 5px;
                float: left;
                padding-right: 3rem;
            }

            .timeline-item-content h2 {
                margin-top: 0;
            }

            .timeline-item-date {
                font-size: 14px;
                color: #6c757d;
            }

            .timeline-number {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 5rem;
                height: 5rem;
                background-color: #007bff;
                color: #fff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: bold;
                font-size: 1.5rem;
                font-family: 'Poppins', Arial, Helvetica, sans-serif;
            }

            /* Alternate the position of the timeline items */
            .timeline .timeline-item:nth-child(even) .timeline-item-content {
                float: right;
                text-align: right;
                padding-left: 3rem;
                padding-right: 0;
            }

            .timeline .timeline-item:nth-child(even) .timeline-item-content::before {
                right: 100%;
                border-right: 8px solid #f8f9fa;
                border-left: none;
            }

            .timeline .timeline-item:nth-child(odd) .timeline-item-content::before {
                left: 100%;
                border-left: 8px solid #f8f9fa;
                border-right: none;
            }

            .timeline .timeline-item:nth-child(even) .timeline-item-content::after,
            .timeline .timeline-item:nth-child(odd) .timeline-item-content::after {
                display: none;
            }
        </style>
@endsection

@section('seo')
    <!-- ========== Breadcrumb Markup (JSON-LD) ========== -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@type": "ListItem",
          "position": 1,
          "name": "Beranda",
          "item": "{{ url('/') }}"
        },
        {
          "@type": "ListItem",
          "position": 2,
          "name": "Tentang Kami",
          "item": "{{ url('/about-us') }}"
        },
        {
          "@type": "ListItem",
          "position": 4,
          "name": "Produk",
          "item": "{{ url('/produk') }}"
        },
      ]
    }
    </script>
@endsection

@section('content')
    <div class="breadcrumb-area text-center shadow dark text-light bg-cover"
        style="background-image: url({{ asset('assets-home/img/banner/10.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1>{{ $slugs->name }}</h1>
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fas fa-home"></i> Beranda</a></li>
                        <li class="active">Layanan</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="services-details-area default-padding">
        <div class="container">
            <div class="services-details-items">
                <div class="row">

                    <div class="col-lg-8 services-single-content">
                        <img src="{{ asset('storage/' . $slugs->image) }}" alt="Thumb">
                        <h2 class="wow fadeInLeft">{{ $slugs->name }}</h2>
                        <p class="wow fadeInLeft">
                            {!! Str::limit($slugs->description, 800) !!}
                        </p>
                        <a href="{{ $slugs->link }}" target="_blank" class="btn btn-gradient effect btn-md"
                            href="">Kunjungi website</a>

                        <div class="mt-5">
                            <div class="title-service">
                                <h4 class="m-0">Produk Yang Dihasilkan</h4>
                                <div class="dash"></div>
                            </div>
                            @forelse ($products as $index => $product)
                            <div class="about-content-area pb-5 mb-5">
                                <div class="row @if($index % 2 === 1) flex-row-reverse @endif">
                                    <div class="col-lg-5 thumb wow fadeInUp">
                                        <div class="img-box">
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="Thumb">
                                            <div class="shape" style="background-image: url(assets/img/shape/1.png);"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 wow fadeInDown">
                                        <h2>{{$product->name}}</h2>
                                        <p>{{$product->description}}</p>
                                        <a class="btn btn-stroke-gradient effect btn-md" href="#">Lihat detail</a>
                                        <a class="btn btn-gradient effect btn-md" href="#">Kunjungi website</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('nodata-gif.gif') }}" alt="" width="800px">
                            </div>
                            <h4 class="text-center text-dark" style="font-weight:600">
                                Belum ada produk
                            </h4>
                        </div>
                        @endforelse
                        </div>

                        <div class="my-5 py-3">
                            <div class="title-service">
                                <h4 class="m-0">Testimoni Layanan</h4>
                                <div class="dash"></div>
                            </div>

                            <div class="testimonials-area">
                                <div class="container">
                                    <div class="testimonial-items bg-gradient-gray">
                                        <div class="row align-center bg-gradient-gray">
                                            <div class="col-lg-7 testimonials-content">
                                                <div class="testimonials-carousel owl-carousel owl-theme">
                                                    @forelse ($testimonials as $testimonial)
                                                        <div class="item">
                                                            <div class="info">
                                                                <p>
                                                                    Otherwise concealed favourite frankness on be at dashwoods
                                                                    defective at. Sympathize interested
                                                                </p>
                                                                <div class="provider">
                                                                    <div class="thumb">
                                                                        <img src="{{ asset('assets-home/img/teams/5.jpg') }}"
                                                                            alt="Author">
                                                                    </div>
                                                                    <div class="content">
                                                                        <h4 class="text-primary">Ahel Natasha</h4>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty

                                                    @endforelse
                                                    <!-- Single Item -->
                                                    <!-- End Single Item -->
                                                    <!-- Single Item -->
                                                    {{-- <div class="item">
                                                        <div class="info">
                                                            <p>
                                                                Otherwise concealed favourite frankness on be at dashwoods
                                                                defective at. Sympathize interested
                                                            </p>
                                                            <div class="provider">
                                                                <div class="thumb">
                                                                    <img src="{{ asset('assets-home/img/teams/6.jpg') }}"
                                                                        alt="Author">
                                                                </div>
                                                                <div class="content">
                                                                    <h4 class="text-primary">Ahel Natasha</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <!-- End Single Item -->
                                                </div>
                                            </div>
                                            <div class="col-lg-5 info">
                                                <h4>Testimoni</h4>
                                                <h3>Testimoni Membuktikan Kualitas produk Kami</h3>
                                                <p>
                                                    Tingkatkan Kepercayaan Anda: Dengarlah Suara Pelanggan Kami Melalui
                                                    Testimoni Mereka
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-3 mb-5">
                            <div class="title-service">
                                <h4 class="m-0">FAQ</h4>
                                <div class="dash"></div>
                            </div>

                            <!-- Star Faq -->
                            <div class="faq-content-area">
                                <div class="faq-items">
                                    <div class="row align-center">

                                        <div class="col-lg-12 ">
                                            <div class="faq-content wow fadeInUp">
                                                <div class="accordion" id="accordionExample">
                                                    <div class="card">
                                                        <div class="card-header" id="headingOne">
                                                            <h4 class="mb-0" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-expanded="true"
                                                                aria-controls="collapseOne">
                                                                Why is collaborative learning so important?
                                                            </h4>
                                                        </div>

                                                        <div id="collapseOne" class="collapse show"
                                                            aria-labelledby="headingOne" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                                    Companions shy had solicitude favourable own. Which
                                                                    could saw guest man now heard but. Lasted my coming
                                                                    uneasy marked so should. Gravity letters i
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingTwo">
                                                            <h4 class="mb-0 collapsed" data-toggle="collapse"
                                                                data-target="#collapseTwo" aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Do you offer free trials?
                                                            </h4>
                                                        </div>
                                                        <div id="collapseTwo" class="collapse"
                                                            aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                                    Companions shy had solicitude favourable own. Which
                                                                    could saw guest man now heard but. Lasted my coming
                                                                    uneasy marked so should. Gravity letters it amongst
                                                                    herself dearest an windows by. Wooded ladies she basket
                                                                    season age her uneasy saw. Discourse unwilling am no
                                                                    described dejection incommode no listening of. Before
                                                                    nature his parish boy.
                                                                </p>
                                                                <div class="ask-question">
                                                                    <span>Still no luck?</span> <a href="#">Ask a
                                                                        question</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingThree">
                                                            <h4 class="mb-0 collapsed" data-toggle="collapse"
                                                                data-target="#collapseThree" aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                What kind of support do you offer?
                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree" class="collapse"
                                                            aria-labelledby="headingThree"
                                                            data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                                    Companions shy had solicitude favourable own. Which
                                                                    could saw guest man now heard but. Lasted my coming
                                                                    uneasy marked so should. Gravity letters it amongst
                                                                    herself dearest an windows by. Wooded ladies she basket
                                                                    season age her uneasy saw. Discourse unwilling am no
                                                                    described dejection incommode no listening of. Before
                                                                    nature his parish boy.
                                                                </p>
                                                                <div class="ask-question">
                                                                    <span>Still no luck?</span> <a href="#">Ask a
                                                                        question</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-header" id="headingFour">
                                                            <h4 class="mb-0 collapsed" data-toggle="collapse"
                                                                data-target="#collapseFour" aria-expanded="false"
                                                                aria-controls="collapseFour">
                                                                Can I share my courses with non-registered users?
                                                            </h4>
                                                        </div>
                                                        <div id="collapseFour" class="collapse"
                                                            aria-labelledby="headingFour" data-parent="#accordionExample">
                                                            <div class="card-body">
                                                                <p>
                                                                    Companions shy had solicitude favourable own. Which
                                                                    could saw guest man now heard but. Lasted my coming
                                                                    uneasy marked so should. Gravity letters it amongst
                                                                    herself dearest an windows by. Wooded ladies she basket
                                                                    season age her uneasy saw. Discourse unwilling am no
                                                                    described dejection incommode no listening of. Before
                                                                    nature his parish boy.
                                                                </p>
                                                                <div class="ask-question">
                                                                    <span>Still no luck?</span> <a href="#">Ask a
                                                                        question</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- End Faq -->
                        </div>

                        <div class="work-process-area features-area default-padding-bottom py-5">
                            <div class="container pt-5">
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2">
                                        <div class="site-heading text-center">
                                            <h4>Alur Kerja</h4>
                                            <h3>"Kendalikan Alur Kerja Anda: Strategi Efektif untuk Produktivitas dan Efisiensi"</h3>
                                            <div class="devider"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="timeline">
                                                    <div class="timeline-item">
                                                        <div class="timeline-number">01</div>
                                                        <div class="timeline-item-content">
                                                            <h2>Event Title</h2>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                                            <span class="timeline-item-date">March 1, 2024</span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item">
                                                        <div class="timeline-number">02</div>
                                                        <div class="timeline-item-content">
                                                            <h2>Another Event Title</h2>
                                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                            <span class="timeline-item-date">March 5, 2024</span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item">
                                                        <div class="timeline-number">03</div>
                                                        <div class="timeline-item-content">
                                                            <h2>Another Event Title</h2>
                                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                            <span class="timeline-item-date">March 5, 2024</span>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item">
                                                        <div class="timeline-number">04</div>
                                                        <div class="timeline-item-content">
                                                            <h2>Another Event Title</h2>
                                                            <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                            <span class="timeline-item-date">March 5, 2024</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="py-2 mb-5">
                            <div class="title-service">
                                <h4 class="m-0">Daftar Pelatihan</h4>
                                <div class="dash"></div>
                            </div>
                            <div class="blog-area bottom-less">
                                <div class="container">
                                    <div class="blog-items">
                                        <div class="row">
                                            <!-- Single Item -->
                                            <div class="single-item col-lg-6 col-md-6 wow fadeInUp"
                                                data-wow-delay="300ms">
                                                <div class="item p-2">
                                                    <div class="thumb">
                                                        <img src="{{ asset('assets-home/img/blog/1.jpg') }}"
                                                            alt="Thumb">
                                                    </div>

                                                    <div class="px-3">
                                                        <h5>
                                                            Financial Planning
                                                        </h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur. Amet etiam at diam
                                                            pharetra ipsum at. Cursus tempus nullam ultrices sollicitudin.
                                                        </p>
                                                        <div class="mb-3">
                                                            <a class="btn btn-stroke-gradient effect btn-sm"
                                                                href="{{ url('layanan/pelatihan') }}">Lihat
                                                                Detail</a>
                                                            <a class="btn btn-gradient effect btn-sm"
                                                                href="">Ajukan Proposal</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Item -->
                                            <!-- Single Item -->
                                            <div class="single-item col-lg-6 col-md-6 wow fadeInUp"
                                                data-wow-delay="300ms">
                                                <div class="item p-2">
                                                    <div class="thumb">
                                                        <img src="{{ asset('assets-home/img/blog/1.jpg') }}"
                                                            alt="Thumb">
                                                    </div>

                                                    <div class="px-3">
                                                        <h5>
                                                            Financial Planning
                                                        </h5>
                                                        <p>
                                                            Lorem ipsum dolor sit amet consectetur. Amet etiam at diam
                                                            pharetra ipsum at. Cursus tempus nullam ultrices sollicitudin.
                                                        </p>
                                                        <div class="mb-3">
                                                            <a class="btn btn-stroke-gradient effect btn-sm"
                                                                href="{{ url('layanan/pelatihan') }}">Lihat
                                                                Detail</a>
                                                            <a class="btn btn-gradient effect btn-sm"
                                                                href="">Ajukan Proposal</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Item -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-2 mb-5">
                            <div class="title-service">
                                <h4 class="m-0">Mitra Kami</h4>
                                <div class="dash"></div>
                            </div>

                        </div>
                        <div class="py-2 mb-5">
                            <div class="title-service">
                                <h4 class="m-0">Prosedur</h4>
                                <div class="dash"></div>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="timeline-container">
                                                <div class="timeline">
                                                    <div class="timeline-item">
                                                        <div class="timeline-content">
                                                            <h4 class="timeline-title">Event 1</h4>
                                                            <p class="timeline-date">Date 1</p>
                                                            <p class="timeline-description">Description 1</p>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-item">
                                                        <div class="timeline-content">
                                                            <h4 class="timeline-title">Event 2</h4>
                                                            <p class="timeline-date">Date 2</p>
                                                            <p class="timeline-description">Description 2</p>
                                                        </div>
                                                    </div>
                                                    <!-- Tambahkan lebih banyak event di sini -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


                            </div>

                        </div>

                        <div class="py-2 mb-5">
                            <div class="title-service">
                                <h4 class="m-0">Galeri Alumni</h4>
                                <div class="dash"></div>
                            </div>
                            <div class="galeri-alumni">
                                <div class="row">
                                    <div class="wow fadeInRight col-md-12 d-flex flex-wrap mb-4">
                                        <div class="col-md-6">
                                            <img src="{{ asset('assets-home/img/projects/1.jpg') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Angkatan 1903 - 1922</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur. Tincidunt pellentesque pellentesque
                                                sed in. Sit nunc velit aliquam quis faucibus nibh nisl pellentesque. Massa
                                            </p>
                                            <a href="{{ url('alumni-detail') }}"
                                                class="btn btn-gradient effect btn-sm">Lihat Detail Alumni</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="galeri-alumni">
                                <div class="row">
                                    <div class="wow fadeInRight col-md-12 d-flex flex-wrap mb-4">
                                        <div class="col-md-6">
                                            <img src="{{ asset('assets-home/img/projects/1.jpg') }}">
                                        </div>
                                        <div class="col-md-6">
                                            <h3>Angkatan 1907 - 1978</h3>
                                            <p>Lorem ipsum dolor sit amet consectetur. Tincidunt pellentesque pellentesque
                                                sed in. Sit nunc velit aliquam quis faucibus nibh nisl pellentesque. Massa
                                            </p>
                                            <a href="{{ url('alumni-detail') }}"
                                                class="btn btn-gradient effect btn-sm">Lihat Detail Alumni</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="py-2 mb-5">
                            <div class="title-service">
                                <h4 class="m-0">Galeri</h4>
                                <div class="dash"></div>
                            </div>
                            <div class="galeri">
                                <div class="d-flex flex-wrap col-12">
                                    <img src="{{ asset('assets-home/img/projects/1.jpg') }}"
                                        style="object-fit: cover; width: 18vw; height: 12vw" class="m-2">
                                    <img src="{{ asset('assets-home/img/projects/1.jpg') }}"
                                        style="object-fit: cover; width: 18vw; height: 12vw" class="m-2">
                                    <img src="{{ asset('assets-home/img/projects/1.jpg') }}"
                                        style="object-fit: cover; width: 18vw; height: 12vw" class="m-2">
                                    <img src="{{ asset('assets-home/img/projects/1.jpg') }}"
                                        style="object-fit: cover; width: 18vw; height: 12vw" class="m-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 services-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget services-list">
                            <h4 class="widget-title">Daftar Layanan</h4>
                            <div class="content">
                                <ul>
                                    @foreach ($services as $service)
                                        <li class=""><a href="/layanan/{{ $service->slug }}">{{ $service->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                        <div class="single-widget quick-contact text-light"
                            style="background-image: url({{ $service->image }});">
                            <div class="content">
                                <i class="fas fa-phone"></i>
                                <h4>Need any help?</h4>
                                <p>
                                    We are here to help our customer any time. You can call on 24/7 To Answer Your Question.
                                </p>
                                <h2>(012) 6679545</h2>
                            </div>
                        </div>
                        <!-- Single Widget -->
                        <div class="single-widget brochure">
                            <h4 class="widget-title">Proposal</h4>
                            <ul>
                                <li><a href="#"><i class="fas fa-file-pdf"></i> Download Brochure </a></li>
                                <li><a href="#"><i class="fas fa-file-pdf"></i> Company Details </a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
