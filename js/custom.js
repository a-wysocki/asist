var editor; // use a global for the submit and return data rendering in the examples

$(document).ready(function() {
     
    var table = $('#agents').DataTable( {
        lengthChange: false,
        dom: 'Blfrtip',
        buttons: [
            {
                extend: 'excel',
                split: [ 'csv', 'pdf'],
            }
        ],
		
	} );
        table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        table.on('click', 'tr', function () {
        var val= $('td', this).eq(2).text(); //eq(2) increase the value inside eq() will display the txt column wise.
        $('#DescModal').modal("show");
        $('.text-center').text(val);
     
    });

	editor = new $.fn.dataTable.Editor( {
		ajax: "ajax/staff.php",
		table: "#example",
		fields: [ {
				label: "Id:",
				name: "id"
			},{
				label: "Agencja:",
				name: "aid"
			}, {
				label: "Nazwa:",
				name: "name"
			}, {
				label: "Status:",
				name: "status"
			}, {
				label: "Data:",
				name: "date"
			}, {
				label: "Ip:",
				name: "ip"
			}
		]
	} );
        
       $('tbody tr').on('click',function(){
            var myDataAttr = $(this).data('id');

            $("#dataid").val(myDataAttr);

            var table ="";   
            var id = $("#dataid").val(); 
            var table = $('#example').DataTable( {
                    lengthChange: false,
                    bDestroy: true,
                      ajax: {
                            url: 'ajax/staff.php',
                            //dataType : "json",
                            type: 'POST',
                            data: {"id" : myDataAttr }
                        },
                    columns: [
                        { data: "id" }, 
                        { data: "aid" },
                        { data: "name" },
                            { data: "status" },
                            { data: "date" },
                            { data: "ip" }

                    ],
                    select: true,
            } );

	// Display the buttons
	new $.fn.dataTable.Buttons( table, [
		{ extend: "create", editor: editor },
		{ extend: "edit",   editor: editor },
		{ extend: "remove", editor: editor }
	] );

	table.buttons().container()
		.appendTo( $('.col-md-6:eq(0)', table.table().container() ) );
       
} );
 }); 