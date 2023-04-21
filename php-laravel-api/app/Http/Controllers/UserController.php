<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAccountEditRequest;
use App\Http\Requests\UserAddRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
class UserController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = User::query();
		if($request->search){
			$search = trim($request->search);
			User::search($query, $search);
		}
		$query->join("user_status", "user.status", "=", "user_status.id");
		$query->join("user_types", "user.type", "=", "user_types.id");
		$query->join("schedule_name", "user.schedule", "=", "schedule_name.id");
		$orderby = $request->orderby ?? "user.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, User::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = User::query();
		$query->join("user_status", "user.status", "=", "user_status.id");
		$query->join("user_types", "user.type", "=", "user_types.id");
		$query->join("schedule_name", "user.schedule", "=", "schedule_name.id");
		$record = $query->findOrFail($rec_id, User::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Insert multiple rows into the database table
     * @return \Illuminate\Http\Response
     */
	function add(UserAddRequest $request){
		$postdata = $request->all();
		$records = [];
		foreach($postdata as &$modeldata){
		
		if( array_key_exists("image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['image'], "image");
			$modeldata['image'] = $fileInfo['filepath'];
		}
			$modeldata['password'] = bcrypt($modeldata['password']);
			$record = User::create($modeldata);
			$record->assignRole("ALUMNO"); //set default role for user
			$records[] = $record;
		}
		return $this->respond($records);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(UserEditRequest $request, $rec_id = null){
		$query = User::query();
		$record = $query->findOrFail($rec_id, User::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
		
		if( array_key_exists("image", $modeldata) ){
			//move uploaded file from temp directory to destination directory
			$fileInfo = $this->moveUploadedFiles($modeldata['image'], "image");
			$modeldata['image'] = $fileInfo['filepath'];
		}
			$record->update($modeldata);
		}
		return $this->respond($record);
	}
	

	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
	 * @param  \Illuminate\Http\Request
	 * @param string $rec_id //can be separated by comma 
     * @return \Illuminate\Http\Response
     */
	function delete(Request $request, $rec_id = null){
		$arr_id = explode(",", $rec_id);
		$query = User::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
