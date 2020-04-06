<?php

namespace App\Http\Controllers;

use App\BrokenRoads;
use App\DetailCoordinate;
use App\DetailDigitasi;
use App\DigitasiJalan;
use Illuminate\Http\Request;
use App\Quotation;
use Auth;
use Intervention\Image\Facades\Image as Image;

class BrokenRoadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function riwayatPengaduan(){
        $data = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude','status','tb_broken_road.created_at')
        ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        ->where('id_user',Auth::user()->id)
        ->orderBy('tb_broken_road.id','desc')
        ->get();
        return view('riwayatPengaduan',compact('data'));
    }

    public function getJalanPengaduan(){
        $k = BrokenRoads::select('jalan')->get();
        $data = DigitasiJalan::with('detailDigitasi')->whereIn('nama',$k)->get();
        return $data;
        // $roadData = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude')
        // ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        // ->where('tb_broken_road.status','0')
        // ->get();
        // return response()->json($roadData);
    }

    public function getDetailJalanPengaduan($jalan){
        $dataCount = BrokenRoads::where('jalan',$jalan)->where('status','0')->count();
        $dataJalan = BrokenRoads::with('detailCoordinate')->where('jalan','LIKE',$jalan)->where('status','0')->get();
        return response()->json(["jumlah"=>$dataCount, "data"=>$dataJalan]);
    }

    public function detailJalanPengaduan($jalan){
        $dataCountPengaduan = BrokenRoads::where('jalan',$jalan)->where('status','0')->count();
        $dataCountDiverifikasi = BrokenRoads::where('jalan',$jalan)->where('status','1')->count();
        $dataCountDiperbaiki = BrokenRoads::where('jalan',$jalan)->where('status','2')->count();
        $dataJalanPengaduan = BrokenRoads::with('detailCoordinate')->where('jalan',$jalan)->where('status','0')->get();
        $dataJalanDiverifikasi = BrokenRoads::with('detailCoordinate')->where('jalan',$jalan)->where('status','1')->get();
        $dataJalanDiperbaiki = BrokenRoads::with('detailCoordinate')->where('jalan',$jalan)->where('status','2')->get();
        $dataJalan = DigitasiJalan::where('nama',$jalan)->first();
        // return $dataJalanPengaduan;
        return view("road.index", compact("dataJalan","dataCountPengaduan","dataCountDiverifikasi","dataCountDiperbaiki","dataJalanPengaduan","dataJalanDiverifikasi","dataJalanDiperbaiki"));
    }


    public function getJalanTerverifikasi(){
        $data = BrokenRoads::with('detailCoordinate')->where('status','1')->get();
        return $data;
        // $roadData = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude')
        // ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        // ->where('tb_broken_road.status','1')
        // ->get();
        // return response()->json($roadData);
    }
    public function getDetailJalanTerverifikasi($jalan){
        $dataCount = BrokenRoads::where('jalan',$jalan)->where('status','1')->count();
        $dataJalan = BrokenRoads::with('detailCoordinate')->where('jalan',$jalan)->where('status','1')->get();
        return response()->json(["jumlah"=>$dataCount, "data"=>$dataJalan]);
    }

    public function getJalanDiperbaiki(){
        $data = BrokenRoads::with('detailCoordinate')->where('status','2')->get();
        return $data;
        // $roadData = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude')
        // ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        // ->where('tb_broken_road.status','2')
        // ->get();
        // return response()->json($roadData);
    }
    public function getDetailJalanDiperbaiki($jalan){
        $dataCount = BrokenRoads::where('jalan',$jalan)->where('status','2')->count();
        $dataJalan = BrokenRoads::with('detailCoordinate')->where('jalan',$jalan)->where('status','2')->get();
        return response()->json(["jumlah"=>$dataCount, "data"=>$dataJalan]);
    }
    

    public function mapPengaduan(){
        return view('map.mapPengaduan');
    }

    public function mapTerverifikasi(){
        return view('map.mapTerverifikasi');
    }

    public function mapDiperbaiki(){
        return view('map.mapDiperbaiki');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('road.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return redirect('/');
        
        $road = new BrokenRoads;
        $road->id_user = Auth::user()->id;
        $road->address = $request->address;
        $road->picture = $request->picture;
        $road->status = "0";
        $road->jalan = $request->jalan;
        $road->kecamatan = $request->kecamatan;
        $road->kota = $request->kota;
        $road->description = $request->description;

        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $name = preg_replace('/\s+/', '', $name);
                $small_image_path=public_path('images/small/'.$name);
                Image::make($image)->resize(300,300)->save($small_image_path);
                // $image->move(public_path().'/img/', $name);     
                $road->picture = $name;
            }
        }
        $road->save();

        $coordinate = new DetailCoordinate;
        $coordinate->id_road = $road->id;
        $coordinate->latitude = $request->latitude;
        $coordinate->longitude = $request->longitude;
        $coordinate->save();
        return redirect('/mapPengaduan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrokenRoads  $brokenRoads
     * @return \Illuminate\Http\Response
     */
    public function show(BrokenRoads $brokenRoads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrokenRoads  $brokenRoads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','jalan','kecamatan','kota','longitude','status','tb_broken_road.created_at')
        ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        ->where('tb_broken_road.id',$id)
        ->first();
        return view("road.edit",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrokenRoads  $brokenRoads
     * @return \Illuminate\Http\Response
     */
    public function updateJalan(Request $request, $id)
    {
        $road = BrokenRoads::find($id);
        $road->address = $request->address;
        $road->picture = $request->picture;
        $road->jalan = $request->jalan;
        $road->kecamatan = $request->kecamatan;
        $road->kota = $request->kota;
        $road->description = $request->description;
        if($request->hasfile('filename'))
        {
            foreach($request->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $small_image_path=public_path('images/small/'.$name);
                Image::make($image)->resize(300,300)->save($small_image_path);
                // $image->move(public_path().'/img/', $name);     
                $road->picture = $name;
            }
        }
        $road->save();

        $coordinate = DetailCoordinate::where('id_road',$id)->first();
        $coordinate->latitude = $request->latitude;
        $coordinate->longitude = $request->longitude;
        $coordinate->save();

        return redirect('/riwayatPengaduan');
    }

    public function update(Request $request, $id)
    {
        $jalan = BrokenRoads::find($id);
        $jalan->status = $request->status;
        $jalan->save();
        return redirect('admin/listPengaduan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrokenRoads  $brokenRoads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DetailCoordinate::where('id_road',$id)->delete();
        BrokenRoads::find($id)->delete();
        if(Auth::user()->user_role=="user"){
            return redirect('/riwayatPengaduan');
        }
        return redirect('/admin/listPengaduan');
    }

    public function listJalanRusak()
    {   
        $data = BrokenRoads::select('tb_broken_road.id','address','picture','description','status')
        // ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        ->join('tb_digitasi_jalan','tb_broken_road.jalan','LIKE','tb_digitasi_jalan.nama')
        ->where('tb_digitasi_jalan.id_admin',Auth::user()->id)
        ->orderBy('tb_broken_road.id','desc')
        ->get();

        
        // return $data;
        return view('admin.listJalanRusak',compact('data'));
    }

    public function searchMapTerverifikasi(Request $request){
        $output='';
      $query = $request->get('query');
      if($query != '')
      {
        $data = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude','status')
        ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        ->where('status','1')
        ->where('address','like','%'.$query.'%')
        ->get(); 
        $total_row = $data->count();
      }else{
        $output = '';
        $data = array(
            'table_data'  => $output,
            'total_data'  => 0
        );
     
        echo json_encode($data);
      }
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->address.'</td>
         <td>'.$row->description.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
       );
 
       echo json_encode($data);
    }

    public function searchMapPengaduan(Request $request){
        $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude','status')
        ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        ->where('status','0')
        ->where('address','like','%'.$query.'%')
        ->get(); 
        $total_row = $data->count();
      }else{
        $output = '';
        $data = array(
            'table_data'  => $output,
            'total_data'  => 0
        );
     
        echo json_encode($data);
      }
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->address.'</td>
         <td>'.$row->description.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
       );
 
       echo json_encode($data);
    }

    public function searchMapDiperbaiki(Request $request){
        $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = BrokenRoads::select('tb_broken_road.id','address','picture','description','latitude','longitude','status')
        ->join('tb_detail_coordinate','tb_broken_road.id','=','tb_detail_coordinate.id_road')
        ->where('status','2')
        ->where('address','like','%'.$query.'%')
        ->get(); 
        $total_row = $data->count();
      }else{
        $output = '';
        $data = array(
            'table_data'  => $output,
            'total_data'  => 0
        );
     
        echo json_encode($data);
      }
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->address.'</td>
         <td>'.$row->description.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
       );
 
       echo json_encode($data);
    }
}
