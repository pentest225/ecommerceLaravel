@extends('admin.body.main')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">


        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Admin Profile</h4>
                    <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning"
                            href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form enctype="multipart/form-data" method="POST" action="{{route('admin.profile.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Email Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="email" name="email" class="form-control" required="" value="{{$editingData->email}}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Admin Username Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="name" class="form-control" required="" value="{{$editingData->name}}"
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>File Image Field <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file"  name="admin_image" class="form-control" required="" id="image">
                                                        <div class="help-block"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <img src="{{ !empty($editingData->profile_photo_path)?url('uplaod/admin_images/'.$editingData->profile_photo_path):url('upload/no_image.jpg') }}" alt="User Avatar" id="showImage"  style="height: 100px;width:100px" >
                                                </div>
                                            </div>

                                        </div>




                                    </div>

                                </div>

                                <button type="submit" class="btn btn-rounded btn-primary mb-5">Update</button>

                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#image").change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $("#showImage").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

    </script>

@endsection
