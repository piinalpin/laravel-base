let user = {
	endpoint: '/user',
	data: {},
	form: {
		clear: function() {
			$('#userMenuForm').removeData('data');
			$('input:checkbox[class=flat]').prop('checked', false).iCheck({
			     checkboxClass: 'icheckbox_flat-green'
			});
			$("input:checkbox[class=flat]").prop('disabled', true);
		},
		set: function(data) {
			$("input:checkbox[class=flat]").removeAttr('disabled');
			$('input:checkbox[class=flat]').iCheck({
			     checkboxClass: 'icheckbox_flat-green'
			});
			if (data != undefined && data != null) {
				const form = $('#userMenuForm');
				const input = form.find(':input');
				form.data('data', data);
				

				setDataToForm(input, data);
			}
		},
	},
	process: {
		all: function() {
			Request.all(user.endpoint).then((res) => {
				let selectData = [];
				res.forEach((data) => {
					const option = {
						id: data.id,
						text: data.fullName
					}
					selectData.push(option);
				});
				$('#role').select2({ data: selectData }).trigger('change');
			});
			$('#role').change(function(e) {
				user.data.id = e.target.value;
				button('hide');
				user.form.clear();
				Request.detail(user.endpoint, e.target.value).then((data) => {
					data.menu.forEach((menu) => {
						$('#' + menu).prop('checked', true).iCheck({
						     checkboxClass: 'icheckbox_flat-green checked'
						});
					});
				});
			});
		},
		update: function(data) {
			Request.create(user.endpoint.concat('/', data.id, '/menu'), data).then((res) => {
				if (!('error' in res)) {
					SUCCESS();
					user.process.all();
				}
			})
		}
	}
}

$('#btnUpdateMenu').click(function() {
	let data = user.data;

	data.action = 'update';
	user.form.set(data);
	button('show');
});

$('#btnSave').click(function(ev) {
	let data = user.data;

	let menu = [];
	$.each($("input[class='flat']:checked"), function(){
		menu.push($(this).attr("id"));
    });
    data.menu = menu;
    user.process.update(data);
});

$('#btnCancel').click(function() {
	$("input:checkbox[class=flat]").prop('disabled', true);
	$('input:checkbox[class=flat]').iCheck({
	     checkboxClass: 'icheckbox_flat-green disabled'
	});
	button('hide');
});

function button(type) {
	if (type == 'show') {
		$('#role').prop('disabled', true);
		$('#btnUpdateMenu').hide();
		$('#btnSave').show();
		$('#btnCancel').show();
	} else if (type == 'hide') {
		$('#role').removeAttr('disabled');
		$('#btnUpdateMenu').show();
		$('#btnSave').hide();
		$('#btnCancel').hide();
	}
}

user.process.all();