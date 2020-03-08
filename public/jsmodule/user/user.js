const TABLE = $('#DataTable');
let DATA_TABLE;

let user = {
	form: {
		clear: function() {
			$('#userForm').removeData('data');
		},
		set: function(data) {
			user.form.clear();
			if (data != undefined && data != null) {
				const form = $('#userForm');
				const input = form.find(':input');
				form.data('data', data);

				$('#role').select2({ data: ROLES }).trigger('change');

				setDataToForm(input, data);
			}
		},
	},
	process: {
		all: function() {
			return Request.all().then((data) => {
				DATA_TABLE = TABLE.DataTable({
					'data': data,
					'columns': [
						{ 'data': 'fullName' },
						{ 'data': 'email' },
						{ 'data': 'username' },
						{ 'data': 'role' },
						{ 
							'data': 'createdAt',
							'render': function(data, type, row) {
								return moment(data).format('MMMM Do YYYY, h:mm:ss a');
							}
						},
						{
							'render': function(data, type, row) {
								return BUTTON_EDIT(row.id) + ' ' + BUTTON_DELETE(row.id);
							},
							'width': '8%'
						}
					],
					searching: true, paging: false, info: false
				});
			});
		},
		add: function(data) {
			Request.create(data).then((res) => {
				console.log(res);
				if (!('error' in res)) {
					user.reload();
				}
			});
		},
		update: function(data) {
			Request.update(data).then((res) => {
				if (!('error' in res)) {
					user.reload();
				}
			});
		},
		delete: function(id) {
			Request.delete(id).then((res) => {
				if (!('error' in res)) {
					user.reload();
				}
			});
		}
	},
	reload: function() {
		$('#myModal').modal('hide');
		user.form.clear();
		DATA_TABLE.destroy();
		user.process.all();
	}
};

TABLE.delegate('#btnEdit', 'click', function(e){
	e.preventDefault();

	const data = getRowDataTable(DATA_TABLE, $(this));
	data.action = 'update';
	user.form.set(data);
}).delegate('#btnDelete', 'click', function(e) {
	e.preventDefault();
	var data = getRowDataTable(DATA_TABLE, $(this));
	swal({
		title: "Are you sure?",  
		type: "warning",
		confirmButtonText: "Confirm",
		showCancelButton: true,
		reverseButtons: true
    })
    	.then((result) => {
			if (result.value) {
				swal(
			      'Success',
			      '',
			      'success'
			    )
			    user.process.delete(data.id);
			} else if (result.dismiss === 'cancel') {
			    swal(
			      'Cancelled',
			      '',
			      'error'
			    )
			}
		})
});

$('button#btnAdd').on('click', function(ev) {
	ev.preventDefault();

	let data = {};
	data.action = 'add';
	user.form.set(data);
});

$('button#btnSaveUser').on('click', function(ev) {
	ev.preventDefault();

	let data = $('#userForm').data('data');
	const input = $('#userForm').find(':input');

	data = getDataFromForm(input, data);

	if (data != null) {
		if (data.action != 'add') user.process.update(data);
		else user.process.add(data);
	}
});

user.process.all();