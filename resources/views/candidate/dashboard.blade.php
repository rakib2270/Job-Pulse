
@extends('candidate.candidate')

@section('cnContent')
    <section class="section-6 bg-2">
        <div class="container py-5">
                </div>
                    @include('front.message')

                    <h1>WELCOME TO DASHBOARD!!</h1>
                    <h2>What's The Benefit For an Applicant To Apply Using Job Pulse?</h2>
                    <p style="color: green" id="multipleStrings"></p>

                </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        // Multiple String Writer

        new TypeIt("#multipleStrings", {
            strings: ["1 : Diverse Opportunities:","Job Pulse opens doors to a wide array of job opportunities, enabling applicants to explore and apply for roles across diverse industries."," ", "2 : Effortless Navigation:", "With an intuitive and user-friendly interface, Job Pulse simplifies the job search process, ensuring applicants can easily browse and apply for positions tailored to their skills."," "," "," 3 : Career Guidance: ", "Job Pulse goes beyond job listings, providing valuable career development resources, including resume building tips and interview strategies, to support applicants in their professional journey." ," ", "4 : Direct Employer Connections: ", "Job Pulse facilitates direct communication with employers, fostering networking opportunities and enhancing applicants' chances of securing meaningful employment."  ],
            speed: 10,
            waitUntilVisible: true,
        }).go();
    </script>

@endsection
