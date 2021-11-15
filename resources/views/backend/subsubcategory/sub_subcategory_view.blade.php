@extends('admin.body.main')
@section('main')
<div class="container-full" id="app">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="page-title">SubSubCategory List</h3>
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
                            <th>SubSubCategory name fr</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subsubcategories as $item)                        
                        <tr>
                            <td>{{ $item['category']['category_name_fr']}}</td>
                            <td>{{ $item['subcategory']['sub_category_name_fr'] }}</td>
                            <td>{{ $item->sub_subcategory_name_fr }}</td>
                            <td style="width:30%">
                                <a href="{{ route('sub.sub_category.edit',$item->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a href="{{ route('sub.sub_category.delete',$item->id) }}" class="btn btn-danger" id="delete"><i class="fa fa-trash"></i></a>
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
               <h3 class="box-title">Add New SubSubCategorie</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
              <form  method="POST" action="{{route('sub.sub_category.store')}}" >
                @csrf
                <div class="form-group">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="category_id" id="select" @change="getSuBcat($event)" required="" class="form-control" aria-invalid="false">
                            <option value="" selected>Select Your Category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name_fr }}</option>
                            @endforeach
                            
                        </select>
                    <div class="help-block"></div></div>
                </div>
                <div class="form-group">
                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="subcategory_id" id="select" required="" class="form-control" aria-invalid="false">
                            <option value="" selected>Select Your sub Category</option>
                                <option :value='item.id' v-for="item in subCatList" :key='item.id'>{% item.sub_category_name_fr %}</option>
                        </select>
                    <div class="help-block"></div></div>
                </div>
                <div class="form-group">
                  <h5>SubCategory name fransh<span class="text-danger">*</span></h5>
                  <div class="controls">
                      <input type="text" name="sub_subcategory_name_fr" class="form-control" id="sub_subcategory_name_fr" 
                          data-validation-required-message="This field is required">

                          @error('sub_category_name_fr')
                            <span class="" role="alert">
                              <strong class="text text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                      <div class="help-block">
                      </div>
                  </div>
                </div>
                  <div class="form-group">
                    <h5>SubSub Category name english<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="sub_subcategory_name_en" class="form-control" id="sub_subcategory_name_en"  
                            data-validation-required-message="This field is required">
                            @error('sub_subcategory_name_en')
                            <span class="" role="alert">
                              <strong class="text text-danger">{{ $message }}</strong>
                            </span>
                          @enderror
                        <div class="help-block">
                        </div>
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
  <script src="{{ asset('js/vue.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js"></script>
  <script>
  var app = new Vue({
  delimiters: ['{%', '%}'],
  el: '#app',
  data: {
    subCatList:[]
  },
  methods: {
    getSuBcat(event){
      let catId = event.target.value;
      let url = "http://127.0.0.1:8000/category/sub/sub/cat/json/"+catId
      axios.get(url)
      .then(response => {
        this.subCatList = response.data;
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
    }
  },
})
  </script>
@endsection