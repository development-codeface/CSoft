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
    <!-- End Breadcrumb-->
      <div class="row">
      <div class="box-header">
        <h3 class="box-title"><a href="{{ URL::route('NewMenu') }}"  class="btn btn-info">Create New </a></h3>
           </div>
        <div class="col-lg-12">
          
                        <!-- /.box-header -->
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i>Menus</div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="default-datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sl No</th>
                        <th>Menu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i =1 ?>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $i}}</td>
                        <td>{{$menu->menu_name}}</td>
                        <td>
                            <span class="tools">
                                <a  class="btn btn-default btn-xs " href="{{ URL::route("NewMenu", $menu->menu_id ) }}"><i class="fa fa-pencil"></i></a>
                            </span>
                            </td>
                    </tr>
                    <?php $i ++; ?>
                   @endforeach
                   
                </tbody>
                
            </table>
            </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
@endsection

@section('footer')
@endsection