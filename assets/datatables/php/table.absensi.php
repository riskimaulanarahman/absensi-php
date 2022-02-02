<?php

/*
 * Editor server script for DB table absensi
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
Editor::inst( $db, 'absensi', 'id' )
	->fields(
		Field::inst( 'rfid' ),
		Field::inst( 'nama' ),
		Field::inst( 'nidn' ),
		Field::inst( 'tanggal' )
			->validator( Validate::dateFormat( 'Y-m-d' ) )
			->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
			->setFormatter( Format::dateFormatToSql( 'Y-m-d' ) ),
		Field::inst( 'jam_masuk' )
			->validator( Validate::dateFormat( 'H:i' ) )
			->getFormatter( Format::datetime( 'H:i:s', 'H:i' ) )
			->setFormatter( Format::datetime( 'H:i', 'H:i:s' ) ),
		Field::inst( 'jam_istirahat' )
			->validator( Validate::dateFormat( 'H:i' ) )
			->getFormatter( Format::datetime( 'H:i:s', 'H:i' ) )
			->setFormatter( Format::datetime( 'H:i', 'H:i:s' ) ),
		Field::inst( 'jam_kembali' )
			->validator( Validate::dateFormat( 'H:i' ) )
			->getFormatter( Format::datetime( 'H:i:s', 'H:i' ) )
			->setFormatter( Format::datetime( 'H:i', 'H:i:s' ) ),
		Field::inst( 'jam_pulang' )
			->validator( Validate::dateFormat( 'H:i' ) )
			->getFormatter( Format::datetime( 'H:i:s', 'H:i' ) )
			->setFormatter( Format::datetime( 'H:i', 'H:i:s' ) ),
		Field::inst( 'kegiatan' )
	)
	->process( $_POST )
	->json();
