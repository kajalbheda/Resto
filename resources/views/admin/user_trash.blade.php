@include("admin.header")
      
<div>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Trashed Users </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <a href="{{url('users')}}" class="btn btn-danger">Back to Users</a>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    @if(session("msg"))
                        <div class="alert alert-success">{{session("msg")}}</div>
                    @endif
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                          <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                          
                            <td><a href='{{"/forcedeleteusers/$row->id"}}' onclick="return confirm('Are you sure to Delete this user Permanently?')"><label class="badge badge-danger">Delete</label></a>
                            <a href='{{"/restoreuser/$row->id"}}'><label class="badge badge-danger">Restore</label></a></td>
                       
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
               