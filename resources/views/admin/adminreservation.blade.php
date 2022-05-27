@include("admin.header")
      
<div>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Reservations </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Tables</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
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
                            <th>Email</th>
                            <th>Phone</th>
                            <th>NumOfGuests</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->guest}}</td>
                            <td>{{$row->date}}</td>
                            <td>{{$row->time}}</td>
                            <td>{{$row->message}}</td>
                            
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
               