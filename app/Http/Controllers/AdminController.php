<?php

namespace App\Http\Controllers;
use App\User;
use App\BrokenRoads;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function listPengguna(){
        $data = BrokenRoads::select(DB::raw('COALESCE(COUNT(id_user),0) as countPengaduan'), 'users.id','users.name','users.email','users.status')
            ->join('users','users.id','=','tb_broken_road.id_user')
            ->groupBy('users.id')
            ->get();
            return view('admin.listUser',compact('data'));
    }

    public function updateStatusPengguna($id){
        $user = User::find($id);
        if($user->status == "1"){
            $user->status = "0";
        }
        else{
            $user->status = "1";
        }
        $user->save();
        return redirect('/admin/listPengguna');
    }

}
