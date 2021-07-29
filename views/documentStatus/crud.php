
<script>

var editor; // use a global for the submit and return data rendering in the examples

		$this->createTable('tbl_documenttype', array(
            'ID' => 'pk AUTO_INCREMENT',
			'Name' => 'varchar(200)',
			'ParentID' => 'int(11)',
			'DateCreated' => 'datetime',
        ));
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../index.php/getDocumentStatus",
        table: "#example",
        fields: [ {
                label: "ID:",
                name: "ID"
            }, {
                label: "Name:",
                name: "Name"
            }, {
                label: "DateCreated:",
                name: "DateCreated"
            }
        ]
    } );
 
    $('#example').DataTable( {
        dom: "Bfrtip",
        ajax: "../php/staff.php",
        columns: [
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.first_name+' '+data.last_name;
            } },
            { data: "position" },
            { data: "office" },
            { data: "extn" },
            { data: "start_date" },
            { data: "salary", render: $.fn.dataTable.render.number( ',', '.', 0, '$' ) }
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );

</script>