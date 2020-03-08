const BASE_URL = 'http://localhost:8000/api/v1';

const BASIC_AUTH_USERNAME = 'kirito';

const BASIC_AUTH_PASSWORD = 'alicization';

const BUTTON_EDIT = function(id) {
	return '<button type="button" id="btnEdit" data-toggle="modal" data-target="#myModal" data-id="' + id + '" class="btn btn-warning btn-rounded btn-icon" style="padding: 0;"><i class="mdi mdi-lead-pencil"></i></button>'
};

const BUTTON_DELETE = function(id) {
	return '<button type="button" id="btnDelete" data-id="' + id + '" class="btn btn-danger btn-rounded btn-icon" style="padding: 0;"><i class="mdi mdi-delete"></i></button>'
};

const HEADERS = {
	'Authorization': 'Bearer ' + localStorage.getItem('token')
};

const ROLES = [
	{
		id: 'ADMINISTRATOR',
		text: 'ADMINISTRATOR',
	},
	{
		id: 'OPS',
		text: 'OPS'
	}
];

