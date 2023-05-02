<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Assistance extends Model 
{
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'assistance';
	

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
	protected $fillable = ["classes","user","date","confirmation"];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				assistance.date LIKE ?  OR 
				classes.name LIKE ?  OR 
				user.name LIKE ?  OR 
				assistance_confirmation.label LIKE ?  OR 
				assistance.classes LIKE ?  OR 
				assistance.user LIKE ?  OR 
				assistance.confirmation LIKE ?  OR 
				classes.description LIKE ?  OR 
				classes.banner LIKE ?  OR 
				classes.time LIKE ?  OR 
				classes.place LIKE ?  OR 
				user.lastname LIKE ?  OR 
				user.username LIKE ?  OR 
				user.email LIKE ?  OR 
				user.mobile LIKE ?  OR 
				user.password LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"assistance.id AS id", 
			"assistance.date AS date", 
			"classes.name AS classes_name", 
			"user.name AS user_name", 
			"assistance_confirmation.label AS assistance_confirmation_label", 
			"classes.id AS classes_id", 
			"user.id AS user_id", 
			"assistance_confirmation.id AS assistance_confirmation_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"assistance.id AS id", 
			"assistance.date AS date", 
			"classes.name AS classes_name", 
			"user.name AS user_name", 
			"assistance_confirmation.label AS assistance_confirmation_label", 
			"classes.id AS classes_id", 
			"user.id AS user_id", 
			"assistance_confirmation.id AS assistance_confirmation_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"assistance.id AS id", 
			"assistance.classes AS classes", 
			"assistance.user AS user", 
			"assistance.date AS date", 
			"assistance.confirmation AS confirmation", 
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
			"classes.assistance AS classes_assistance", 
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
			"assistance_confirmation.id AS assistance_confirmation_id", 
			"assistance_confirmation.label AS assistance_confirmation_label" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"assistance.id AS id", 
			"assistance.classes AS classes", 
			"assistance.user AS user", 
			"assistance.date AS date", 
			"assistance.confirmation AS confirmation", 
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
			"classes.assistance AS classes_assistance", 
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
			"assistance_confirmation.id AS assistance_confirmation_id", 
			"assistance_confirmation.label AS assistance_confirmation_label" 
		];
	}
	

	/**
     * return edit page fields of the model.
     * 
     * @return array
     */
	public static function editFields(){
		return [ 
			"classes", 
			"user", 
			"date", 
			"confirmation", 
			"id" 
		];
	}
	

	/**
     * return confirmationPage page fields of the model.
     * 
     * @return array
     */
	public static function confirmationPageFields(){
		return [ 
			"confirmation", 
			"id" 
		];
	}
	

	/**
     * return listClass page fields of the model.
     * 
     * @return array
     */
	public static function listClassFields(){
		return [ 
			"assistance.id AS id", 
			"assistance.date AS date", 
			"classes.name AS classes_name", 
			"user.name AS user_name", 
			"assistance_confirmation.label AS assistance_confirmation_label", 
			"classes.id AS classes_id", 
			"user.id AS user_id", 
			"assistance_confirmation.id AS assistance_confirmation_id" 
		];
	}
	

	/**
     * return exportListClass page fields of the model.
     * 
     * @return array
     */
	public static function exportListClassFields(){
		return [ 
			"assistance.id AS id", 
			"assistance.date AS date", 
			"classes.name AS classes_name", 
			"user.name AS user_name", 
			"assistance_confirmation.label AS assistance_confirmation_label", 
			"classes.id AS classes_id", 
			"user.id AS user_id", 
			"assistance_confirmation.id AS assistance_confirmation_id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
}
