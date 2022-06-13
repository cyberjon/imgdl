@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <span class="pull-right">Total {{ $total_images }} Images</span>
            
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
                            <td><img style='width: 30px; height: 30px; object-fit: cover' src="uploads/<?php echo $images[$i]['image_file']; ?>"></td>
                            <td><?php echo $images[$i]['brand']; ?></td>
                            <td><?php echo $images[$i]['camera']; ?></td>
                            <td><a class="show" href="#" data-id="<?php echo $images[$i]['id']; ?>">Details</a></td>
                        </tr>
                    <?php endfor; ?>
                    </tbody>
            </table>
            {{ $images->appends(request()->input())->links() }}
        </div>
    </div>
@endsection
@section('scripts')
@parent
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
                Swal.fire({
                    title: 'Click on the image to download it',
                    html: `
                    <a target="_blank" href="uploads/${data.image_file}"><img style="height: 282px; object-fit: cover;" src="uploads/${data.image_file}"></a>
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
@endsection
    </body>
</html>