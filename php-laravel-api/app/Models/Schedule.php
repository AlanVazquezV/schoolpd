<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Schedule extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'schedule';
	

	/**
     * The table primary key field
     *
     * @var string
     */
	protected $primaryKey = 'id';
	

	/**
     * Table fillable fields
     *
     * @var array
     */
	protected $fillable = ["name","class"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				schedule_name.label LIKE ?  OR 
				classes.name LIKE ?  OR 
				classes.time LIKE ?  OR 
				schedule.name LIKE ?  OR 
				classes.description LIKE ?  OR 
				classes.banner LIKE ?  OR 
				classes.place LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
		];
		//setting search conditions
		$query->whereRaw($search_condition, $search_params);
	}
	

	/**
     * return list page fields of the model.
     * 
     * @return array
     */
	public static function listFields(){
		return [ 
			"schedule.id AS id", 
			"schedule_name.label AS schedule_name_label", 
			"classes.name AS classes_name", 
			"schedule_name.id AS schedule_name_id", 
			"classes.id AS classes_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"schedule.id AS id", 
			"schedule_name.label AS schedule_name_label", 
			"classes.name AS classes_name", 
			"schedule_name.id AS schedule_name_id", 
			"classes.id AS classes_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"schedule.id AS id", 
			"schedule.name AS name", 
			"schedule.class AS class", 
			"schedule_name.id AS schedule_name_id", 
			"schedule_name.label AS schedule_name_label", 
			"classes.id AS classes_id", 
			"classes.name AS classes_name", 
			"classes.description AS classes_description", 
			"classes.banner AS classes_banner", 
			"classes.cycle AS classes_cycle", 
			"classes.status AS classes_status", 
			"classes.modality AS classes_modality", 
			"classes.schedule AS classes_schedule", 
			"classes.time AS classes_time", 
			"classes.user AS classes_user", 
			"classes.place AS classes_place", 
			"classes.assistance AS classes_assistance" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"schedule.id AS id", 
			"schedule.name AS name", 
			"schedule.class AS class", 
			"schedule_name.id AS schedule_name_id", 
			"schedule_name.label AS schedule_name_label", 
			"classes.id AS classes_id", 
			"classes.name AS classes_name", 
			"classes.description AS classes_description", 
			"classes.banner AS classes_banner", 
			"classes.cycle AS classes_cycle", 
			"classes.status AS classes_status", 
			"classes.modality AS classes_modality", 
			"classes.schedule AS classes_schedule", 
			"classes.time AS classes_time", 
			"classes.user AS classes_user", 
			"classes.place AS classes_place", 
			"classes.assistance AS classes_assistance" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"name", 
			"class", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
