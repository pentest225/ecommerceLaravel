@extends('admin.body.main')
@section('main')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Brand </h3>
                
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
          
        
        <div class="col-md-12">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Add New Brand</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              <form  method="POST" action="{{route('brand.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                <input type="hidden" name="brand_old_image" value="{{ $brand->brand_image }}">
                <div class="form-group">
                  <h5>Brand name fransh<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="brand_name_fr" class="form-control" id="brand_name_fr" 
                          data-validation-required-message="This field is required" value="{{ $brand->brand_name_fr }}" >

                          @error('brand_name_fr')
                            <span class="" role="alert">
                              <strong class="text text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                      <div class="help-block">
                      </div>
                  </div>
                  <div class="form-group">
                    <h5>Brand name english<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="brand_name_en" class="form-control" id="brand_name_en"  
                            data-validation-required-message="This field is required" value="{{ $brand->brand_name_en }}">
                        <div class="help-block">
                        </div>
                    </div>
                    <div >
                      <div class="form-group">
                        <h5>Brand Image<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="brand_image" class="form-control" id="brand_image" 
                                data-validation-required-message="This field is required" >
                            <div class="help-block">
                            </div>
                        </div>  
                    </div>

                      <button type="submit" class="btn btn-rounded btn-primary mb-5">Update Brand</button>

              </form>
              

            </div>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->        
         </div>
        <!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
@endsection