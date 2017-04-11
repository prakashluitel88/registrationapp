@extends('layouts.app')
@section('title') Gallery :: @parent @endsection
@section('content')
    <div class="row">
        <div class="page-header">
            <h2>Photo Upload Page</h2>
        </div>
    </div>

    <!-- ./ tabs -->
    @if (isset($photo))
        {!! Form::model($photo, array('url' => url('gallery/upload') . '/' . $photo->id, 'method' => 'put','id'=>'fupload','class' => 'bf', 'files'=> true)) !!}
    @else
        {!! Form::open(array('url' => url('gallery/upload'), 'method' => 'post', 'class' => 'bf','id'=>'fupload', 'files'=> true)) !!}
        @endif
                <!-- Tabs Content -->
        <div class="tab-content">
            <!-- General tab -->
            <div class="tab-pane active" id="tab-general">
                <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
                    {!! Form::label('name', trans("admin/modal.title"), array('class' => 'control-label')) !!}
                    <div class="controls">
                        {!! Form::text('name', null, array('class' => 'form-control')) !!}
                        <span class="help-block">{{ $errors->first('name', ':message') }}</span>
                    </div>
                </div>

                <div
                        class="form-group {{ $errors->has('image') ? 'error' : '' }}">
                    <div class="col-lg-12">
                        <label class="control-label" for="image">
                            {{ trans("admin/photo.picture") }}</label>
                        <input name="image" type="file" class="uploader" id="image" value="Upload"/>
                    </div>

                </div>
                <!-- ./ general tab -->
            </div>
            <!-- ./ tabs content -->

            <!-- Form Actions -->

            <div class="form-group">
                <div class="col-md-12">
                    <button type="reset" class="btn btn-sm btn-warning close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> {{
						trans("admin/modal.cancel") }}
                    </button>
                    <button type="reset" class="btn btn-sm btn-default">
                        <span class="glyphicon glyphicon-remove-circle"></span> {{
						trans("admin/modal.reset") }}
                    </button>
                    <button type="submit" class="btn btn-sm btn-success">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        @if	(isset($photo))
                            {{ trans("admin/modal.edit") }}
                        @else
                            {{trans("admin/modal.create") }}
                        @endif
                    </button>
                </div>
            </div>
            <!-- ./ form actions -->
            {!! Form::close() !!}
        </div>
@endsection