@extends('website.layouts.app')



@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Contact Us</h2>
                <ul>
                    <li><a href="{{ route('index') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>


    <section class="contact-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="contact-info">
                        <h3>Here to Help</h3>
                        <p>Have a question? You may find an answer in our <a href="#">FAQs</a>. But you can also
                            contact
                            us.</p>
                        <ul class="contact-list">
                            <li><i class='bx bx-map'></i> Location: <a href="#">Lebanon,chouf,dalhoun</a></li>
                            <li><i class='bx bx-phone-call'></i> Call Us: <a href="tel:+96171039605">+961 71 039605</a>
                            </li>
                            <li><i class='bx bx-envelope'></i> Email Us: <a href="mailto:mohamadmansour0288@gmail.com"><span
                                        class="__cf_email__">mohamadmansour0288@gmail.com</span></a>
                            </li>
                        </ul>
                        <h3>Opening Hours:</h3>
                        <ul class="opening-hours">
                            <li><span>Monday:</span> 8AM - 6AM</li>
                            <li><span>Tuesday:</span> 8AM - 6AM</li>
                            <li><span>Wednesday:</span> 8AM - 6AM</li>
                            <li><span>Thursday - Friday:</span> 8AM - 6AM</li>
                            <li><span>Sunday:</span> Closed</li>
                        </ul>
                        <h3>Follow Us:</h3>
                        <ul class="social">
                            <li><a href="#" target="_blank"><i class='bx bxl-facebook'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-twitter'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-instagram'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-linkedin'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-skype'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-pinterest-alt'></i></a></li>
                            <li><a href="#" target="_blank"><i class='bx bxl-youtube'></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="contact-form">
                        <h3>Drop Us A Line</h3>
                        <p>We're happy to answer any questions you have or provide you with an estimate. Just send us a
                            message in the form below with any questions you may have.</p>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Name <span>*</span></label>
                                        <input type="text" name="name" id="name" class="form-control" required
                                            data-error="Please enter your name" placeholder="Your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>Email <span>*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" required
                                            data-error="Please enter your email" placeholder="Your email address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Phone Number <span>*</span></label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            required data-error="Please enter your phone number"
                                            placeholder="Your phone number">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Your Message <span>*</span></label>
                                        <textarea name="message" id="message" cols="30" rows="5" required data-error="Please enter your message"
                                            class="form-control" placeholder="Write your message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">Send Message</button>
                                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13288.711924430354!2d35.468120299999995!3d33.626626900000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ee407ccd09933%3A0xc9c8f670f21e83e0!2sDalhoun!5e0!3m2!1sen!2slb!4v1696114063178!5m2!1sen!2slb"></iframe>
    </div>
@endsection
