<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cycle extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'cycle';
	

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
	protected $fillable = ["label"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				cycle.label LIKE ? 
		)';
		$search_params = [
			"%$text%"
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
			"cycle.id AS id", 
			"cycle.label AS label" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"cycle.id AS id", 
			"cycle.label AS label" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"cycle.id AS id", 
			"cycle.label AS label", 
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
			"cycle.id AS id", 
			"cycle.label AS label", 
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
			"id", 
			"label" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
