@extends('admin.body.main')
@section('main')
<div class="container-full" id="app">
     

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add New Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
           <!-- Ligne 1 --> 
          <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Brand <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="brand_id" id="select" required class="form-control">
                            @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_name_fr }}</option>
                            @endforeach                            
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Prodcut Category <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="categorory_id" id="select" @change="getSubcat($event)" required class="form-control">
                            <option>Select yor product category</option>
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name_fr }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Sub Category<span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="subcategory_id" id="select" @change="getSubsubcat($event)" required class="form-control">
                            <option :value='item.id' v-for="item in subCatList" :key='item.id'>{% item.sub_category_name_fr %}</option>                            
                        </select>
                    </div>
                </div>
            </div>
          </div>
          <!-- fin ligne 1 -->
          <!-- ligne 2 -->
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Sub sub category <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="select" id="select" required class="form-control">
                            <option :value='item.id' v-for="item in subSubCatList" :key='item.id'>{% item.sub_subcategory_name_fr %}</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Name fr <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="text" class="form-control" > </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product name en <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="text" class="form-control" > </div>
                </div>
              </div>
          </div>
          <!-- fin ligne 2 -->
          <!-- ligne 3 -->
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Code <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="text" name="text" class="form-control" > </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product Quantity <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="number" name="text" class="form-control" > </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>File Input Field <span class="text-danger">*</span></h5>
					<div class="controls">
					<input type="file" name="file" class="form-control" required> </div>
                </div>
              </div>
          </div>
          <!-- fin ligne 3 -->
          <!-- ligne 4 -->
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product tags fr</h5>
                    <div class="controls">
                        <select multiple data-role="tagsinput">
                            <option value="Lorem">Lorem</option>
                            <option value="Ipsum">Ipsum</option>
                            <option value="Amet">Amet</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product tags en</h5>
                    <div class="controls">
                        <select multiple data-role="tagsinput">
                            <option value="Lorem">Lorem</option>
                            <option value="Ipsum">Ipsum</option>
                            <option value="Amet">Amet</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product size en</h5>
                    <div class="controls">
                        <select multiple data-role="tagsinput">
                            <option value="Lorem">Lorem</option>
                            <option value="Ipsum">Ipsum</option>
                            <option value="Amet">Amet</option>
                        </select>
                    </div>
                </div>
              </div>
          </div>
          <!-- fin ligne 4 -->
          <!-- ligne 5 -->
          <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product size en</h5>
                    <div class="controls">
                        <select multiple data-role="tagsinput">
                            <option value="Lorem">Lorem</option>
                            <option value="Ipsum">Ipsum</option>
                            <option value="Amet">Amet</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product colors fr</h5>
                    <div class="controls">
                        <select multiple data-role="tagsinput">
                            <option value="Lorem">Lorem</option>
                            <option value="Ipsum">Ipsum</option>
                            <option value="Amet">Amet</option>
                        </select>
                    </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                    <h5>Product colors en</h5>
                    <div class="controls">
                        <select multiple data-role="tagsinput">
                            <option value="Lorem">Lorem</option>
                            <option value="Ipsum">Ipsum</option>
                            <option value="Amet">Amet</option>
                        </select>
                    </div>
                </div>
              </div>
          </div>
          <!-- fin ligne 5 -->
          <!-- ligne 6 -->
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <h5>Selling Price <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="number" name="text" class="form-control" > </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <h5>Discont Price <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <input type="number" name="text" class="form-control" > </div>
                </div>
              </div>
             
          </div>
          <!-- fin ligne 6 -->
          <!-- ligne 7 -->
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <h5>Product Short description fr <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                    </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <h5>Product short description en <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <textarea name="textarea" id="textarea" class="form-control" required placeholder="Textarea text"></textarea>
                    </div>
                </div>
              </div>
          </div>

          <div class="row">
              <div class="col-md">
                <div class="form-group">
                    <h5>Product long description fr <span class="text-danger">*</span></h5>
                <textarea id="editor1" name="editor1" rows="10" cols="80">
                    description detaillee du produit 
                </textarea>
                </div>
              
              
          </div>
          <div class="row">
            <div class="col-md">
                <div class="form-group">
                    <h5>Product long description en <span class="text-danger">*</span></h5>
                <textarea id="editor2" name="editor2" rows="10" cols="80">
                    long produt descriptions
                </textarea>
                </div>
              </div>
          </div>

          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

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
    subCatList:[],
    subSubCatList:[]
  },
  methods: {
    getSubcat(event){
      let catId = event.target.value;
      let url = "http://127.0.0.1:8000/category/sub/cat/json/"+catId
      axios.get(url)
      .then(response => {
        this.subCatList = response.data;
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
    },
    getSubsubcat(event){
      let subatId = event.target.value;
      let url = "http://127.0.0.1:8000/category/sub/sub/cat/json/"+subatId
      axios.get(url)
      .then(response => {
        this.subSubCatList = response.data;
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