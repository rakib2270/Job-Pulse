
<!-- contact.blade.php -->

@extends('front.layouts.app')

@section('content')

    <section class="section-0 lazy d-flex bg-image-style dark align-items-center "  class="" data-bg="{{ asset('assets/images/banner6.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <h1>Contact Us</h1>
                    <p>We are able to help you. Please Contact with me for any help to related this.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="mt-5 paralax-mf footer-paralax "></div>
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-mf">
                        <div id="contact" class="box-shadow-full">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="title-box-2 pt-4 pt-md-0">
                                        <h5 class="title-left">
                                            <a href="#"> Get in Touch</a>
                                        </h5>
                                    </div>
                                    <div>
                                        <form action="{{route('contactMail')}}" method="POST" role="form" class="php-email-form">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="integer" class="form-control" name="phone" id="phone" placeholder="Whatsapp Number" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea style="padding: 10px; border: 2px solid #e8ebed "  name="message" id="message" rows="8" cols="70%" placeholder="Message" required></textarea>
                                                    </div>
                                                </div>

                                                <div style="margin-top: 20px;" class="col-md-12 text-center">
                                                    <button type="submit" class=" btn btn-primary">Send Message</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="title-box-2 pt-4 pt-md-0">
                                        <h5 class="title-left">
                                            <a href="#"> Job Pulse</a>
                                        </h5>
                                    </div>
                                    <div class="more-info">
                                        <p style="color:black; font-weight:400" class="lead">
                                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint saepe fugiat distinctio modi debitis veniam officiis a sed itaque. Veniam ducimus totam inventore velit deserunt, provident in perspiciatis aspernatur eius cumque animi sunt dolor illo sit officiis incidunt nulla molestias! Exercitationem eligendi nulla commodi, laborum sit, similique nostrum eius iure omnis, quas harum. Laboriosam animi reiciendis quos in, sapiente assumenda ea nam impedit tempora ut soluta? Cum explicabo commodi praesentium alias, dolore rem labore cumque veritatis soluta quasi totam et? Cupiditate reprehenderit magnam labore quasi facilis magni accusamus quidem adipisci, laudantium commodi aperiam doloremque facere eos et explicabo aliquam dolorum.

                                        </p>
                                        <ul style="color:deepskyblue;" class="list-ico">
                                            <li><span class="bi bi-geo-alt"></span> <a href="https://maps.app.goo.gl/BAq9AYz4hYCpzAV2A" target="_blank">Gouripur-2270, Mymensingh, Bangladesh</a> </li>
                                            <li><span class="bi bi-phone"></span> <a href="#contact" >(+88) 01618-805636</a></li>
                                            <li><span  class="bi bi-envelope"> </span> <a href="http://surl.li/qyjsl" target="_blank">Email Our Support Team </a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463884.3930113939!2d90.11400733514607!3d24.723556102405393!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37564fbe84f6cbe1%3A0x9fdd8aa3d42ccc3e!2sMymensingh%20District!5e0!3m2!1sen!2sbd!4v1701713527032!5m2!1sen!2sbd" width="1300" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <br> <br>
        </div>
    </section>

    <!-- End Contact Section -->

@endsection
