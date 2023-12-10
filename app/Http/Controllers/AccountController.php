<?php

namespace App\Http\Controllers;
use App\Models\AccountModel;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{

    public function login(Request $request){

        // FiX THIS ERROR =======================================4

        $credentials = $request->only('Username', 'Password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;
            return response()->json(['user' => $user, 'token' => $token], 200); 
        }
        
        return response()->json(['message' => 'Invalid credentials'], 401);

        
        // if(auth()->guard('users')->attempt(['Username' => request('Username'), 'Password' => request('Password')])){
        //     config(['auth.guards.api.provider' => 'users']);
        //     $user = User::select('users.*')->find(auth()->guard('users')->user()->id);
        //     $success =  $user;
        //     $success['token'] =  $user->createToken('MyApp',['user'])->accessToken; 

        //     return response()->json($success, 200);
        // }else{ 
        //     return response()->json(['error' => ['Email and Password are Wrong.']], 200);
        // }



    }
    public function Register(Request $request){
        $user = AccountModel::create([
            'Username' => $request->Username,
            'Password' =>bcrypt($request->Password),
            'NIK' => $request->NIK,
            'Role_id' => $request->Role_id,
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function logut(){
        
    }

    public function index_by_id($id){
        $data_user = AccountModel::find($id);   
        return response()->json($data_user, 200);
    }
    
    public function update_data( Request $request, $id){
        // $item = User::findOrFail($id);
        // $item->update($request->all());
        // $input = $request->all();
        $data_user = AccountModel::find($id);   
        $data_user->Username = $request->Username;
        $data_user->Password = $request->Password;
        $data_user->NIK = $request->NIK;
        $data_user->Role_id = $request->Role_id;
        $data_user->save();
        return response()->json($data_user, 200);    
    }

    public function Delete_data($id){
        $record = AccountModel::findOrFail($id);
        // dd($NIK);
        // $record = User::where('id','=',$id)->first();
        // dd($record);
        if (!$record) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $record->delete();
        return response()->json(['message' => 'Record deleted successfully']);   
    }
    
    public function index_Tambah_account(){
        $items = AccountModel::all();
        return response()->json($items, 200);
    }

    public function Tambah_Account(Request $request){
        $item = AccountModel::create($request->all());
        return response()->json($item, 201);
    }
}
