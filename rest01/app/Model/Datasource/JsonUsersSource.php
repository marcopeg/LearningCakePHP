<?php
/**
 * CakePHP + CakePOWER REST Service Tutorial Demo
 * ==============================================
 *
 * @author:		Marco Pegoraro
 * @contact:	marco(dot)pegoraro(at)gmail(dot)com
 * @follow:		@thepeg
 * @blog:		http://movableapp.com
 * @blog:		http://consulenza-web.com
 *
 * This sofware is distributed under MIT license.
 * Please read the "readme.txt" file from the root of this package
 *
 */
 
 
 
/**
 * ========================================
 * !!! THIS IS A DIDACTICAL SOURCE CODE !!!
 * ========================================
 * 
 * This is a simple datasource to read/write a JSON database of users.
 * Each method documents itself to teach how to build datasources like this.
 * 
 * This class uses a private array of Users data records then serialize and unserialize
 * to a JSON file.
 *
 * Model's who use this datasource should move to a real database with zero modifications to
 * logic or code!
 * 
 * This implementation of the users table is very limited in finding conditions and should be
 * real non optimized for a great amount of data!
 * 
 * ========================================
 * !!! THIS IS A DIDACTICAL SOURCE CODE !!!
 * ========================================
 */

App::uses( 'File', 'Utility' );

class JsonUsersSource extends DataSource {
	
	private $_schema = array(
		'id' => array(
			'type'		=> 'integer',
			'null'		=> false,
			'key'		=> 'primary',
			'length'	=> 11
		),
		'username' => array(
            'type'		=> 'string',
            'null'		=> false,
            'length'	=> 255,
        ),
        'password' => array(
            'type'		=> 'string',
            'null'		=> false,
			'length'	=> 255
        ),
        'name' => array(
            'type'		=> 'string',
            'null'		=> false,
            'length'	=> 255,
        ),
        'surname' => array(
            'type'		=> 'string',
            'null'		=> false,
            'length'	=> 255,
        )
	);
	
	private $_file = null;
	
	private $_json = null;
	
	
	
	
	public function __construct( $config = array() ) {
		
		parent::__construct( $config );
		
		$this->_file = new File( TMP . 'users.txt', true );
		
		$this->_read();
		
	}
	
	





// -------------------------------------------------------------------- //
// ---[[   D A T A S O U R C E   D E F A U L T   M E T H O D S   ]] --- //
// -------------------------------------------------------------------- //
	
	public function listSources() { return null; }
	
	public function describe( Model $Model ) { return $this->_schema; }
	
	public function calculate() { return 'COUNT'; }
	
	
	
	
// -------------------------------------------------------------- //
// ---[[   D A T A S O U R C E   C R U D   S U P P O R T   ]] --- //
// -------------------------------------------------------------- //
	
	
	
	/**
	 * Read/Filter
	 * this method is used by every model's reading methods to fetch and filter
	 * data from the db.
	 *
	 * We do need to manually filter our JSON array of users implementing each
	 * condition that Model should be ask for.
	 * 
	 * A basic condition is to filter by ID to allow Model->read() to works!
	 *
	 * Focus on handling of LIMIT option and how to respond to a findCount() request!
	 *
	 * Implementing the COUNT response is very important for save/update methods to work.
	 * CakePHP DataSource we inheriting from does a findCount to decide if to CREATE or UPDATE action.
	 */
	public function read( Model $Model, Array $query ) {
		
		// Default values for query params used to configure REST request.
		$query += array( 'conditions'=>array(), 'fields'=>array() );
		
		// Setup filtered data based on query conditions
		$fdata = array();
		
		// Filter database data on query conditions
		foreach ( $this->_json as $i=>$user ) {
			
			$is = true;
			
			// ID filter
			if ( isset($query['conditions'][$Model->alias.'.id']) ) {
				if ( $user['id'] != $query['conditions'][$Model->alias.'.id'] ) $is = false;
			}
			
			// Username filter
			if ( isset($query['conditions'][$Model->alias.'.username']) ) {
				if ( $user['username'] != $query['conditions'][$Model->alias.'.username'] ) $is = false;
			}
			
			// Password filter
			if ( isset($query['conditions'][$Model->alias.'.password']) ) {
				if ( $user['password'] != $query['conditions'][$Model->alias.'.password'] ) $is = false;
			}
			
			// Append if pass filter conditions
			if ( $is ) $fdata[] = array( $Model->alias => $user );
			
		}
		
		// Handle LIMIT query option
		if ( !empty($query['limit']) && count($fdata) ) $fdata = array( $fdata[0] );
		
		// Handle find('COUNT') request
		// A findCount() array result should be in the same format of a findAll() request!
		if ( !empty($query['fields']) && strtoupper($query['fields']) === 'COUNT' ) return array(
			array(
				$Model->alias => array(
					'count' => count($fdata)
				)
			)
		);
		
		// Return filtered data
		return $fdata;
		
	}
	
