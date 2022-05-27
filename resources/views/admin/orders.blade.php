@include("admin.header")
      
<div>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Customer Orders </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <form action="{{url('/searchorder')}}" method="get">@csrf<input style="color: black;" type="text" name="search" placeholder="Search here"> <button class="btn btn-success">Search</button></form>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>FoodName</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->user_name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->foodname}}</td>
                            <td>{{$row->price}} Rs</td>
                            <td>{{$row->quantity}}</td>
                            <td>{{$row->quantity * $row->price}} Rs</td>
                           
                            
                          </tr>
                         @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
          </div>
</div>

@include("admin.footer")
               