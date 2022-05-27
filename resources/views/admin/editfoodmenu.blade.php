@include("admin.header")
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Update Foodmenu </h3>
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
                   
                    <form class="forms-sample" method="POST" action="{{url('/updatefood')}}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label for="">Title</label>
                        <input type="hidden" name="id" class="form-control" value="{{ $record->id }}">
                        <input type="text" class="form-control" id="" style="color: white;background-color:grey;"  name="title" value="{{ $record->title }}">
                      </div>
                      <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="" style="color: white;background-color:grey;" name="price" value="{{ $record->price }}">
                      </div>
                      <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" id="" name="image" value="">
                        <img src='{{ url("/foodimage/$record->image") }}' height="150" width="150">
                      </div>
                      <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" class="form-control" >{{ $record->description }}</textarea>
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