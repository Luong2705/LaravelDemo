@extends('layout.index') 
@section('content') 
 <!-- Page Content -->
 <div class="container">

  {{-- @include('layout.slide') --}}

    <div class="space20"></div>


    <div class="row main-left">
       
        @include('layout.menu')
        <div class="col-md-9">
            <div class="panel panel-default">            
                <div class="panel-heading" style="background-color:#337AB7; color:white;" >
<<<<<<< HEAD
                    <h2 style="margin-top:0px; margin-bottom:0px;">Laravel </h2>
=======
                    <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
>>>>>>> Luong
                </div>

                <div class="panel-body">
                    @foreach($theloai as $tl)
                    @if(count($tl->loaitin)>0)
                    <!-- item -->
                    <div class="row-item row">
                        <h3>
                            <a href="category.html">{{$tl->Ten}}</a> | 	
                            @foreach($tl->loaitin as $lt)
                            <small><a href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
                            @endforeach
                        </h3>
                        <?php
                            $data = $tl->tintuc->where('NoiBat',1)->sortByDesc('created_at')->take(5);
                            $tin1 = $data->shift();
                        ?>
                        @if(isset($tin1))
                        <div class="col-md-8 border-right">
                            <div class="col-md-5">
                                <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                    <img style="width:200px; height:150px" class="img-responsive" src="upload/tintuc/{{$tin1['Hinh']}}" alt="">
                                </a>
                            </div>

                            <div class="col-md-7">
                                <a href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">
                                    <h3>{{$tin1['TieuDe']}}</h3>
                                </a>
                                
                                <p>{!!$tin1['TomTat']!!}</p>
                                <a class="btn btn-primary" href="tintuc/{{$tin1['id']}}/{{$tin1['TieuDeKhongDau']}}.html">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>

                        </div>
                        @endif
                        

                        <div class="col-md-4">
                            @foreach($data->all() as $tintuc)
<<<<<<< HEAD
<div>
 			<div class="col-md-5">
                                <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
                                    <img style="width:80px; height:40px" class="img-responsive" src="upload/tintuc/{{$tintuc['Hinh']}}" alt="">
                                </a>
                            </div>
<div class="col-md-5" style="padding:0px">
                            <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
                                <h4 style="margin-top:0px; width:150px">
                                    {{$tintuc['TieuDe']}}
                                </h4>
                            </a></div>
</div>

=======
                            <a href="tintuc/{{$tintuc['id']}}/{{$tintuc['TieuDeKhongDau']}}.html">
                                <h4>
                                    <span class="glyphicon glyphicon-list-alt"></span>
                                    {{$tintuc['TieuDe']}}
                                </h4>
                            </a>
>>>>>>> Luong
                            @endforeach
                        </div>
                        
                        <div class="break"></div>
                    </div>
<<<<<<< HEAD
                  
=======
                    <!-- end item -->
>>>>>>> Luong
                    @endif
                   @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- end Page Content -->
@endsection


