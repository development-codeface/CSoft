@extends('layouts.admin')

@section('header')
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Menu Edit</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">DashBoard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
         </ol>
	   </div>
     
     </div>
     <div class="row">
        <div class="col-lg-12">
   
        <hr>
          <div class="card">
            <div class="card-body">
              <form id="ajaxForm">
                <h4 class="form-header text-uppercase">
                  <i class="fa fa-user-circle-o"></i>
                  Menu Edit
                </h4>
                <div class="form-group row">
                  <label for="input-18" class="col-sm-2 col-form-label"> Menu</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control form-control-square" name="menu_name" @if(!empty($menu)) value="{{ $menu->menu_name }}" @endif>
                  </div>
                </div>
               
                </div>
                
                <div class="form-footer">
                <input type="hidden" name="type" value="newMenu">
                        @if(!empty($menu))
                      <input type="hidden" name="menu_id" value="{{$menu->menu_id}}">
                      @endif
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-danger shadow-danger m-1"><i class="fa fa-times"></i> CANCEL</button>
                    <button type="submit" class="btn btn-success shadow-success m-1"><i class="fa fa-check-square-o"></i> SAVE</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div><!--End Row-->
      </div>
        </div>
@endsection

@section('footer')
<script>
        $(document).ready(function() {

            $("#ajaxForm").validate({
                rules: {
                    menu_name: {
                        required:true,
                        // remote: {
                        //     url: '{{ URL::route("Validation") }}',
                        //     type: "post",
                        //     data: {_token:'{{ csrf_token() }}',type:'menu', @if(!empty($menu))menu_id:'{{$menu->menu_id}}'@endif},
                        // }
                    },
                },
                errorPlacement: function (error, element) {
                    console.log(element.attr('name'));
                    $(error).insertAfter(element);
                },
                submitHandler: function (form) {
                    var formData = $("#ajaxForm").serialize();
                    $("#messageModalBody").html("Your formhas been successfully submitting...");
                    $('#messageModal').modal('show');
                    $.ajax({
                        type: 'post',
                        url: '{{ URL::route("postData") }}',
                        data: formData,
                        success: function(data){
                            $("#messageModalBody").html("Your form has been successfully submited, you are now being redirected ...");
                            $('#messageModal').modal('show');
                            setInterval(function () {
                                window.location.href = '{{ URL::route("Menus") }}';
                            }, 1500);
                        }
                    });
                    return false;
                }
            });
        });
    </script>

@endsection