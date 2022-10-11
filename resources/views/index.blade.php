<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Democode</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            * {
              outline: 0;
              font-family: sans-serif
            }
            body {
              background-color: #fafafa
            }
            span.msg,
            span.choose {
              color: #555;
              padding: 5px 0 10px;
              display: inherit
            }
            .container {
              width: 500px;
              margin: 50px auto 0;
              text-align: center
            }

            /*Styling Selectbox*/
            .dropdown {
              width: 300px;
              display: inline-block;
              background-color: #fff;
              border-radius: 2px;
              box-shadow: 0 0 2px rgb(204, 204, 204);
              transition: all .5s ease;
              position: relative;
              font-size: 14px;
              color: #474747;
              height: 100%;
              text-align: left
            }
            .dropdown .select {
                cursor: pointer;
                display: block;
                padding: 10px
            }
            .dropdown .select > i {
                font-size: 13px;
                color: #888;
                cursor: pointer;
                transition: all .3s ease-in-out;
                float: right;
                line-height: 20px
            }
            .dropdown:hover {
                box-shadow: 0 0 4px rgb(204, 204, 204)
            }
            .dropdown:active {
                background-color: #f8f8f8
            }
            .dropdown.active:hover,
            .dropdown.active {
                box-shadow: 0 0 4px rgb(204, 204, 204);
                border-radius: 2px 2px 0 0;
                background-color: #f8f8f8
            }
            .dropdown.active .select > i {
                transform: rotate(-90deg)
            }
            .dropdown .dropdown-menu {
                position: absolute;
                background-color: #fff;
                width: 100%;
                left: 0;
                margin-top: 1px;
                box-shadow: 0 1px 2px rgb(204, 204, 204);
                border-radius: 0 1px 2px 2px;
                overflow: hidden;
                display: none;
                max-height: 144px;
                overflow-y: auto;
                z-index: 9
            }
            .dropdown .dropdown-menu li {
                padding: 10px;
                transition: all .2s ease-in-out;
                cursor: pointer
            }
            .dropdown .dropdown-menu {
                padding: 0;
                list-style: none
            }
            .dropdown .dropdown-menu li:hover {
                background-color: #f2f2f2
            }
            .dropdown .dropdown-menu li:active {
                background-color: #e2e2e2
            }
        </style>
    </head>
    <body>

            <div class="container">
            <span class="choose">Select Option</span>
              <div class="dropdown">
                <form method="POST" action="{{url('/get-select')}}">
                    @csrf
                <div class="select">
                  <span><b>TỈNH THÀNH PHỐ</b></span>
                    <select class="form-select chon thanhpho" aria-label="Default select example" name="thanhpho" id="thanhpho">
                      <option selected>chọn tỉnh thành phố</option>
                      @foreach($thanhpho as $thanhpho)
                        <option value="{{ $thanhpho->matp }}">{{ $thanhpho->name }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="select">
                  <span><b>QUẬN HUYỆN</b></span>
                    <select class="form-select quanhuyen chon" aria-label="Default select example" name="quanhuyen" id="quanhuyen">
                      <option selected>chọn quận huyện</option>

                    </select>
                </div>

                <div class="select">
                  <span><b>XÃ PHƯỜNG THỊ TRẤN</b></span>
                    <select class="form-select xaphuong" aria-label="Default select example" name="xaphuong" id="xaphuong">
                      <option selected>chọn xã phường</option>

                    </select>
                </div>
                </form>
              </div>
          <span class="msg"></span>
          <button type="button" class="btn btn-primary add_data" name="add_data">Thêm</button>
                <a href="/upload-multi" class="btn btn-primary add_data">Upload</a>
                <a href="/time" class="btn btn-primary add_data">Time</a>
                <a href="/message/chat" class="btn btn-success add_data">Chat Realtime</a>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                $('.chon').on('change',function(){
                    var action = $(this).attr('id');
                    var ma_id = $(this).val();
                    var _token = $('input[name="_token"]').val();
                    var result = '';
                    // alert(action);
                    //  alert(ma_id);
                    //   alert(token);
                    if (action=='thanhpho') {
                        result = 'quanhuyen';
                    }else {
                        result = 'xaphuong';
                    }

                    $.ajax({
                        url: '{{url('/get-select')}}',
                        method: 'POST',
                        data:{action:action,ma_id:ma_id,_token:_token},
                        success:function(data)
                        {
                            $('#'+result).html(data);
                        }
                    });
                });
            })

        </script>
</html>

