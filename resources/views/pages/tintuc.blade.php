@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1>{{$tintuc->TieuDe}}</h1>

              
                <!-- Preview Image -->
                <img class="img-responsive" src="upload/tintuc/{{$tintuc->Hinh}}" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span>Posted on: {{$tintuc->created_at}}</p>
                <hr>

                <!-- Post Content -->
                <p class="lead">
                    {!! $tintuc->NoiDung !!}

                </p>
                <hr>
               
                <!-- Blog Comments -->

                <!-- Comments Form -->
            </div>
            <hr>
                   
            <div class="col-lg-9" style="width: 1040px">

                <div class="panel panel-default" style="border:none">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tt)
                        <div class="row" style="margin-left: 10px; margin-right: 10px; float: left; width: 300px">
                            <div class="row-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img style="width: 300px; height: 300px" class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="row-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p>{!!$tt->TomTat!!}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>
            </div>
                    
            <div class="col-lg-9">
                @if(Auth::check())
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form action="comment/{{$tintuc->id}}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="NoiDung" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>
                @endif

                <!-- Posted Comments -->
                 <!-- Comment -->
                @foreach($tintuc->comment as $cm)
              
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$cm->user->name}}
                            <small>{{$cm->created_at}}</small>
                        </h4>
                        {{$cm->NoiDung}}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Blog Sidebar Widgets Column -->
           

        </div>
       
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection


 {{-- <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinlienquan as $tt)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p>{{$tt->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        <!-- end item -->
                        @endforeach
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($tinnoibat as $tt)
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}">
                                    <img class="img-responsive" src="upload/tintuc/{{$tt->Hinh}}" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html"><b>{{$tt->TieuDe}}</b></a>
                            </div>
                            <p>{{$tt->TomTat}}</p>
                            <div class="break"></div>
                        </div>
                        @endforeach
                        <!-- end item -->
                       
                    
                    </div>
                </div>
                
            </div> --}}