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
        <div class="row" style="margin-top: 10px; margin-bottom: 10px">
            <div class="col-md-6">
                <div class="asks-first">
                    <div class="asks-first-info">
                        <h2>thời gian hiện tại ({{ date('H:i:s - d/m/Y',strtotime($time_now)) }})</h2>
                    </div>
                    <div class="asks-first-info">
                        <form method="post" action="{{ url('/post-title') }}">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày bắt đầu</label>
                                <input type="date" name="ngaybatdau" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="">Ngày kết thúc</label>
                                <input type="date" name="ngayketthuc" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="asks-first">
                    <div class="asks-first-info">
                        <h2>Loaddata</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thúc</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày update</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($load_all_data as $value)
                                <tr>
                                    <td>{{ $value->title_id }}</td>
                                    <td>{{ $value->title }}</td>
                                    <td>{{ date('d/m/Y',strtotime($value->ngaybatdau)) }}</td>
                                    <td>{{ date('d/m/Y',strtotime($value->ngayketthuc)) }}</td>
                                    <td>{{ date('d/m/Y - H:i:s',strtotime($value->created_at)) }}</td>
                                    <td>{{ date('d/m/Y - H:i:s',strtotime($value->updated_at)) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="asks-first-info">
                        
                    </div>
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