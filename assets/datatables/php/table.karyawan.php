<?php

/*
 * Editor server script for DB table user
 * Created by http://editor.datatables.net/generator
 */

// DataTables PHP library and database connection
include( "lib/DataTables.php" );

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

// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'user', 'id' )
	->fields(
		Field::inst( 'rfid' ),
		Field::inst( 'username' ),
		Field::inst( 'password' )
		->get(false)
		->setFormatter(function ($val, $data){
			return md5($val);
		}),
		Field::inst( 'nidn' ),
		Field::inst( 'nama' ),
		Field::inst( 'jenis_kelamin' ),
		Field::inst( 'tgl_lahir' )
			->validator( Validate::dateFormat( 'Y-m-d' ) )
			->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
			->setFormatter( Format::dateFormatToSql( 'Y-m-d' ) ),
		Field::inst( 'alamat' ),
		Field::inst( 'jabatan' ),
		Field::inst( 'email' ),
		Field::inst( 'level' )
	)
	->process( $_POST )
	->json();