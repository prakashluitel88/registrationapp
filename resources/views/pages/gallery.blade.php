@extends('layouts.app')
@section('title') My Gallery :: @parent @endsection
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>My Gallery <i class="fa fa-smile-o" aria-hidden="true"></i> </h2>
        </div></div>
    <div class="row"></div> <i>Pictures used here are either clicked by me or rights taken from photographer.</i</div>

@if (!Auth::guest())
    @foreach($photoAlbums as $item)
        <div class="row">
            <?php
                $folder = "appfiles/photoalbum/" . $item->folder_id.'/';
                $images = glob($folder."*.*");
                ?>
                <h2>{{ucfirst($item->name)}}</h2>

                @foreach($images as $image)
                    <img height="300" width="300" class="col-sm-4" src="{{ $image }}" />
                @endforeach
        </div>
    @endforeach
    <br /><br />
@endif

@endsection

