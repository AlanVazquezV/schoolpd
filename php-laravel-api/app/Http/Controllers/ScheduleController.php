<?php 
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleAddRequest;
use App\Http\Requests\ScheduleEditRequest;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Exception;
class ScheduleController extends Controller
{
	

	/**
     * List table records
	 * @param  \Illuminate\Http\Request
     * @param string $fieldname //filter records by a table field
     * @param string $fieldvalue //filter value
     * @return \Illuminate\View\View
     */
	function index(Request $request, $fieldname = null , $fieldvalue = null){
		$query = Schedule::query();
		if($request->search){
			$search = trim($request->search);
			Schedule::search($query, $search);
		}
		$query->join("schedule_name", "schedule.name", "=", "schedule_name.id");
		$query->join("classes", "schedule.class", "=", "classes.id");
		$orderby = $request->orderby ?? "schedule.id";
		$ordertype = $request->ordertype ?? "desc";
		$query->orderBy($orderby, $ordertype);
		if($fieldname){
			$query->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$records = $this->paginate($query, Schedule::listFields());
		return $this->respond($records);
	}
	

	/**
     * Select table record by ID
	 * @param string $rec_id
     * @return \Illuminate\View\View
     */
	function view($rec_id = null){
		$query = Schedule::query();
		$query->join("schedule_name", "schedule.name", "=", "schedule_name.id");
		$query->join("classes", "schedule.class", "=", "classes.id");
		$record = $query->findOrFail($rec_id, Schedule::viewFields());
		return $this->respond($record);
	}
	

	/**
     * Save form record to the table
     * @return \Illuminate\Http\Response
     */
	function add(ScheduleAddRequest $request){
		$modeldata = $request->validated();
		
		//save Schedule record
		$record = Schedule::create($modeldata);
		$rec_id = $record->id;
		return $this->respond($record);
	}
	

	/**
     * Update table record with form data
	 * @param string $rec_id //select record by table primary key
     * @return \Illuminate\View\View;
     */
	function edit(ScheduleEditRequest $request, $rec_id = null){
		$query = Schedule::query();
		$record = $query->findOrFail($rec_id, Schedule::editFields());
		if ($request->isMethod('post')) {
			$modeldata = $request->validated();
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
		$query = Schedule::query();
		$query->whereIn("id", $arr_id);
		$query->delete();
		return $this->respond($arr_id);
	}
}
