<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="assets/awesome/css/fontawesome-all.css">
	<link rel="stylesheet" href="assets/toast/toastr.min.css">
	<script src="assets/jquery.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/myjs.js"></script>
	<link rel="stylesheet" href="assets/selectize.default.css" data-theme="default">
	<script src="assets/js/fileinput/fileinput.js" type="text/javascript"></script>
	<script src="assets/js/fileinput/vi.js" type="text/javascript"></script>
	<link rel="stylesheet" href="assets/fileinput.css">
	<script src="assets/pgwslider/pgwslider.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="assets/pgwslider/pgwslider.min.css">
	<link rel="stylesheet" href="assets/bootstrap/bootstrap-select.min.css">
	<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	<script src="assets/bootstrap/bootstrap-select.min.js"></script>
    <title>Upload</title>
</head>
<body>
    <div class="">
            <div class="col-md-6">
                <form method="POST" action="{{ url('/upload-multi-img') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="comment">Tiêu đề:</label>
                        <div class="">
                        <input  type="text" class="form-control" name="txttitle">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comment">Thêm hình ảnh:</label>
                        <div class="file-loading">
                        <input id="format-file" type="file" class="file" name="hinhanh[]" multiple data-preview-file-type="any" data-upload-url="#">
                        </div>
                    </div>
                    <button class="btn btn-primary">Upload Ảnh</button>
                </form>
            </div>
            <div class="col-md-6">   
                <div class="form-group">
                    <label for="comment">Load hình ảnh:</label>
                    <div class="">
                        @foreach ($listdata as $data)
                            <span>{{ $data->tieude }}</span>
                            <?php 
                            $arrayimg = json_decode($data->hinhanh,true);
                            ?>
                            @foreach ($arrayimg as $img)
                            <div><img src="upload/hinhanh/<?php echo $img; ?>" width="30%" alt=""></div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/toast/toastr.min.js"></script>
    <script type="text/javascript">
        $('#format-file').fileinput({
          theme: 'fa',
          language: 'vi',
          showUpload: false,
          allowedFileExtensions: ['jpg', 'png', 'gif']
        });
    </script>
</body>
</html>