@extends('layouts.admin')

@section('header')
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">

      <!--Start Dashboard Content-->
      
      <div class="row mt-4">
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-quepal">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">2050</h4>
                <span class="text-white">Total Orders</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-basket-loaded text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-blooker">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">3250</h4>
                <span class="text-white">Total Expenses</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-wallet text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-scooter">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">87.5%</h4>
                <span class="text-white">Total Revenue</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-pie-chart text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-6 col-xl-3">
          <div class="card gradient-bloody">
            <div class="card-body p-4">
              <div class="media">
              <div class="media-body text-left">
                <h4 class="text-white">2550</h4>
                <span class="text-white">New Users</span>
              </div>
              <div class="align-self-center w-icon"><i class="icon-user text-white"></i></div>
            </div>
            </div>
          </div>
        </div>
      </div><!--End Row-->
      </div>
        </div>
@endsection

@section('footer')

@endsection