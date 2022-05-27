@include("admin.header")

<div>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title"> FoodMenu </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <a href="{{url('/addfoodmenu')}}"><label class="badge badge-info">Insert</label></a>
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
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $row)
                  <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->description}}</td>
                    <td> <img src="foodimage/{{$row->image}}" alt="" > </td>
                    <td><a href='{{"/editfoods/$row->id"}}'><label class="badge badge-warning">Edit</label></a>&nbsp;&nbsp;&nbsp;
                    <a href='{{"/deletefoods/$row->id"}}' onclick="return confirm('Are you sure to remove this FoodItem ?')"><label class="badge badge-danger">Delete</label></a></td>  
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