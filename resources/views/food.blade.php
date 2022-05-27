<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                    @if(session("msg"))
                    <div class="alert alert-success">{{session("msg")}}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
           
                @foreach($data as $row)
                <form action="{{url('/addcart',$row->id)}}" method="POST">
                    @csrf
                   
                    <div class="item">
                        <div class='card' style="background-image: url('/foodimage/{{$row->image}}');">
                            <div class="price">
                                <h6>{{$row->price}}</h6>
                            </div>
                            <div class='info'>
                                <h1 class='title'>{{$row->title}}</h1>
                                <p class='description'>{{$row->description}}</p>
                                <div class="main-text-button">
                                    <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                                </div>
                            </div>
                        </div>
                        <input type="number" name="quantity" min="1" value="1" style="width: 70%;">
                        <input type="submit" style="background-color: green; color: white;padding: 4px;border-radius: 3px;border-color: green;" value="Add Cart">
                    </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
</section>