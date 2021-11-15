@extends('admin.body.main')
@section('main')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit Categorie </h3>
                
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
          
        
        <div class="col-md-12">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Add New Categorie</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              <form  method="POST" action="{{route('category.update')}}" >
                @csrf
                <input type="hidden" name="category_id" value="{{ $category->id }}">
                <div class="form-group">
                  <h5>Category name fransh<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="category_name_fr" class="form-control" id="category_name_fr" 
                          data-validation-required-message="This field is required" value="{{ $category->category_name_fr }}" >

                          @error('category_name_fr')
                            <span class="" role="alert">
                              <strong class="text text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                      <div class="help-block">
                      </div>
                  </div>
                  <div class="form-group">
                    <h5>Category name english<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="category_name_en" class="form-control" id="category_name_en"  
                            data-validation-required-message="This field is required" value="{{ $category->category_name_en }}">
                        <div class="help-block">
                        </div>
                    </div>
                    <div >
                      <div class="form-group">
                        <h5>Category Icon<span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="text" name="category_icon" class="form-control" id="category_icon" 
                                data-validation-required-message="This field is required" value="{{ $category->category_icon }}">
                            <div class="help-block">
                            </div>
                        </div>  
                    </div>

                      <button type="submit" class="btn btn-rounded btn-primary mb-5">Update Category</button>

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