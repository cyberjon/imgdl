<html>
   <body>
    <?php
        echo Form::open(array('url' => '/download','files'=>'true'));
        echo 'Select the file to upload.';
        echo Form::text('url', '', ['required']);
        echo Form::submit('Download File');
        echo Form::close();
    ?>
    </body>
</html> 