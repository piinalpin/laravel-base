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

const STUFF_CATEGORIES = [
	{
		id: 't-shirt',
		text: 'T-SHIRT',
	},
	{
		id: 'pants',
		text: 'PANTS'
	},
	{
		id: 'shoes',
		text: 'SHOES'
	}
];

const STUFF_SIZE_TSHIRT = [
	{
		id: 'S',
		text: 'S'
	},
	{
		id: 'M',
		text: 'M'
	},
	{
		id: 'L',
		text: 'L'
	},
	{
		id: 'XL',
		text: 'XL'
	},
	{
		id: 'XXL',
		text: 'XXL'
	},
	{
		id: 'XXXL',
		text: 'XXXL'
	},
	{
		id: 'XXXXL',
		text: 'XXXXL'
	}
];

const STUFF_SIZE_PANTS = [
	{
		id: '27',
		text: '27'
	},
	{
		id: '28',
		text: '28'
	},
	{
		id: '29',
		text: '29'
	},
	{
		id: '30',
		text: '30'
	},
	{
		id: '31',
		text: '31'
	},
	{
		id: '32',
		text: '32'
	},
	{
		id: '33',
		text: '33'
	},
	{
		id: '34',
		text: '34'
	},
	{
		id: '35',
		text: '35'
	},
	{
		id: '36',
		text: '36'
	},
	{
		id: '37',
		text: '37'
	},
	{
		id: '38',
		text: '38'
	},
	{
		id: '39',
		text: '39'
	},
	{
		id: '40',
		text: '40'
	},
	{
		id: '42',
		text: '42'
	},
	{
		id: '44',
		text: '44'
	},
	{
		id: '46',
		text: '46'
	},
	{
		id: '48',
		text: '48'
	},
	{
		id: '50',
		text: '50'
	},
	{
		id: '52',
		text: '52'
	},
	{
		id: '54',
		text: '54'
	},
	{
		id: '56',
		text: '56'
	}
];

const STUFF_SIZE_SHOES = [
	{
		id: '27',
		text: '27'
	},
	{
		id: '27.5',
		text: '27.5'
	},
	{
		id: '28',
		text: '28'
	},
	{
		id: '28.5',
		text: '28.5'
	},
	{
		id: '29',
		text: '29'
	},
	{
		id: '30',
		text: '30'
	},
	{
		id: '30.5',
		text: '30.5'
	},
	{
		id: '31.5',
		text: '31.5'
	},
	{
		id: '32.5',
		text: '32.5'
	},
	{
		id: '33',
		text: '33'
	},
	{
		id: '34',
		text: '34'
	},
	{
		id: '35',
		text: '35'
	},
	{
		id: '36',
		text: '36'
	},
	{
		id: '37',
		text: '37'
	},
	{
		id: '38',
		text: '38'
	},
	{
		id: '39',
		text: '39'
	},
	{
		id: '40',
		text: '40'
	},
	{
		id: '41',
		text: '41'
	},
	{
		id: '42',
		text: '42'
	},
	{
		id: '43',
		text: '43'
	},
	{
		id: '44',
		text: '44'
	},
	{
		id: '45',
		text: '45'
	},
	{
		id: '46',
		text: '46'
	},
	{
		id: '47',
		text: '47'
	},
	{
		id: '48',
		text: '48'
	},
	{
		id: '49',
		text: '49'
	},
	{
		id: '50',
		text: '50'
	}
];

const USER_MENU = ["user-maintenance"];