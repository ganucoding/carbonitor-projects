<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbonitor</title>

    <!-- All CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="{{ asset('css/carbonitor/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/carbonitor/style.css') }}" rel="stylesheet">

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google font Links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" type="svg/xml" href="img/carbonitor/carbonitor-icon-old.svg">

</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}"><span class="text-main">Carbon</span>itor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a class="navbar-brand" href="#"><span
                                class="text-main">Carbon</span>itor</a></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item pb-1">
                            <a class="nav-link" href="#">
                                <i class="fa-solid fa-house p-2"></i>Home
                            </a>
                        </li>
                        <li class="nav-item pb-1">
                            <a class="nav-link" href="#projects">
                                <i class="fa-solid fa-diagram-project p-2"></i>Our Objectives
                            </a>
                        </li>
                        <li class="nav-item pb-1">
                            <a class="nav-link" href="{{ route('projects.projects-listing') }}">
                                <i class="fa-solid fa-tachometer p-2"></i>Our Projects
                            </a>
                        </li>
                        <li class="nav-item pb-1">
                            <a class="nav-link" href="#team">
                                <i class="fa-solid fa-people-group p-2"></i>Our Team
                            </a>
                        </li>
                        <li class="nav-item pb-1">
                            <a class="nav-link" href="#contact">
                                <i class="fa-solid fa-envelopes-bulk p-2"></i>Contact
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- about section starts -->
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-12">
                    <div class="about-img">
                        <img src="img/carbonitor/home-img.svg" alt="Carbonitor home image" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2 class="h2-main">Empowering Transparency in <br> <span>Carbon Offset</span> Projects</h2>
                        <p class="lead fw-normal">Are you passionate about preserving our planet's environment while
                            ensuring that funds allocated for climate initiatives are used effectively and ethically?
                            You're in the right place! Our cutting-edge information system is specifically designed to
                            prevent and combat corruption in carbon offset projects, empowering stakeholders with
                            transparency and accountability.</p>
                        <a href="{{ route('home.about') }}" class="btn btn-main">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- projects starts -->
    <section id="projects" class="portfolio section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Projects</h2>
                        <p>Monitoring and Preventing Corruption <br>in Carbon Offset Project</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="img/carbonitor/project-1.svg" class="img-fluid" alt="">
                            </div>
                            <h3 class="card-title">Citizen Engagement</h3>
                            <p>We believe that citizen participation is crucial in combating corruption. Our platform
                                empowers citizens to actively monitor carbon offset projects and hold stakeholders
                                accountable.</p>
                            <a href="{{ route('home.projects.learn-more') }}" class="btn btn-main">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="img/carbonitor/project-2.svg" class="img-fluid" alt="">
                            </div>
                            <h3 class="card-title">Real-time Monitoring</h3>
                            <p>Our information system provides real-time monitoring of carbon offset projects, allowing
                                stakeholders to track the flow of funds and assess project impact.</p>
                            <a href="{{ route('home.projects.learn-more') }}" class="btn btn-main">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-light text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="img/carbonitor/project-3.svg" class="img-fluid" alt="">
                            </div>
                            <h3 class="card-title">Transparency</h3>
                            <p>Transparency is the cornerstone of our project. We are committed to providing open access
                                to data and information related to carbon offset projects, promoting accountability and
                                trust.</p>
                            <a href="{{ route('home.projects.learn-more') }}" class="btn btn-main">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- team starts -->
    <section class="team section-padding" id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Team</h2>
                        <p>Meet Carbonitor</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/carbonitor/iqbal-pic.svg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Amirul Iqbal</h3>
                            <p class="card-text">Amirul Iqbal is an Integrity Officer serving at a public university in
                                Terengganu, Malaysia, with a background in law. His role in Carbonitor involves managing
                                all aspects of Tech Development for this project, ensuring that we maintain the highest
                                standards of integrity and compliance.</p>
                            <p class="socials">
                                <a href="https://www.facebook.com/miyoyt?mibextid=ZbWKwL"><i
                                        class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="https://www.linkedin.com/in/muhamadamiruliqbal"><i
                                        class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="https://www.instagram.com/amiruliqbal98_?igsh=Zjc4NHd0bTVqM3Jt"><i
                                        class="bi bi-instagram text-dark mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/carbonitor/rico-pic.svg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Yik Wai</h3>
                            <p class="card-text">Yik Wai is a social entrepreneur who co-founded sport social
                                enterprise, Crowdsukan which helps sport industry reach its sustainability goals and
                                communications specialist. He is currently one of the two Malaysian representatives at
                                UNESCO's Youth and Sport Task Force to implement the United Nations Sustainable
                                Development Goals (SDGs) within ASEAN region. He is also a freelance journalist who has
                                contributed on current affairs analysis from a Southeast Asian perspective for regional
                                medias such as the South China Morning Post (SCMP). He wants to actively contribute to
                                meeting challenges and creating new opportunities through his social entrepreneurship
                                experiences, journalism and sustainable development insights.</p>
                            <p class="socials">
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="https://www.linkedin.com/in/yik-wai-chee-306851161/ "><i
                                        class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="img/carbonitor/aries-pic.svg" alt="" class="img-fluid rounded-circle">
                            <h3 class="card-title py-2">Ariesta</h3>
                            <p class="card-text">Ariesta is an assistant professor of law at Jenderal Achmad Yani
                                University in Yogyakarta, Indonesia. He is particularly interested and teaches municipal
                                criminal law, international criminal law, and cyber law. He is pursuing a Doctor of
                                Philosophy programme at the Faculty of Law, University of Malaya, Malaysia. Ariesta has
                                been granted research funding by the Ministry of Research, Technology and Higher
                                Education (now under the Ministry of Education and Culture) of the Republic of
                                Indonesia. Ariesta is a very determined and passionate individual. His motivation to
                                contribute to the community stems from his proficient skills and aptitude for research.
                            </p>
                            <p class="socials">
                                <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                <a href="https://www.linkedin.com/in/ariestawa/"><i
                                        class="bi bi-linkedin text-dark mx-1"></i></a>
                                <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact starts -->
    <section class="cta text-center py-5 bg-light" id="contact">
        <div class="container">
            <h2 class="mb-4">We eager to fight <br> CORRUPTION</h2>
            <a href="mailto:carbonitor@proton.me" class="btn btn-main btn-lg" id="collaborateBtn">Let's
                Collaborate</a>
        </div>
    </section>

    <!-- footer starts -->
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">Copyright © {{ now()->year }} Carbonitor || All rights reserved</p>
        </div>
    </footer>

    <!-- All Js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/carbonitor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/carbonitor/script.js') }}"></script>

</body>

</html>
