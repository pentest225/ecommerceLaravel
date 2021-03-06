@extends('admin.body.main')
@section('main')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="container-full">


        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Admin Change Password </h4>
                    </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form  method="POST" action="{{route('admin.store.change_password')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Current Paasword<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="current_password" class="form-control" id="current_password" required="" 
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>New Password <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password" id="password" class="form-control" required="" 
                                                            data-validation-required-message="This field is required">
                                                        <div class="help-block">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Confirm Password  <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required="" 
                                                        data-validation-required-message="This field is required">
                                                    
                                                        <div class="help-block">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            
                                            

                                        </div>




                                    </div>

                                </div>

                                <button type="submit" class="btn btn-rounded btn-primary mb-5">Change Password</button>

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
