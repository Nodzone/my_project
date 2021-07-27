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

function updateStdPartner() {
  $(".btn-dairy-id").click(function () {
    var $this = $(this);
    var id = $this.attr('data-id');
    $.post('../../controller/diary_controller.php', { type: 'updateStdPartner', id: id }, function (data) {
      var obj = JSON.parse(data);
      if (obj.diary_status == 2) {
        $this.parents('tr').find('font').attr('color', 'green');
        $this.parents('tr').find('font').text('ตรวจแล้ว');
      }
    })
  })
}

$(document).ready(function () {
  check_user();
  updateStdPartner();
})