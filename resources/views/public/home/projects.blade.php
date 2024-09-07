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

</head>

<body>

    <header>
        <h1 class="section-header-head">OUR PROJECTS</h1>
    </header>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h2 class="para-main"><mark>Our Project:</mark> Monitoring and Preventing Corrution in <span
                        class="text-main">Carbon Offset</span> Projects</h2>
                <br>
                <p class="para-text"><b>Real-time Monitoring:</b></p>
                <hr>
                <p class="para-text">Real-time monitoring refers to the ability to track and observe events or data as
                    they occur, without any delay. In the context of our project, it means having access to
                    up-to-the-minute information about carbon offset projects. With our information system, stakeholders
                    can see the flow of funds, project activities, and their impact as they happen. This real-time
                    insight allows for quick responses to any issues or discrepancies that may arise, ensuring that
                    projects stay on track and resources are utilized efficiently. By providing real-time monitoring, we
                    empower stakeholders to make informed decisions and take timely action to address challenges.</p>
                <br>
                <br>
                <br>
                <p class="para-text"><b>Citizen Engagement:</b></p>
                <hr>
                <p class="para-text">Citizen engagement involves actively involving members of the public in
                    decision-making processes and activities that affect them. In our project, citizen engagement is
                    central to our approach to combatting corruption in carbon offset projects. We believe that citizens
                    have a right to know how public funds are being used and to hold stakeholders accountable for their
                    actions. Through our platform, we provide citizens with the tools and information they need to
                    actively monitor carbon offset projects and participate in oversight activities. By engaging
                    citizens as watchdogs, we create a culture of accountability and transparency, where everyone plays
                    a role in safeguarding the integrity of environmental initiatives.</p>
                <br>
                <br>
                <br>
                <p class="para-text"><b>Transparency:</b></p>
                <hr>
                <p class="para-text">Transparency is the principle of openness, clarity, and accessibility in the
                    disclosure of information. In the context of our project, transparency means providing clear and
                    accessible information about carbon offset projects, including financial transactions, project
                    activities, and outcomes. We are committed to ensuring that all stakeholders have access to
                    comprehensive and accurate data related to carbon offset initiatives. This transparency fosters
                    trust among stakeholders and helps to prevent corruption by making it easier to detect and address
                    any irregularities or misconduct. By promoting transparency, we create a culture of accountability
                    and integrity, where stakeholders can have confidence in the integrity of environmental projects.
                </p>
                <br>
                <br>
            </div>
        </div>
    </div>

    <section class="cta text-center py-5 bg-light" id="contact">
        <div class="container">
            <h2 class="mb-4">Ready to fight<br>CORRUPTION with Carbonitor?</h2>
            <a href="mailto:carbonitor@proton.me" class="btn btn-main btn-lg" id="collaborateBtn">Join Us Now!</a>
        </div>
    </section>

    <a class="nav-link btn btn-main btn-lg" href="{{ route('home.index') }}">
        <i class="fa-regular fa-circle-left p-2"></i>
        Back to MAIN PAGE
    </a>

</body>

</html>
