@extends('admin.body.main')
@section('main')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">SubCategory List </h3>
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
                            <th>Category </th>
                            <th>SubCategory name fr</th>
                            <th>SubCategory name en</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategories as $item)                        
                        <tr>
                            <td>{{ $item['category']['category_name_fr']}}</td>
                            <td>{{ $item->sub_category_name_fr }}</td>
                            <td>{{ $item->sub_category_name_en }}</td>
                            <td style="width:30%">
                                <a href="{{ route('sub.category.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('sub.category.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
               <h3 class="box-title">Add New SubCategorie</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              <form  method="POST" action="{{route('sub.category.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="category_id" id="select" required="" class="form-control" aria-invalid="false">
                            <option value="" selected>Select Your Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name_fr }}</option>
                            @endforeach
                            
                        </select>
                    <div class="help-block"></div></div>
                </div>
                <div class="form-group">
                  <h5>SubCategory name fransh<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="sub_category_name_fr" class="form-control" id="sub_category_name_fr" 
                          data-validation-required-message="This field is required">

                          @error('sub_category_name_fr')
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
                        <input type="text" name="sub_category_name_en" class="form-control" id="sub_category_name_en"  
                            data-validation-required-message="This field is required">
                            @error('sub_category_name_en')
                            <span class="" role="alert">
                              <strong class="text text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                        <div class="help-block">
                        </div>
                    </div>
                      <button type="submit" class="btn btn-rounded btn-primary mb-5">Add SubCategory</button>

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