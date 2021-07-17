
@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
@section('header','Dashboard')

@section('contents')

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{$alltickets}}</h3>

                <p>Total Tickets</p>
              </div>
              <div class="icon">
                <i class="ion-bag"></i>
              </div>
              <a href="{{ route('admin.alltickets') }}" class="small-box-footer">Go to Allticket tables <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$investigating}}<sup style="font-size: 20px">%</sup></h3>

                <p>Tickets under investigation</p>
              </div>
              <div class="icon">
                <i class="ion-android-search"></i>
              </div>
              <a href="{{ route('admin.investigating') }}" class="small-box-footer">Go to investigating tickets <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$resolved}}</h3>

                <p>Total tickets resolved</p>
              </div>
              <div class="icon">
                <i class="ion-android-checkmark-circle"></i>
              </div>
              <a href="{{ route('admin.resolved') }}" class="small-box-footer">Go to status resolved tickets <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$complaint}}</h3>

                <p>Total complaint tickets</p>
              </div>
              <div class="icon">
                <i class="ion-sad-outline"></i>
              </div>
              <a href="{{ route('admin.complaint') }}" class="small-box-footer">Go to complaint tickets <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$feedback}}</h3>

                <p>Total Feedback tickets</p>
              </div>
              <div class="icon">
                <i class="ion-chatbubbles"></i>
              </div>
              <a href="{{ route('admin.feedback') }}" class="small-box-footer">Go to feedback tickets <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{$remark}}</h3>

                <p>Total Remark tickets</p>
              </div>
              <div class="icon">
                <i class="ion-clipboard"></i>
              </div>
              <a href="{{ route('admin.remark') }}" class="small-box-footer"> Go to remark tickets<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$appeal}}</h3>

                <p>Total Appeal tickets</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('admin.appeal') }}" class="small-box-footer">Go to appeal tickets <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$review}}</h3>

                <p>Total Tickets that needs reviewing</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('admin.review') }}" class="small-box-footer">Go to review tickets<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-muted">
              <div class="inner">
                <h3>{{$nanony}}</h3>

                <p>Total Non Anonymous tickets</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('admin.non-anonymous') }}" class="small-box-footer">Go to non anonymous tickets <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$anony}}</h3>

                <p>Total Anonymous tickets</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('admin.anonymous') }}" class="small-box-footer"> Go to anonymous tickets<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

    
</section>
</section>


            <!-- /.card -->

  
@endsection