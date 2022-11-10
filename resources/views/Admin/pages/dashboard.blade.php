@extends('layouts.admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper mt-5">
        <!-- Content Header (Page header) -->
        {{-- <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div> --}}
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $selectStudent->count() }}</h3>

                                <p>Etudiants</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $selectRental->count() }}</h3>

                                <p>Locateurs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-4 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $selectTeacher->count() }}</h3>

                                <p>Professeurs</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
                        </div>
                    </div>
                    <!-- ./col -->
                    {{-- <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    To Do List
                                </h3>

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                      {{$selectTodoList ->links('application.helpers.pagination')}}
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('store.todolist')}}" method="POST">
                                  @csrf
                                    <div class="row ml-1 mb-3">
                                        <input type="text" class="col-lg-8"
                                            style="border: solid 1px  #0a58ca ; border-radius: 5px;" name="text">
                                        <div class=" clearfix col-lg-4">
                                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                                        </div>
                                </form>
                            </div>
                            <ul class="todo-list" data-widget="todo-list">
                              @forelse ($selectTodoList as $todoList)

                                <li>
                                    <!-- drag handle -->
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <!-- checkbox -->
                                    {{-- <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div> --}}
                                    <!-- todo text -->
                                    <span class="text">{{$todoList->text}}</span>
                                        
                               
                                    <!-- Emphasis label -->
                                    {{-- <a href="" > <i class="fas fa-edit " style="color:#0a58ca"></i></a> --}}
                                    {{-- <a href=""> <i class="fas fa-trash ml-3" style="color:red"></i> </a> --}}
                                    {{-- <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small> --}}
                                    <!-- General tools such as edit or delete-->
                                    <div class="tools">
                                        {{-- <a href=""> <i class="fas fa-edit" style="color:#0a58ca"></i></a> --}}
                                        <a href="{{route('delete.todolist',$todoList->id)}}"> <i class="fas fa-trash" style="color:red"></i></a>
                                    </div>
                                </li>
                                @empty
                                        
                                @endforelse
                                {{-- <li>
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
                      <label for="todoCheck2"></label>
                    </div>
                    <span class="text">Make the theme responsive</span>
                    <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                    <div class="tools">
                      <i class="fas fa-edit"></i>
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li> --}}




                            </ul>
                        </div>
                        <!-- /.card-body -->
                        {{-- <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
              </div> --}}
                </div>
                <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

            <!-- Map card -->
            <div class="card bg-gradient-primary d-none">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-map-marker-alt mr-1"></i>
                        Visitors
                    </h3>
                    <!-- card tools -->
                    <div class="card-tools">
                        <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                            <i class="far fa-calendar-alt"></i>
                        </button>
                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <div class="card-body">
                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                </div>
                <!-- /.card-body-->
                <div class="card-footer bg-transparent">
                    <div class="row">
                        <div class="col-4 text-center">
                            <div id="sparkline-1"></div>
                            <div class="text-white">Visitors</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <div id="sparkline-2"></div>
                            <div class="text-white">Online</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <div id="sparkline-3"></div>
                            <div class="text-white">Sales</div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info d-none">
                <div class="card-header border-0">
                    <h3 class="card-title">
                        <i class="fas fa-th mr-1"></i>
                        Sales Graph
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <canvas class="chart" id="line-chart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
                <div class="card-footer bg-transparent">
                    <div class="row">
                        <div class="col-4 text-center">
                            <input type="text" class="knob" data-readonly="true" value="20" data-width="60"
                                data-height="60" data-fgColor="#39CCCC">

                            <div class="text-white">Etudiants</div>
                        </div>
                        <!-- ./col -->
                        <div class="col-4 text-center">
                            <input type="text" class="knob" data-readonly="true" value="50" data-width="60"
                                data-height="60" data-fgColor="#39CCCC">

                            <div class="text-white">Locateurs</div>
                        </div>
                        <!-- ./col -->

                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
                <div class="card-header border-0">

                    <h3 class="card-title">
                        <i class="far fa-calendar-alt"></i>
                        Calendar
                    </h3>
                    <!-- tools card -->
                    <div class="card-tools">
                        <!-- button with a dropdown -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"
                                data-offset="-52">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <a href="#" class="dropdown-item">Add new event</a>
                                <a href="#" class="dropdown-item">Clear events</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">View calendar</a>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body pt-0">
                    <!--The calendar -->
                    <div id="calendar" style="width: 100%"></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
