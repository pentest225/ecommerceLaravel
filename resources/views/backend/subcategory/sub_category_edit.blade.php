@extends('admin.body.main')
@section('main')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">Edit SubCategorie </h3>
                
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
          
        
        <div class="col-md-12">

          <div class="box">
             <div class="box-header with-border">
               <h3 class="box-title">Edit New SubCategorie</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              <form  method="POST" action="{{route('sub.category.update')}}" >
                @csrf
                <input type="hidden" name="sub_category_id" value="{{ $subcategory->sub_category_id }}">
                  
                <div class="form-group">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="category_id" required="" class="form-control" aria-invalid="false">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}" selected="{{ ($subcategory->category_id == $item->id)?'selected':''}}">{{ $item->category_name_fr }}</option>
                            @endforeach
                            
                        </select>
                    <div class="help-block"></div></div>
                </div>

                <div class="form-group">

                  <h5>SubCategory name fransh<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="sub_category_name_fr" class="form-control" id="sub_category_name_fr" 
                          data-validation-required-message="This field is required" value="{{ $subcategory->sub_category_name_fr }}" >

                          @error('sub_category_name_fr')
                            <span class="" role="alert">
                              <strong class="text text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                      <div class="help-block">
                      </div>
                  </div>
                  <div class="form-group">
                    <h5>SubCategory name english<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="sub_category_name_en" class="form-control" id="sub_category_name_en"  
                            data-validation-required-message="This field is required" value="{{ $subcategory->sub_category_name_en }}">
                        <div class="help-block">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary mb-5">Update SubCategory</button>

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