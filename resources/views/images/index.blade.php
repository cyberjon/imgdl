<!DOCTYPE html>
    <head>
        <title>Image metadata</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.css" integrity="sha512-CJ5goVzT/8VLx0FE2KJwDxA7C6gVMkIGKDx31a84D7P4V3lOVJlGUhC2mEqmMHOFotYv4O0nqAOD0sEzsaLMBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.17/sweetalert2.min.js" integrity="sha512-Kyb4n9EVHqUml4QZsvtNk6NDNGO3+Ta1757DSJqpxe7uJlHX1dgpQ6Sk77OGoYA4zl7QXcOK1AlWf8P61lSLfQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    <body>
        <div class="container">
                <div class="col-md-10 col-md-offset-1">
                <h1>Image metadata</h1>
                
                <table class="table table-striped table-condensed table-bordered table-rounded">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th width="20%">Brand</th>
                                <th width="20%">Camera</th>
                                <th width="25%">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php for( $i = 0; $i < count( $images ); $i++ ) : ?>
                            <tr>
                                <td><?php echo $images[$i]['image_file']; ?></td>
                                <td><?php echo $images[$i]['brand']; ?></td>
                                <td><?php echo $images[$i]['camera']; ?></td>
                                <td><a class="show" href="#" data-id="<?php echo $images[$i]['id']; ?>">Details</a></td>
                            </tr>
                        <?php endfor; ?>
                        </tbody>
                </table>
                {{ $images->links(); }}
                </div>
        </div>
        <script>
        $(document).ready(function(){
            $('.show').click(function(){
                var id = $(this).attr('data-id');
                $.post("{{ url('/show') }}",
                {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
                function(data, status){
                    data = JSON.parse(data)[0];
                    console.log(data);
                    Swal.fire({
                        title: 'Click on the image to download it',
                        html: `
                        <a target="_blank" href="uploads/${data.image_file}"><img width="284" src="uploads/${data.image_file}"></a>
                        <table class="table table-striped table-condensed table-bordered table-rounded">
                            <thead>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Brand</td>
                                    <td>${data.brand}</td>
                                </tr>
                                <tr>
                                    <td>Camera</td>
                                    <td>${data.camera}</td>
                                </tr>
                                <tr>
                                    <td>Software</td>
                                    <td>${data.software}</td>
                                </tr>
                                <tr>
                                    <td>Size</td>
                                    <td>${data.size}</td>
                                </tr>
                                <tr>
                                    <td>Width</td>
                                    <td>${data.width}</td>
                                </tr>
                                <tr>
                                    <td>Height</td>
                                    <td>${data.height}</td>
                                </tr>
                                <tr>
                                    <td>Shutter Speed</td>
                                    <td>${data.shutter_speed}</td>
                                </tr>
                                <tr>
                                    <td>ISO</td>
                                    <td>${data.iso}</td>
                                </tr>
                                <tr>
                                    <td>Focal Length</td>
                                    <td>${data.focal_length}</td>
                                </tr>
                                <tr>
                                    <td>Lense</td>
                                    <td>${data.lens}</td>
                                </tr>
                            </tbody>
                        </table>`,
                        confirmButtonText: 'OK'
                    });
                });
            })
        });
        </script>
    </body>
</html>