<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thanhpho;
use App\Models\Quanhuyen;
use App\Models\Xaphuong;
use App\Models\UploadImg;
use App\Models\TitleModel;
use Carbon\Carbon;

class DemoCode extends Controller
{
    public function index()
    {
        $list_thanhpho = Thanhpho::all();
        return view('index', [
            'thanhpho'=>$list_thanhpho,
        ]);
    }
    public function get_select(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="thanhpho"){
                $select_quanhuyen = Quanhuyen::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                    $output.='<option>chọn quận huyện</option>';
                foreach($select_quanhuyen as $quanhuyen){
                    $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name.'</option>';
                }
            }else{
                $select_xaphuong = Xaphuong::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                    $output.='<option>chọn xã phường</option>';
                foreach($select_xaphuong as $xaphuong){
                    $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name.'</option>';
                } 
            }
        }
        echo $output;
    }
    public function index_upload_multi()
    {
        $list_data = UploadImg::All();
        return view('upload', [
            'listdata'=>$list_data,
        ]);
    }
    public function upload_multi(Request $request)
    {   
        $data = $request->all();
        // check file & đặt lại tên file
        $json_hinhanh = '';
        if($request->hasFile('hinhanh'))
        {
            $array_hinhanh = array();
            $inputfile = $request->file('hinhanh');
                foreach($inputfile as $file_hinhanh)
                {
                    $file_name = "hinhanh-" . date("mdH") . rand(0, 99);
                    array_push($array_hinhanh, $file_name);
                    $file_hinhanh->move('upload/hinhanh', $file_name);
                }
                $json_hinhanh = json_encode($array_hinhanh, JSON_FORCE_OBJECT);
        }
        else{
            $array_hinhanh[] = "Error";
            $json_hinhanh = json_encode($array_hinhanh, JSON_FORCE_OBJECT);
        }
        // dd($json_hinhanh);
        
        $uploadhinh = new UploadImg();
        $uploadhinh->tieude = $request->txttitle;
        $uploadhinh->hinhanh = $json_hinhanh;
        $uploadhinh->save();
        return redirect('upload-multi');
    }
    public function indextime()
    {
        $time_now = Carbon::now('Asia/Ho_Chi_Minh');
        $title_load = TitleModel::all();
        return view('indextime', [
            'load_all_data'=>$title_load,
            'time_now'=>$time_now,
        ]);
    }
    public function post_title_time(Request $request)
    {
        $title = new TitleModel();

        $title->title = $request->title;
        $title->ngaybatdau = $request->ngaybatdau;
        $title->ngayketthuc = $request->ngayketthuc;

        $title->save();
        return redirect('time');
    }
}
