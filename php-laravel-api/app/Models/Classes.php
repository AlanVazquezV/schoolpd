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
	protected $fillable = ["name","description","banner","cycle","status","modality","schedule","time","user","place","assistance"];
	

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
				user.name LIKE ?  OR 
				user.username LIKE ?  OR 
				user.mobile LIKE ?  OR 
				classes_status.label LIKE ?  OR 
				classes_modality.label LIKE ?  OR 
				cycle.label LIKE ?  OR 
				user.lastname LIKE ?  OR 
				user.email LIKE ?  OR 
				user.password LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"classes.id AS id", 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.banner AS banner", 
			"classes.schedule AS schedule", 
			"classes.time AS time", 
			"classes.place AS place", 
			"classes.assistance AS assistance", 
			"user.name AS user_name", 
			"user.username AS user_username", 
			"user.mobile AS user_mobile", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"classes.id AS id", 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.banner AS banner", 
			"classes.schedule AS schedule", 
			"classes.time AS time", 
			"classes.place AS place", 
			"classes.assistance AS assistance", 
			"user.name AS user_name", 
			"user.username AS user_username", 
			"user.mobile AS user_mobile", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.label AS cycle_label", 
			"user.id AS user_id", 
			"classes_status.id AS classes_status_id", 
			"classes_modality.id AS classes_modality_id", 
			"cycle.id AS cycle_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"classes.id AS id", 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.banner AS banner", 
			"classes.cycle AS cycle", 
			"classes.status AS status", 
			"classes.modality AS modality", 
			"classes.schedule AS schedule", 
			"classes.time AS time", 
			"classes.user AS user", 
			"classes.place AS place", 
			"classes.assistance AS assistance", 
			"user.id AS user_id", 
			"user.name AS user_name", 
			"user.lastname AS user_lastname", 
			"user.type AS user_type", 
			"user.username AS user_username", 
			"user.email AS user_email", 
			"user.status AS user_status", 
			"user.schedule AS user_schedule", 
			"user.mobile AS user_mobile", 
			"user.image AS user_image", 
			"classes_status.id AS classes_status_id", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.id AS classes_modality_id", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.id AS cycle_id", 
			"cycle.label AS cycle_label" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"classes.id AS id", 
			"classes.name AS name", 
			"classes.description AS description", 
			"classes.banner AS banner", 
			"classes.cycle AS cycle", 
			"classes.status AS status", 
			"classes.modality AS modality", 
			"classes.schedule AS schedule", 
			"classes.time AS time", 
			"classes.user AS user", 
			"classes.place AS place", 
			"classes.assistance AS assistance", 
			"user.id AS user_id", 
			"user.name AS user_name", 
			"user.lastname AS user_lastname", 
			"user.type AS user_type", 
			"user.username AS user_username", 
			"user.email AS user_email", 
			"user.status AS user_status", 
			"user.schedule AS user_schedule", 
			"user.mobile AS user_mobile", 
			"user.image AS user_image", 
			"classes_status.id AS classes_status_id", 
			"classes_status.label AS classes_status_label", 
			"classes_modality.id AS classes_modality_id", 
			"classes_modality.label AS classes_modality_label", 
			"cycle.id AS cycle_id", 
			"cycle.label AS cycle_label" 
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
			"schedule", 
			"time", 
			"user", 
			"place", 
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
