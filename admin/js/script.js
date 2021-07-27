function check_user() {
	if ($("#chk_user").val() !== undefined) {
		if ($("#chk_user").val() == 1) {
			$("#dialogFail").modal();
			setTimeout(() => {
				window.location = '../login/login.php';
			}, 5000);
		}
	}
}


function select_view(id) {
	var param = { news_id: id }
	var urlPost = 'select.php';
	$.post(urlPost, param, function (data) {
		$('#employee_detail').html(data);
		$('#dataModal').modal('show');
	})
}


//delete news


function delete_ourwork(id) {
	if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
		$.ajax({
			type: "POST",
			url: "../../controller/ourwork_controller.php",
			data: { delete_ourwork_id: id, type: 'delete' },
			success: function (data) {
				console.log(data);
				$("#row-" + id).remove();
			}
		});
	}
	return false;
}

var Upload = function (file) {
	this.file = file;
};

Upload.prototype.getType = function () {
	return this.file.type;
};
Upload.prototype.getSize = function () {
	return this.file.size;
};
Upload.prototype.getName = function () {
	return this.file.name;
};