	/**
	 * Append New Record
	 */
	public function create( Model $Model, Array $keys, Array $values ) {
		
		// build full data array to append
		$data 		= array_combine($keys, $values);
		$data['id'] = $this->_nextId();
		
		// append new record to the array
		$this->_json[] = $data;
		
		// a create action must return created recordset with the new id!
		if ( $this->_save() ) {
			
			$Model->data 	= array( $Model->alias=>$data );
			$Model->id		= $data['id'];
			
			return $Model->data;
			
		}
		
		return false;
		
	}
	
	/**
	 * Edit Existing Record
	 */
	public function update( Model $Model, Array $keys, Array $values ) {
		
		$data = array_combine($keys, $values);
		
		// scan actual db to match record to update by it's ID
		foreach ( $this->_json as $i=>$user ) {
			
			if ( $user['id'] == $data['id'] ) {
				
				// Inherith undefined fields to allow to save only some fields.
				// this is usefull when saving a single field or wants to save
				// a user profile without to change it's password!
				foreach ( array_keys($user) as $key ) {
					if ( !isset($data[$key]) ) $data[$key] = $user[$key];
				}
				
				$this->_json[$i] = $data;
				
				if ( $this->_save() ) return true;
				
			}
			
		}
		
		return false;
		
	}
	
	/**
	 * Remove Existing Record
	 */
	public function delete( Model $Model, Array $conditions ) {
		
		$data = $this->read( $Model, array(
			'conditions' 	=> $conditions,
			'limit' 		=> 1
		));
		
		// record not found error
		if ( !$data ) return false;
		
		// scan actual db to find record to remove
		foreach ( $this->_json as $i=>$user ) {
			
			if ( $user['id'] == $data[0]['User']['id'] ) {
				
				array_splice( $this->_json, $i, 1 );
				
				if ( $this->_save() ) return true;
				
			}
			
		}
		
		return false;
		
	}


	
	
	/**
	 * Scans actual records for a new ID to use
	 */
	private function _nextId() {
		
		$id = 0;
		
		foreach ( $this->_json as $user ) {
			
			if ( $user['id'] > $id ) $id = $user['id'];
			
		}
		
		return $id+1;
		
	}
	
	

// ----------------------------------------------------------- //
// ---[[   L O W   L E V E L   A C C E S S   T O   D B   ]]--- //
// ----------------------------------------------------------- //
	
	private function _read() {
		
		$this->_json = array();
				
		$cnt = json_decode( $this->_file->read(), true );
		
		if ( !isset($cnt['users']) ) return false;
		
		$this->_json = $cnt['users'];
		
	}
	
	private function _save() {
		
		$cnt = array( 'users'=>$this->_json );
		
		if ( $this->_file->write( json_encode($cnt) ) ) return true;
		
		return false;
		
	}
	
}
