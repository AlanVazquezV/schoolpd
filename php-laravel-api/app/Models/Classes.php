<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Classes extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'classes';
	

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
	protected $fillable = ["name","description","banner","cycle","status","modality","schedule","time","user","place"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				classes.name LIKE ?  OR 
				classes.description LIKE ?  OR 
				classes.banner LIKE ?  OR 
				classes.time LIKE ?  OR 
				classes.place LIKE ?  OR 
				user.username LIKE ?  OR 
				classes_status.label LIKE ?  OR 
				classes_modality.label LIKE ?  OR 
				cycle.label LIKE ?  OR 
				schedule_name.label LIKE ?  OR 
				user.name LIKE ?  OR 
				user.lastname LIKE ?  OR 
				user.email LIKE ?  OR 
				user.mobile LIKE ?  OR 
				user.password LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.banner AS banner", 
			"classes.time AS time", 
			"classes.place AS place", 
			"user.username AS user_username", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"schedule_name.label AS schedule_name_label", 
			"classes.id AS id", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id", 
			"schedule_name.id AS schedule_name_id", 
			"assistance.id AS assistance_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.banner AS banner", 
			"classes.time AS time", 
			"classes.place AS place", 
			"user.username AS user_username", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"schedule_name.label AS schedule_name_label", 
			"classes.id AS id", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id", 
			"schedule_name.id AS schedule_name_id", 
			"assistance.id AS assistance_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.time AS time", 
			"classes.place AS place", 
			"user.username AS user_username", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"schedule_name.label AS schedule_name_label", 
			"classes.banner AS banner", 
			"classes.id AS id", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id", 
			"schedule_name.id AS schedule_name_id", 
			"assistance.id AS assistance_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.time AS time", 
			"classes.place AS place", 
			"user.username AS user_username", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"schedule_name.label AS schedule_name_label", 
			"classes.banner AS banner", 
			"classes.id AS id", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id", 
			"schedule_name.id AS schedule_name_id", 
			"assistance.id AS assistance_id" 
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
			"description", 
			"banner", 
			"cycle", 
			"status", 
			"modality", 
			"time", 
			"place", 
			"id" 
		];
	}
	

	/**
     * return viewAssis page fields of the model.
     * 
     * @return array
     */
	public static function viewAssisFields(){
		return [ 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.time AS time", 
			"classes.place AS place", 
			"user.username AS user_username", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"schedule_name.label AS schedule_name_label", 
			"classes.banner AS banner", 
			"classes.id AS id", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id", 
			"schedule_name.id AS schedule_name_id", 
			"assistance.id AS assistance_id" 
		];
	}
	

	/**
     * return exportViewAssis page fields of the model.
     * 
     * @return array
     */
	public static function exportViewAssisFields(){
		return [ 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.time AS time", 
			"classes.place AS place", 
			"user.username AS user_username", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"schedule_name.label AS schedule_name_label", 
			"classes.banner AS banner", 
			"classes.id AS id", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id", 
			"schedule_name.id AS schedule_name_id", 
			"assistance.id AS assistance_id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
