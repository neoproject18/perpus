function swal_show(result) {
	swal({
		title: result['title'],
		text: result['message'],
		timer: 1500,
		buttons: false,
		dangerMode: false,
		icon: result['type']
	});
}

function swal_alert(title, msg, icon) {
	swal({
		title: title,
		text: msg,
		timer: 1500,
		buttons: false,
		dangerMode: false,
		icon: icon
	});
}

function swal_confirm_ok(result) {
	swal({
		title: result['title'],
		text: result['message'],
		icon: result['type']
	}).then((value) => {
		setTimeout("window.open(self.location, '_self');", 1500);
	});
}





// 
function swal_warning(result) {
	swal({
		title: result['message'],
		text: result['message'],
		timer: 1500,
		buttons: false,
		dangerMode: false,
		icon: result['type']
	});
}

function swal_error(result) {
	swal({
		title: result['message'],
		text: result['message'],
		timer: 1500,
		buttons: false,
		dangerMode: false,
		icon: result['type']
	});
}