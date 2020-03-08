const StringUtils = {
    isNotBlank : function (txt) {
        return txt != undefined && txt != null && txt.length > 0 && txt != "";
    },
    isBlank : function (txt) {
        return !StringUtils.isNotBlank(txt);
    }
};

function clearNameInput(input) {
    var me = input;
    if(StringUtils.isNotBlank(me.attr("id"))) return me.attr("id").replace(/^(cb\-|txt\-|rb\-.*\-)/gm, "");
    else return "";
}

function getDataFromForm(input, data) {
	if(data == undefined) data = {};
    if(data == null) data = {};

    input.each(function(){
        var me = $(this);
        data = setInputToData(me, data);
    });

    return data;
}

function getRowDataTable(data, el) {
	const row = el.parents('tr');
	return data.row(row[0]).data();
}

function setDataToForm(input, data) {
	input.each(function() {
		let me = $(this);
		let name = clearNameInput(me);

		if (!(me.is(':checkbox') || me.is(':radio'))) {
			let tmp = data;
			let breakException = {};
			try {
				if (tmp[name] != undefined) {
					if (Array.isArray(tmp[name])) {

					} else if ((typeof tmp[name]).toLowerCase() == 'object') {
						tmp = tmp[name];
					} else if ((typeof tmp[name]).toLowerCase() == 'string') {
						me.val(tmp[name]).trigger('change');
					}
				} else {
					me.val('').trigger('change');
					throw breakException;
				}
				tmp = data;
			} catch (e) {
				if (e != breakException) throw e;
				tmp = data;
			}
		} else {
			let tmp = data;
			if (tmp[name] != undefined) {
				if (Array.isArray(tmp[name])) {

				} else if ((typeof tmp[name]).toLowerCase() == 'object') {
					tmp = tmp[name];
				} else {
					let bool = tmp[name].toString().toUpperCase();
					if (me.is(':checkbox')) {
						if (bool == '1' || bool == 'Y' || bool == 'true') me.prop('checked', true);
						else me.prop('checked', false);
					} else if (me.is(':radio')) {
						if (bool == me.val().toUpperCase()) me.prop('checked', true);
						else me.prop('checked', false);
					}
				}
			}
			tmp = data;
		}
	});
}

function setInputToData(input, data) {
    if(data == undefined) data = {};
    if(data == null) data = {};

    var me = input;
    var name = clearNameInput(me);
    if (StringUtils.isNotBlank(name)) {
        if (me.is(":checkbox")) {
            data[name] = me.is(":checked") ? "Y" : "N";
        } else if (me.is(":radio")) {
            var nameArray = me.attr("name");
            var checkOnGroupRadio = me.parent().find(":radio[name="+nameArray+"]:checked");
            if(checkOnGroupRadio.length > 0) data[name] = checkOnGroupRadio.val().toUpperCase();
        } else {
            if (StringUtils.isNotBlank(me.val())) {
                data[name] = me.val();
            } else {
                if (me.is("input")) {
                    data[name] = "";
                }
            }
        }
    }

    return data;
}