@include("admin.header")

          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Chef </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Forms</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                   
                    <form class="forms-sample" method="POST" action="{{url('/updatechef')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="hidden" class="form-control" id="" name="id" value="{{$record->id}}">
                        <input type="text" class="form-control" id=""   name="name"  value="{{$record->name}}">
                      </div>
                      <div class="form-group">
                        <label for="">Speciality</label>
                        <input type="text" class="form-control" id=""  name="speciality" value="{{$record->speciality}}">
                      </div>
                      
                      <div class="form-group">
                        <label for="">facebook Link</label>
                        <input type="link" class="form-control" id=""   name="fb_link" value="{{$record->facebooklink}}">
                      </div>
                      <div class="form-group">
                        <label for="">instagram Link</label>
                        <input type="link" class="form-control" id=""   name="in_link" value="{{$record->instalink}}">
                      </div>
                      <div class="form-group">
                        <label for="">twitterk Link</label>
                        <input type="link" class="form-control" id=""   name="tw_link" value="{{$record->twitterlink}}">
                      </div>
                      <div class="form-group">
                        <label for="">google Link</label>
                        <input type="link" class="form-control" id=""   name="gl_link" value="{{$record->googlelink}}">
                      </div>
                      <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" id=""  name="image">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
           
            </div>
          </div>
          <!-- content-wrapper ends -->
         @include("admin.footer")