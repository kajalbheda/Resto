
<style >
label.error {
color: red;
}
</style>

<section class="section" id="reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-text-content">
                    <div class="section-heading">
                        <h6>Contact Us</h6>
                        <h2>Here You Can Make A Reservation Or Just walkin to our cafe</h2>
                    </div>
                    <p>Donec pretium est orci, non vulputate arcu hendrerit a. Fusce a eleifend riqsie, namei sollicitudin urna diam, sed commodo purus porta ut.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="phone">
                                <i class="fa fa-phone"></i>
                                <h4>Phone Numbers</h4>
                                <span><a href="#">080-090-0990</a><br><a href="#">080-090-0880</a></span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="message">
                                <i class="fa fa-envelope"></i>
                                <h4>Emails</h4>
                                <span><a href="#">hello@company.com</a><br><a href="#">info@company.com</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                @if(session('msg'))
                <div class="alert alert-success">{{session('msg')}}</div>
                @endif
                <div class="contact-form">
                    <form id="contact" action="{{url('reservation')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <h4>Table Reservation</h4>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Your Name*" value="{{ old('fnm') }}">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email Address" value="{{ old('email') }}">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </fieldset>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <fieldset>
                                    <input name="phone" type="text" id="phone" placeholder="Phone Number*" value="{{ old('phone') }}">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="number" name="guest" placeholder="Number of Guests" value="{{ old('guest') }}">
                                <span class="text-danger">{{ $errors->first('guest') }}</span>
                            </div>
                            <div class="col-lg-6">
                                <div id="filterDate2">
                                    <div class="input-group date" data-date-format="dd/mm/yyyy">
                                        <input name="date" id="date" type="text" class="form-control" placeholder="dd/mm/yyyy" value="{{ old('date') }}">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <span class="text-danger">{{ $errors->first('date') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="time" name="time">
                                <span class="text-danger">{{ $errors->first('time') }}</span>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Message"></textarea>
                                    
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-button-icon">Make A Reservation</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#contact").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 3,
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true,
                    maxlength: 12,
                },
                guest: {
                    required: true,
                    number: true,
                },
                date: {
                    required: true,
                    
                },
                time: {
                    required: true,
                  
                },
            },
            messages: {
                name: {
                    required: 'Name is required'
                },
                email: {
                    required: 'Email is required'
                },
                phone: {
                    required: 'Phone number is required'
                },
                guest: {
                    required: 'Please enter number of guests'
                },
                date: {
                    required: 'Date is required please enter date'
                },
                time: {
                    required: 'Time is required'
                },
            }
        });
    });
</script>