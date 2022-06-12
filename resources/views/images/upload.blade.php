<html>
   <body>
    <?php
        echo Form::open(array('url' => '/upload','files'=>'true'));
        echo 'Select the file to upload.';
        echo Form::file('image', ['required']);
        echo Form::submit('Upload File');
        echo Form::close();
    ?>
    </body>
</html>     