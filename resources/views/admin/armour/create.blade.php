@extends('layouts.admin')

@section('header')
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumb-->
     <div class="row pt-2 pb-2">
        <div class="col-sm-9">
		    <h4 class="page-title">Menus</h4>
		    <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javaScript:void();">DashBoard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
         </ol>
	   </div>

     </div>
     <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <form class="form-bordered" id="ajaxForm">
                
             
                <div class="form-group row">
                  <label for="input-5" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-5" name="title">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="input-5" class="col-sm-2 col-form-label">Sub Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input-5" name="sub_title">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="input-9" class="col-sm-2 col-form-label">Content</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" rows="4" id="input-9" name="content" ></textarea>
                  </div>
                </div>
               
               
                <div class="form-footer">
                    <button type="submit" class="btn btn-danger shadow-danger m-1"><i class="fa fa-times"></i> CANCEL</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="type"   value="newArmour"/>
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
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $(document).ready(function(){
            $('#menu_id').change(function() {
                var optionSelected = $(this).val();

                if (optionSelected == 3) {
                    $( ".Image" ).addClass('hidden')
                    $( ".servictype" ).removeClass('hidden')
                }
            });
            $('textarea').ckeditor();

            var token = '{{ csrf_token() }}';

            var url = '{{ URL::route("PostImageUpload") }}';


            $('#Image').fileupload({

                url: url,
                dataType: 'json',
                formData : {_token:token},
                add: function (e, data) {
                    var fileType = data.files[0].name.split('.').pop(), allowdtypes = 'jpg,jpeg,png,gif';


                    if (allowdtypes.indexOf(fileType) < 0) {
                        alert('Sorry,JPG PNG GIF are allowed.');
                        return false;
                    }

                    if( data.files[0]['size'] > 1000000) { //10MB
                        alert('Filesize is too big');
                        return false;
                    }
                    data.submit();
                },progressall: function (e, data) {
                    $("#progress").show();

                    var progress = parseInt(data.loaded / data.total * 100, 10);

                    $('#progress .progress-bar').css('width',progress + '%');
                },
                done: function (e, data) {
                    $.each(data.result.files, function (index, file) {
                        var url = "";

                        if(file.type == "image/jpeg" || file.type == "image/jpg" || file.type == "image/png" || file.type == "image/gif" ){
                            var urlRoute = "{{ asset('data/temp/') }}/";

                            url = "<img src='"+urlRoute+file.name+"' style='max-width: 50px;'/>";
                        }
                        var html = '<tr ><td><a href="#" class="fancybox-button" data-rel="fancybox-button">'+url+'<input type="hidden" name="fileURLs[]" value="'+file.name+'"  /></td><td><a href="javascript:;" class="btn default btn-sm removeImage"  id=""><i class="fa fa-times"></i> Remove </a> </td> </tr>';
                        $('#ImagePrevs').append(html);
                    });

                    $("#progress").hide();
                    var $ImagePrevs = $('#ImagePrevs');

                },


            }).prop('disabled', !$.support.fileInput)
                    .parent().addClass($.support.fileInput ? undefined : 'disabled');
            $('body').on('click', '.removeImage', function () {

                $(this).parent().parent().remove();

            });

            $("#ajaxForm").validate({
                rules: {
                    menu_id: {
                        required: true,
                    },content: {
                        required: true,
                    },files: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Please enter  name ",
                    }
                },
                errorPlacement: function(error, element) {
                    console.log(element.attr('name'));
                    $( error ).insertAfter( element);
                },
                submitHandler: function(form) {

                    // do other things for a valid form
                    var formData = $("#ajaxForm").serialize();
                    $("#messageModalBody").html("Your formhas been successfully submitting...");
                    $('#messageModal').modal('show');
                    $.ajax({
                        type: 'post',
                        url: "{{ URL::route('postData') }}",
                        data:formData,
                        success: function(data){
                            setInterval(function(){
                                $("#messageModalBody").html("Your form has been successfully submited, you are now being redirected ...");
                                $('#messageModal').modal('show');
                               // window.location.href="{{URL::route('AdminTestimonial')}}";
                            }, 1500);

                        }
                    });
                    return false;
                }
            });
        });
        function removeImage(id){

            var type = 'removeImage';
            var id = id;


            $.ajax({

                type:'post',

                url:"{{ URL::route('PostRemove') }}",

                data:{id:id,_token: '{{ csrf_token() }}',type:type},

                success:function(data){

                    if(data.status==1){

                        $("#ImagePrevs").addClass('hidden');

                    }

                }

            });

        }
    </script>
@endsection