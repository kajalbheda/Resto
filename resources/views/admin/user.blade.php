@include("admin.header")
      
<div>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Users </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                <a href="{{url('users_trash')}}" class="btn btn-danger">GoToTrash</a>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-10 grid-margin stretch-card">
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
                            @if($row->usertype==0)
                            <td><a href='{{"/deleteusers/$row->id"}}' onclick="return confirm('Are you sure to move this user into trash?')"><label class="badge badge-danger del" >Trash</label></a></td>
                            @else
                                <td>Not Allowed</td>
                            @endif
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
<script>
$(document).ready(function(){
  $(".del").click(function(){
    if (!confirm("Do you want to delete?")){
      return false;
    }
  });
});
</script>
@include("admin.footer")
               