<?php
/**
 * Gintonic Web
 * For check if User can View a post
 * 
 * @author    Philippe Lafrance
 * @link      http://gintonicweb.com
 */


class ViewableBehavior extends ModelBehavior {

	/**
	 * Setup behavior
	 *
	 * @return void
	 */
	public function setup(Model $Model, $settings = array()) {
	    if (!isset($this->settings[$Model->alias])) {
	        $this->settings[$Model->alias] = array(
	        	'UserModel' => 'User',
	        	'UserViewRole' => 'admin',
	        	'UserAssocKey' => 'user_id',
	        	'CurrUserId' => CakeSession::read('Auth.User.id')
	        );
	    }
	    $this->settings[$Model->alias] = array_merge(
	        $this->settings[$Model->alias], (array)$settings);
	}
	
	/**
	 *
	 *
	 * @param Model $Model Model using the behavior
	 * @param array $query Query parameters as set by cake
	 * @return array
	 */
	public function beforeFind(Model $Model, $query) {
		$reset = (isset($query['reset']) ? $query['reset'] : false);
		if($reset){
			return $query;
		}
		$settings = $this->settings[$Model->alias];
		
		
		/* 
		 * conditions add as
		 * Posts.status = 'publish' OR (Post.status = 'draft' AND (Post.UserAssocKey = CurrUserId OR (UserModel.id = CurrUserId AND UserModel.role = UserViewRole)))
		 * 
		 * eg. Posts.status = 'publish' OR (Post.status = 'draft' AND (Post.user_id = 1 OR (User.id = 1 AND User.role = 'admin')))
		 * 
		 * */
		$conditions['OR'] = array($Model->alias.'.status' => 'publish');
		if($settings['CurrUserId']){
			$conditions['OR']['AND'] = array(
    									$Model->alias.'.status' =>  'draft',
    									'OR' => array(
    											$Model->alias.'.'.$settings['UserAssocKey'] => $settings['CurrUserId'], 
    											'AND' => array(
    													$settings['UserModel'].'.role' => $settings['UserViewRole'], 
    													$settings['UserModel'].'.id' => $settings['CurrUserId']
    											)
    									)    									
    							);
		}
		
		
		$query['conditions'] = array_merge(
	       (array) $query['conditions'], (array)$conditions);
		
		return $query;
	}
	
}