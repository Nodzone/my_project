$(document).ready(function () {

  $("#ourwork_photo").on("change", function (e) {
    var formData = new FormData();
    formData.append('file', $('#ourwork_photo')[0].files[0]);
  });

  $('#add').click(function () {
    $('#insert').val("ทดสอบ");
    $('#insert_form_ourwork')[0].reset();
  });



  $('#insert_form_ourwork').on("submit", function (event) {
    event.preventDefault();
    if ($('#ourwork_title').val() == "") {
      alert("ourwork_title is required");
    }
    else if ($('#ourwork_detail').val() == '') {
      alert("ourwork_detail is required");

    } else {
      var formData = new FormData(this);
      formData.append('ourwork_detail', $('#ourwork_detail').val());

      $.ajax({
        url: "../../controller/ourwork_controller.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $('#insert').val("Inserting");
        },
        success: function (data) {
          $('#insert_form_ourwork')[0].reset();
          $('#add_data_Modal').modal('hide');

          var obj = $.parseJSON(data);
          var td = "<td>1</td > " +
            "<td>" + obj.ourwork_title + "</td > " +
            "<td><img src='../img/ourwork/" + obj.ourwork_photo + "' style='width:75px;height:75px;'/></td>" +
            "<td>" + obj.ourwork_detail + "</td > " +
            "<td>" + obj.ourwork_create_date + "</td>" +
            "<td><button class=\"btn btn-warning\" onclick=\"window.open('../page_ourwork.php?ourwork=" + obj.ourwork_id + "'); \">ดู</button></td>" +
            "<td><input type=\"button\" name=\"edit\" value=\"แก้ไข\" onclick=\"edit_data(" + obj.ourwork_id + ")\" class=\"btn btn-info btn-xs\" /></td>" +
            "<td><button type=\"button\" name=\"del_ourwork\" class=\"btn btn-danger\" onclick=\"delete_ourwork(" + obj.ourwork_id + ");\">ลบ</button></td>"

          if ($("input[name='type']").val() == 'insert') {
            var tr = $("<tr />", { class: 'table-success', id: 'row-' + obj.ourwork_id }).append(td);
            $("table tbody").prepend(tr);
          } else {
            $("#row-" + obj.ourwork_id).html(td);
          }
          var num = 0
          $.map($("table tbody tr"), function (i) {
            num = num + 1
            $(i).find('td').eq(0).text(num);
          })
        }
      });
    }
  });

  $('.view_data').on(function () {
    var ourwork_id = $(this).attr("ourwork_id");
    if (ourwork_id != '') {
      $.ajax({
        url: "../../modal/ourwork.php",
        method: "POST",
        data: { ourwork_id: ourwork_id },
        success: function (data) {
          $('#employee_detail').html(data);
          $('#dataModal').modal('show');
        }
      });
    }
  });
});


function delete_ourwork(id) {
  if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
    $.ajax({
      type: "POST",
      url: "../../controller/ourwork_controller.php",
      data: { delete_ourwork_id: id, type: 'delete' },
      success: function (data) {
        $("#row-" + id).remove();
        var num = 0
        $.map($("table tbody tr"), function (i) {
          num = num + 1
          $(i).find('td').eq(0).text(num);
        })
      }
    });
  }
  return false;
}

function add_form() {
  $("#add_data_Modal").modal();
  $(".modal-title").text('เพิ่มผลงาน');
  $("#insert").val('เพิ่ม');
  $("input[name='type']").val('insert');
}


function edit_data(id) {
  $(".modal-title").text('แก้ไขผลงาน');
  $("#insert").val('แก้ไข');
  $("input[name='type']").val('edit')

  $.post('../../controller/ourwork_controller.php', { type: 'showDetail', id: id }, function (res) {
    var obj = $.parseJSON(res);
    $("#ourwork_id").val(obj.ourwork_id);
    $("#ourwork_title").val(obj.ourwork_title);
    $("#ourwork_detail").val(obj.ourwork_detail);
    $("#ourwork_create_date").val(obj.ourwork_create_date);
    $("#ourwork_create_by").val(obj.ourwork_create_by);

    if ($(".img-edit").length > 0) $(".img-edit").remove();
    $("#ourwork_photo").after("<img src='../img/ourwork/" + obj.ourwork_photo + "' style='width:75px;height:75px;' class='img-edit'/>")

  })

  $("#add_data_Modal").modal();

}