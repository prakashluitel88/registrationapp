@extends('layouts.app')
@section('title') My Gallery :: @parent @endsection
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>My Gallery <i class="fa fa-smile-o" aria-hidden="true"></i></h2>
        </div></div>

    @if (!Auth::guest())
        @if(count($photoAlbums)>0)
            <div class="row">
                @foreach($photoAlbums as $item)
                    <h2>{{ucfirst($item->name)}}</h2>
                    <div class="col-sm-3">
                        <div class="row">
                            <a href="{{url('photo/'.$item->id.'')}}"
                               class="hover-effect">
                                @if($item->album_image!="")
                                    <img class="col-sm-12"
                                         src="{!! url('appfiles/photoalbum/'.$item->folder_id.'/'.$item->album_image) !!}">
                                @elseif($item->album_image_first!="")
                                    <img class="col-sm-12"
                                         src="{!! url('appfiles/photoalbum/'.$item->folder_id.'/'.$item->album_image_first) !!}">
                                @else
                                    <img class="col-sm-12" src="{!! url('appfiles/photoalbum/no_photo.png') !!}">
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @endif

@endsection

