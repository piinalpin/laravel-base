const TABLE = $('#DataTable');
let DATA_TABLE;

let user = {
	endpoint: '/user',
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
			return Request.all(user.endpoint).then((data) => {
				DATA_TABLE = TABLE.DataTable({
					'data': data,
					'columns': [
						{ 
							'data': 'fullName',
							'render': function(data, type, row) {
								const btnName = createLink(data, 'btn-link', null, { 
									'id': 'btnDetail',
									'data-toggle': 'modal',
									'data-target': '#modalDetail',
									'data-id': data,
									'href': '#'
								});
								return btnName.prop('outerHTML');
							}
						},
						{ 'data': 'username' },
						{ 'data': 'role' },
						{ 
							'data': 'createdAt',
							'render': function(data, type, row, meta) {
								return moment(data).format('MMMM Do YYYY, h:mm:ss a');
							}
						},
						{
							'data': 'id',
							'render': function(data, type, row, meta) {
								const btnEdit = createButton(null, 'btn btn-warning btn-rounded btn-sm btn-icon', 
									{ 'icon': 'fa fa-pencil' }, { 
									'id': 'btnEdit',
									'data-toggle': 'modal',
									'data-target': '#myModal',
									'data-id': data,
									'style': 'border-radius: 50%;'
								});
								const btnDelete = createButton(null, 'btn btn-danger btn-rounded btn-sm btn-icon', 
									{ 'icon': 'fa fa-trash' }, { 
									'id': 'btnDelete',
									'data-id': data,
									'style': 'border-radius: 50%;'
								});
								return btnEdit.prop('outerHTML') + ' ' + btnDelete.prop('outerHTML');
							},
							'width': '5%'
						}
					],
					searching: true, paging: false, info: false
				});
			});
		},
		add: function(data) {
			Request.create(user.endpoint, data).then((res) => {
				if (res != undefined) {
					SUCCESS();
					user.reload();
				}
			});
		},
		update: function(data) {
			Request.update(user.endpoint, data).then((res) => {
				if (res != undefined) {
					SUCCESS();
					user.reload();
				}
			});
		},
		delete: function(id) {
			Request.delete(user.endpoint, id).then((res) => {
				if (res != undefined) {
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
	const data = getRowDataTable(DATA_TABLE, $(this));
	CONFIRM_DELETE(user.process.delete, data.id);
}).delegate('#btnDetail', 'click', function(e) {
	e.preventDefault();
	const data = getRowDataTable(DATA_TABLE, $(this));
	$('#modalDetailName').text(data.fullName);
	$('#modalDetailEmail').text(data.email);
	$('#modalDetailUsername').text(data.username);
	$('#modalDetailRole').text(data.role);
});

$('a#btnAdd').on('click', function(ev) {
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