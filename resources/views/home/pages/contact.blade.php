@extends('home.layouts.app')

@section('content')
    <div class="container">
        <h2>Contact</h2>
        <div class="row">

            <div class="col-md-7 order-md-1 align-middle">
                <h2 class="featurette-heading">Send us a Message<br> <span class="text-muted"> </span></h2>
                <p>


                    <form name="sentMessage" id="contactForm">
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
            </div>
        </div>
        <div id="success"></div>
        <!-- For success/fail messages -->
        <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
        </form>

        <br>
        <br>
    </div>

    <div class="col-md-5 order-md-2">
        <img width="500" class="featurette-image img-fluid mx-auto" src="images/card.png" alt="Generic placeholder image">
        <br>
        <br>
        <h3>Contact Details</h3>
        <p>
            <strong>Today's Entrepreneur </strong>
            <br>Los Angeles, CA 90001
            <br>
            <strong>   (323) 703-5060</strong>
        </p>
        <p>
            <abbr title="Phone">Dial Show:</abbr>: (712) 432-3413 PIN 4947
            <br>Tuesdays: 8AM - 10AM (Pacific Standard Time)
        </p>

    </div>


    </div>

    </div>
@endsection
