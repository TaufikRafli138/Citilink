<?php

namespace App\Http\Controllers;
use Validator;
use App\Models\User;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index_by_id($id){
        $data_user = User::find($id);   
        return response()->json($data_user, 200);
    }
    
    public function update_data( Request $request, $id){
        // $item = User::findOrFail($id);
        // $item->update($request->all());
        // $input = $request->all();
        $data_user = User::find($id);   
        $data_user->NIK = $request->NIK;
        $data_user->Nama = $request->Nama;
        $data_user->Gender = $request->Gender;
        $data_user->Alamat = $request->Alamat;
        $data_user->save();
        return response()->json($data_user, 200);    
    }

    public function Delete_data($id){
        $record = User::findOrFail($id);
        // dd($NIK);
        // $record = User::where('id','=',$id)->first();
        // dd($record);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Record deleted successfully']);   
    }
    
    public function index_tampil_User(){
        $items = User::all();
        return response()->json($items, 200);
    }

    public function Tambah_User(Request $request){
        $item = User::create($request->all());
        return response()->json($item, 201);
    }
}
