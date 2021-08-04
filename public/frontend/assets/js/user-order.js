$(document).ready(function() {
	"use strict";

	$('#orders-table').DataTable({
		order: [[ 0, "desc" ]],
		processing: true,
		serverSide: true,
		ajax: '/dashboard/user-orders',
		columns: [
			{ data: 'invoice_id', name: 'invoice_id' },
			{ data: 'billing_address', name: 'billing_address' },
			{ data: 'status', name: 'status' },
			{ data: 'created_at', name: 'created_at' },
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});
});