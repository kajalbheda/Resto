@include("admin.header")
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Add Foodmenu </h3>
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
                   
                    <form class="forms-sample" method="POST" action="uploadmenu" enctype="multipart/form-data" id="addfood">
                        @csrf
                      <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="" placeholder="Title"  name="title">
                      </div>
                      <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" class="form-control" id="" placeholder="Price" name="price">
                      </div>
                      <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" class="form-control" id=""  name="image">
                      </div>
                      <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="desc" class="form-control" ></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
           
            </div>
          </div>

          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#addfood").validate({
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
          <!-- content-wrapper ends -->
         @include("admin.footer")