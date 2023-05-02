<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable 
{
	use Notifiable, HasApiTokens;
	

	/**
     * The table associated with the model.
     *
     * @var string
     */
	protected $table = 'user';
	

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
	protected $fillable = ["name","lastname","username","mobile","image","type","status","schedule","email","password"];
	/**
     * Table fields which are not included in select statement
     *
     * @var array
     */
	protected $hidden = ['password', 'token'];
	

	/**
     * Set search query for the model
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param string $text
     */
	public static function search($query, $text){
		//search table record 
		$search_condition = '(
				user.name LIKE ?  OR 
				user.lastname LIKE ?  OR 
				user.username LIKE ?  OR 
				user.email LIKE ?  OR 
				user.mobile LIKE ?  OR 
				user_status.label LIKE ?  OR 
				user_types.label LIKE ?  OR 
				schedule_name.label LIKE ?  OR 
				user.status LIKE ? 
		)';
		$search_params = [
			"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
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
			"user.name AS name", 
			"user.lastname AS lastname", 
			"user.username AS username", 
			"user.email AS email", 
			"user.mobile AS mobile", 
			"user_status.label AS user_status_label", 
			"user_types.label AS user_types_label", 
			"schedule_name.label AS schedule_name_label", 
			"user.image AS image", 
			"user.id AS id", 
			"user_types.id AS user_types_id", 
			"user_status.id AS user_status_id", 
			"schedule_name.id AS schedule_name_id" 
		];
	}
	

	/**
     * return exportList page fields of the model.
     * 
     * @return array
     */
	public static function exportListFields(){
		return [ 
			"user.name AS name", 
			"user.lastname AS lastname", 
			"user.username AS username", 
			"user.email AS email", 
			"user.mobile AS mobile", 
			"user_status.label AS user_status_label", 
			"user_types.label AS user_types_label", 
			"schedule_name.label AS schedule_name_label", 
			"user.image AS image", 
			"user.id AS id", 
			"user_types.id AS user_types_id", 
			"user_status.id AS user_status_id", 
			"schedule_name.id AS schedule_name_id" 
		];
	}
	

	/**
     * return view page fields of the model.
     * 
     * @return array
     */
	public static function viewFields(){
		return [ 
			"user.id AS id", 
			"user.name AS name", 
			"user.lastname AS lastname", 
			"user.username AS username", 
			"user.email AS email", 
			"user.mobile AS mobile", 
			"user_status.label AS user_status_label", 
			"user_types.label AS user_types_label", 
			"schedule_name.label AS schedule_name_label", 
			"user_status.id AS user_status_id", 
			"user_types.id AS user_types_id", 
			"schedule_name.id AS schedule_name_id" 
		];
	}
	

	/**
     * return exportView page fields of the model.
     * 
     * @return array
     */
	public static function exportViewFields(){
		return [ 
			"user.id AS id", 
			"user.name AS name", 
			"user.lastname AS lastname", 
			"user.username AS username", 
			"user.email AS email", 
			"user.mobile AS mobile", 
			"user_status.label AS user_status_label", 
			"user_types.label AS user_types_label", 
			"schedule_name.label AS schedule_name_label", 
			"user_status.id AS user_status_id", 
			"user_types.id AS user_types_id", 
			"schedule_name.id AS schedule_name_id" 
		];
	}
	

	/**
     * return accountedit page fields of the model.
     * 
     * @return array
     */
	public static function accounteditFields(){
		return [ 
			"name", 
			"lastname", 
			"username", 
			"mobile", 
			"image", 
			"id" 
		];
	}
	

	/**
     * return accountview page fields of the model.
     * 
     * @return array
     */
	public static function accountviewFields(){
		return [ 
			"user.id AS id", 
			"user.name AS name", 
			"user.lastname AS lastname", 
			"user.username AS username", 
			"user.email AS email", 
			"user.mobile AS mobile", 
			"user_status.label AS user_status_label", 
			"user_types.label AS user_types_label", 
			"schedule_name.label AS schedule_name_label", 
			"user_status.id AS user_status_id", 
			"user_types.id AS user_types_id", 
			"schedule_name.id AS schedule_name_id" 
		];
	}
	

	/**
     * return exportAccountview page fields of the model.
     * 
     * @return array
     */
	public static function exportAccountviewFields(){
		return [ 
			"user.id AS id", 
			"user.name AS name", 
			"user.lastname AS lastname", 
			"user.username AS username", 
			"user.email AS email", 
			"user.mobile AS mobile", 
			"user_status.label AS user_status_label", 
			"user_types.label AS user_types_label", 
			"schedule_name.label AS schedule_name_label", 
			"user_status.id AS user_status_id", 
			"user_types.id AS user_types_id", 
			"schedule_name.id AS schedule_name_id" 
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
			"lastname", 
			"username", 
			"status", 
			"schedule", 
			"mobile", 
			"image", 
			"id" 
		];
	}
	

	/**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
	public $timestamps = false;
	

	/**
     * Get current user name
     * @return string
     */
	public function UserName(){
		return $this->username;
	}
	

	/**
     * Get current user id
     * @return string
     */
	public function UserId(){
		return $this->id;
	}
	public function UserEmail(){
		return $this->email;
	}
	public function UserPhoto(){
		return $this->image;
	}
	public function UserRole(){
		return $this->type;
	}
	

	/**
     * Send Password reset link to user email 
	 * @param string $token
     * @return string
     */
	public function sendPasswordResetNotification($token)
	{
		// Your your own implementation.
		$this->notify(new \App\Notifications\ResetPassword($token));
	}
	
	private $roleNames = [];
	private $userPages = [];
	
	/**
	* Get the permissions of the user.
	*/
	public function permissions(){
		return $this->hasMany(Permissions::class, 'id', 'type');
	}
	
	/**
	* Get the roles of the user.
	*/
	public function roles(){
		return $this->hasMany(User_Types::class, 'id', 'type');
	}
	
	/**
	* set user role
	*/
	public function assignRole($roleName){
		$roleId = User_Types::select('id')->where('label', $roleName)->value('id');
		$this->type = $roleId;
		$this->save();
	}
	
	/**
     * return list of pages user can access
     * @return array
     */
	public function getUserPages(){
		if(empty($this->userPages)){ // ensure we make db query once
			$this->userPages = $this->permissions()->pluck('permission')->toArray();
		}
		return $this->userPages;
	}
	
	/**
     * return user role names
     * @return array
     */
	public function getRoleNames(){
		if(empty($this->roleNames)){// ensure we make db query once
			$this->roleNames = $this->roles()->pluck('label')->toArray();
		}
		return $this->roleNames;
	}
	
	/**
     * check if user has a role
     * @return bool
    */
	public function hasRole($arrRoles){
		if(!is_array($arrRoles)){
			$arrRoles = [$arrRoles];
		}
		$userRoles = $this->getRoleNames();
		if(array_intersect($userRoles, $arrRoles)){
			return true;
		}
		return false;
	}
	
	/**
     * check if user can access page
     * @return bool
     */
	public function canAccess($path){
		$userPages = $this->getUserPages();
		return in_array($path, $userPages);
	}
}
