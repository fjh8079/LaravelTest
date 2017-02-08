<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function getList()
    {
    	$results = DB::select('select * from user');

        return response()->json($results, 200);
    }

    public function getUserDetail($id)
    {
    	$results = DB::select('select * from user where id = '. $id);

    	if(count($results) == 0) {
    		return response()->json([
                'error' => "invalid user id"
            ], 200);
    	}

        return response()->json($results[0], 200);
    }

    public function createUser(Request $request)
    {
    	$data = array(
    		'name' => $request->input('name'),
    		'gender' => $request->input('gender'),
    		'c_datetime' => date("Y-m-d H:i:s")
    	);

    	$results = DB::insert('insert into user (name, gender, c_datetime) values (:name, :gender, :c_datetime)', $data);

    	if($results) {
    		echo "<script type='text/javascript'>";
    		echo "alert('新增成功');";
    		echo "window.location = '/user';";
    		echo "</script>";
    	} else {
    		return response()->json([
                'error' => "error"
            ], 200);
    	}
    }

    public function getListView() {

    	$results = DB::select('select * from user');
    	return view('user/list', ['users' => $results]);

    }
}