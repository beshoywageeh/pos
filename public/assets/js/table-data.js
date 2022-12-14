$(function(e) {
	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: true,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: [ 10, 25, 50, -1 ],
		}
	});
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );


	$('#example2').DataTable({
        lengthChange: true,
        lengthMenu: [ 10, 20, 30, 40 ],
        responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		}
	});

    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	//Details display datatable
	$('#example-1').DataTable( {
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			lengthMenu: '_MENU_',
		},
		responsive: {
			details: {
				display: $.fn.dataTable.Responsive.display.modal( {
					header: function ( row ) {
						var data = row.data();
						return 'Details for '+data[0]+' '+data[1];
					}
				} ),
				renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
					tableClass: 'table border mb-0'
				} )
			}
		}
	} );
});
