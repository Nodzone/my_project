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

function insser_doc() {
  $("#insert_form").on("submit", function (event) {
    event.preventDefault();
    var param = $(this).serialize();
    var urlPost = 'fastfix/insert.php';
    $.post(urlPost, param, function (data) {
      $('#insert_form')[0].reset();
      $('#add_diary_Modal').modal('hide');
      $('#employee_table table tbody').append(data);
    })
  });
}

function select_view(id) {
  var param = { diary_id: id }
  var urlPost = 'fastfix/select.php';
  $.post(urlPost, param, function (data) {
    $('#employee_detail').html(data);
    $('#dataModal').modal('show');
  })
}

$(document).ready(function () {
  check_user();
})

//get the input and UL list
var input = document.getElementById('filesToUpload');
var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
  list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
  //add to list
  var li = document.createElement('li');
  li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
  list.append(li);
}

function isNumberKey(evt) {
  var charCode = (evt.which) ? evt.which : evt.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57))
    return false;
  return true;
}