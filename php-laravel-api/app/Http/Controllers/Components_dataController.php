<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Components Data Contoller
 * Use for getting values from the database for page components
 * Support raw query builder
 * @category Controller
 */
class Components_dataController extends Controller{
	public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }
	/**
     * cycle_option_list Model Action
     * @return array
     */
	function cycle_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM cycle ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * status_option_list Model Action
     * @return array
     */
	function status_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM classes_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * modality_option_list Model Action
     * @return array
     */
	function modality_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM classes_modality ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * user_option_list Model Action
     * @return array
     */
	function user_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM user WHERE user.type = 2 ORDER BY id ASC ";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * id_option_list Model Action
     * @return array
     */
	function id_option_list(Request $request){
		$sqltext = "SELECT id as value, id as label FROM user_types";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * name_option_list Model Action
     * @return array
     */
	function name_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM schedule_name ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * class_option_list Model Action
     * @return array
     */
	function class_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,name AS label FROM classes ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * type_option_list Model Action
     * @return array
     */
	function type_option_list(Request $request){
		$sqltext = "SELECT id AS value, label AS label FROM User_Types";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * check if username value already exist in User
	 * @param string $value
     * @return bool
     */
	function user_username_exist(Request $request, $value){
		$exist = DB::table('user')->where('username', $value)->value('username');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * check if email value already exist in User
	 * @param string $value
     * @return bool
     */
	function user_email_exist(Request $request, $value){
		$exist = DB::table('user')->where('email', $value)->value('email');   
		if($exist){
			return "true";
		}
		return "false";
	}
	/**
     * status_option_list_2 Model Action
     * @return array
     */
	function status_option_list_2(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM user_status ORDER BY id ASC";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * schedule_option_list Model Action
     * @return array
     */
	function schedule_option_list(Request $request){
		$sqltext = "SELECT  DISTINCT id AS value,label AS label FROM schedule_name ORDER BY id";
		$query_params = [];
		$arr = DB::select(DB::raw($sqltext), $query_params);
		return $arr;
	}
	/**
     * getcount_user Model Action
     * @return Value
     */
	function getcount_user(Request $request){
		$sqltext = "SELECT COUNT(*) AS num FROM user";
		$query_params = [];
		$val = DB::select(DB::raw($sqltext), $query_params);
		return $val[0]->num;
	}
}
