@extends('layouts.main')
@section('content')
    <div class="container">
        <?php
            echo Form::open(array('url' => '/upload','files'=>'true'));
            echo 'Select the file to upload.';
            echo Form::file('image', ['required']);
            echo Form::submit('Upload Image', ['class' => 'btn btn-primary']);
            echo Form::close();
        ?>
    </div>
@endsection   