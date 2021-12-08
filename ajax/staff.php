<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include( "../lib/DataTables.php" );

// Alias Editor classes so they are easy to use
use
	DataTables\Editor,
	DataTables\Editor\Field,
	DataTables\Editor\Format,
	DataTables\Editor\Mjoin,
	DataTables\Editor\Options,
	DataTables\Editor\Upload,
	DataTables\Editor\Validate,
	DataTables\Editor\ValidateOptions;

if(isset($_POST['id']))
{
Editor::inst( $db, 'employees' )
	->fields(
		
                Field::inst( 'id' ),
                Field::inst( 'aid' ),
		Field::inst( 'name' ),
		Field::inst( 'status' ),
                Field::inst( 'date' ),
		Field::inst( 'ip' )
                
		
	)
        ->where( 'aid', $_POST['id'])
	->debug(true)
	->process( $_POST )
	->json();
} else {
    Editor::inst( $db, 'employees' )
	->fields(
		
                Field::inst( 'id' ),
                Field::inst( 'aid' ),
		Field::inst( 'name' ),
		Field::inst( 'status' ),
                Field::inst( 'date' ),
		Field::inst( 'ip' )
                
		
	)->on( 'preCreate', function ( $editor, $values ) {
		
		
			// On create update all the other records to make room for our new one
			$editor->db()
				->query( 'update', 'agents' )
				->set( 'amount_employees', 'amount_employees+1', false )
				->where( 'id', $values['aid'], '=' )
				->exec();
		
	} )->on( 'preRemove', function ( $editor, $id, $values ) {
		$editor->db()
			->query( 'update', 'agents' )
			->set( 'amount_employees', 'amount_employees-1', false )
			->where( 'id', $values['aid'], '=' )
			->exec();
	} )
	->debug(true)
	->process( $_POST )
	->json();
    
   
    
}