const BASE_URL = 'http://localhost:8000/api/v1';

const BASIC_AUTH_USERNAME = 'kirito';

const BASIC_AUTH_PASSWORD = 'alicization';

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

