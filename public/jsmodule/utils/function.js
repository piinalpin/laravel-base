const CONFIRM_DELETE = function(func, id) {
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
            func(id);
        } else if (result.dismiss === 'cancel') {
            swal(
              'Cancelled',
              '',
              'error'
            )
        }
    });
}

const SUCCESS = function() {
    swal({
        title: "Success",  
        type: "success",
        confirmButtonText: "OK",
    })
}

const StringUtils = {
    isNotBlank : function (txt) {
        return txt != undefined && txt != null && txt.length > 0 && txt != "";
    },
    isBlank : function (txt) {
        return !StringUtils.isNotBlank(txt);
    }
};

function createLink(text, colorBtn, iconObj, attr) {
    if(colorBtn == undefined) colorBtn = BUTTON_DEFAULT;
    if(attr == undefined || (typeof attr).toLowerCase() != "object") attr = {};
    if(iconObj == undefined || (typeof iconObj).toLowerCase() != "object") iconObj = {};
    var link = $("<a>");
    link.addClass(colorBtn);
    if((typeof text).toLowerCase() == "string") {
        var span = $("<span>");
        span.html(text);
        text = span;
    }
    var keysAttr = Object.keys(attr);
    if(keysAttr.length > 0) {
        keysAttr.forEach(function (key) {
            link.attr(key, attr[key]);
        });
    }
    if(iconObj.hasOwnProperty("icon")) {
        var icon = $("<i>");
        icon.addClass(iconObj.icon);
        if(iconObj.type == undefined) iconObj["type"] = "prev";
        if(iconObj.type == "prev"){
            link.append(icon, text);
        }else{
            link.append(text, icon);
        }
    }else{
        link.append(text);
    }
    return link;
}

function createButton(text, colorBtn, iconObj, attr) {
    if(colorBtn == undefined) colorBtn = BUTTON_DEFAULT;
    if(attr == undefined || (typeof attr).toLowerCase() != "object") attr = {};
    if(iconObj == undefined || (typeof iconObj).toLowerCase() != "object") iconObj = {};
    var button = $("<button>");
    button.addClass("btn " + colorBtn);
    if((typeof text).toLowerCase() == "string") {
        var span = $("<span>");
        span.html(text);
        text = span;
    }
    var keysAttr = Object.keys(attr);
    if(keysAttr.length > 0) {
        keysAttr.forEach(function (key) {
            button.attr(key, attr[key]);
        });
    }
    if(iconObj.hasOwnProperty("icon")) {
        var icon = $("<i>");
        icon.addClass(iconObj.icon);
        if(iconObj.type == undefined) iconObj["type"] = "prev";
        if(iconObj.type == "prev"){
            button.append(icon, text);
        }else{
            button.append(text, icon);
        }
    }else{
        button.append(text);
    }
    return button;
}

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