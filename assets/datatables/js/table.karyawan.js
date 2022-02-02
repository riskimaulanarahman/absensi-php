
/*
 * Editor client script for DB table absensi
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: '../../absensi/assets/datatables/php/table.karyawan.php',
		table: '#karyawan',
		fields: [
			{
				"label": "rfid:",
				"name": "rfid"
			},
			{
				"label": "username:",
				"name": "username"
			},
			{
				"label": "password:",
				"name": "password"
			},
			{
				"label": "nidn:",
				"name": "nidn"
			},
			{
				"label": "nama:",
				"name": "nama"
			},
			{
				"label": "jenis_kelamin:",
				"name": "jenis_kelamin",
				"type": "select",
				"options": [
					"Laki - Laki",
					"Perempuan"
				]
			},
			{
				"label": "tgl_lahir:",
				"name": "tgl_lahir",
				"type": "datetime",
				"format": "YYYY-MM-DD"
			},
			{
				"label": "alamat:",
				"name": "alamat"
			},
			{
				"label": "jabatan:",
				"name": "jabatan",
				"type": "select",
				"options": [
					"Administrator",
					"Karyawan",
					"Staff",
					"Wakil Ketua"
				]
			},
			{
				"label": "email:",
				"name": "email"
			},
			{
				"label": "level:",
				"name": "level",
				"type": "select",
				"options": [
					"Administrator",
					"Karyawan"
				]
			}
		]
	} );

	var table = $('#karyawan').DataTable( {
		dom: 'Bfrtip',
		ajax: '../../absensi/assets/datatables/php/table.karyawan.php',
		columns: [
			{
				"data": "rfid"
			},
			{
				"data": "username"
			},
			{
				"data": "nidn"
			},
			{
				"data": "nama"
			},
			{
				"data": "jenis_kelamin"
			},
			{
				"data": "tgl_lahir"
			},
			{
				"data": "alamat"
			},
			{
				"data": "jabatan"
			},
			{
				"data": "email"
			},
			{
				"data": "level"
			},
		],
		select: true,
		lengthChange: false,
		buttons: [
			{ extend: 'create', editor: editor },
			{ extend: 'edit',   editor: editor },
			{ extend: 'remove', editor: editor }
		]
	} );
} );

}(jQuery));

