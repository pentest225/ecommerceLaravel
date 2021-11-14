@extends('admin.body.main')
@section('main')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Brand List </h3>
                <div class="d-inline-block align-items-center">
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                            <li class="breadcrumb-item" aria-current="page">Tables</li>
                            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        

        <div class="col-md-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Brand En</th>
                            <th>Brand Fr</th>
                            <th>Image</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $item)                        
                        <tr>
                            <td>{{ $item->brand_name_en }}</td>
                            <td>{{ $item->brand_name_fr }}</td>
                            <td><img src="{{ url($item->brand_image) }}" alt="{{ $item->brand_name_en }}" style="width:70px; height:50px;"></td>
                            <td>
                                <a href="{{ route('brand.edit',$item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('brand.delete') }}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->        
        </div>
        <div class="col-md-4">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Add New Brand</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              <form  method="POST" action="{{route('brand.store')}}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <h5>Brand name fransh<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="brand_name_fr" class="form-control" id="brand_name_fr" 
                          data-validation-required-message="This field is required">

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
                        <input type="text" name="brand_name_en" class="form-control" id="brand_name_fr"  
                            data-validation-required-message="This field is required">
                        <div class="help-block">
                        </div>
                    </div>
                    <div >
                      <div class="form-group">
                        <h5>Brand Image<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="file" name="brand_image" class="form-control" id="brand_image" 
                                data-validation-required-message="This field is required">
                            <div class="help-block">
                            </div>
                        </div>  
                    </div>

                      <button type="submit" class="btn btn-rounded btn-primary mb-5">Add Brand</button>

              </form>
              

            </div>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->        
         </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>
@endsection