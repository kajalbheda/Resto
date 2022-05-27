<section class="section" id="chefs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4 text-center">
                <div class="section-heading">
                    <h6>Our Chefs</h6>
                    <h2>We offer the best ingredients for you</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($chefdata as $cd)
            <div class="col-lg-4">
                <div class="chef-item">
                    <div class="thumb">
                        <div class="overlay"></div>
                        <ul class="social-icons">
                            @if($cd->facebooklink)
                            <li> <a href="{{$cd->facebooklink}}"><i class="fa fa-facebook"></i></a></li>
                            @endif

                            @if($cd->twitterlink)
                            <li><a href="{{$cd->twitterlink}}"><i class="fa fa-twitter"></i></a></li>
                            @endif

                            @if($cd->instalink)
                            <li><a href="{{$cd->instalink}}"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            
                            @if($cd->googlelink)
                            <li><a href="{{$cd->googlelink}}"><i class="fa fa-google"></i></a></li>
                            @endif
                        </ul>
                        <img src="chefimages/{{$cd->image}}" alt="Chef #1">
                    </div>
                    <div class="down-content">
                        <h4>{{$cd->name}}</h4>
                        <span>{{$cd->speciality}}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>