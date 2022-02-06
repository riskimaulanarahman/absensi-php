
/*
 * Editor client script for DB table absensi
 * Created by http://editor.datatables.net/generator
 */

(function($){

$(document).ready(function() {
	var editor = new $.fn.dataTable.Editor( {
		ajax: '../../absensi/assets/datatables/php/table.absensi.php',
		table: '#absensi',
		fields: [
			{
				"label": "rfid:",
				"name": "rfid"
			},
			{
				"label": "nama:",
				"name": "nama"
			},
			{
				"label": "nidn:",
				"name": "nidn"
			},
			{
				"label": "tanggal:",
				"name": "tanggal",
				"type": "datetime",
				"format": "YYYY-MM-DD"
			},
			{
				"label": "jam_masuk:",
				"name": "jam_masuk",
				"type": "datetime",
				"format": "HH:mm"
			},
			{
				"label": "jam_istirahat:",
				"name": "jam_istirahat",
				"type": "datetime",
				"format": "HH:mm"
			},
			{
				"label": "jam_kembali:",
				"name": "jam_kembali",
				"type": "datetime",
				"format": "HH:mm"
			},
			{
				"label": "jam_pulang:",
				"name": "jam_pulang",
				"type": "datetime",
				"format": "HH:mm"
			},
			// {
			// 	"label": "kegiatan:",
			// 	"name": "kegiatan",
			// 	"type": "textarea"
			// }
		]
	} );

	var table = $('#absensi').DataTable( {
		dom: 'Bfrtip',
		ajax: '../../absensi/assets/datatables/php/table.absensi.php',
		columns: [
			{
				"data": "rfid"
			},
			{
				"data": "nama"
			},
			{
				"data": "nidn"
			},
			{
				"data": "tanggal"
			},
			{
				"data": "jam_masuk"
			},
			{
				"data": "jam_istirahat"
			},
			{
				"data": "jam_kembali"
			},
			{
				"data": "jam_pulang"
			},
			// {
			// 	"data": "kegiatan"
			// }
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

