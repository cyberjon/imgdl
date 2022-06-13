@extends('layouts.main')
@section('content')
    <div class="container">
        <?php
            echo Form::open(array('url' => '/download','files'=>'true'));
            echo 'Enter image URL to upload.';
            echo Form::text('url', '', ['required']);
            echo Form::submit('Save Image', ['class' => 'btn btn-primary']);
            echo Form::close();
        ?>
    </div>
@endsection