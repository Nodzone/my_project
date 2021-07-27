$(document).ready(function () {

  $("#ourwork_photo").on("change", function (e) {
    var formData = new FormData();
    formData.append('file', $('#ourwork_photo')[0].files[0]);
  });

  $('#add').click(function () {
    $('#insert').val("Insert");
    $('#insert_form_company')[0].reset();
  });



  $('#insert_form_company').on("submit", function (event) {
    event.preventDefault();
    if ($('#user_company_name').val() == "") {
      alert("user_company_name is required");
    }
    else if ($('#user_company_address').val() == '') {
      alert("user_company_address is required");

    }
    else if ($('#user_company_phone').val() == '') {
      alert("user_company_phone is required");

    }
    else if ($('#user_company_fax').val() == '') {
      alert("user_company_fax is required");

    } else {
      var formData = new FormData(this);
      formData.append('user_company_address', $('#user_company_address').val());

      $.ajax({
        url: "../../controller/company_controller.php",
        method: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          $('#insert').val("Inserting");
        },
        success: function (data) {
          $('#insert_form')[0].reset();
          $('#add_data_Modal').modal('hide');

          var obj = $.parseJSON(data);
          var td = "<td>1</td > " +
            "<td>" + obj.user_company_name + "</td > " +
            "<td>" + obj.user_company_address + "</td > " +
            "<td>" + obj.user_company_phone + "</td>" +
            "<td>" + obj.user_coop_company_fax + "</td>" +
            "<td>" + obj.user_company_update_by + "</td>" +
            "<td><input type=\"button\" name=\"edit\" value=\"แก้ไข\" onclick=\"edit_data(" + obj.user_company_id + ")\" class=\"btn btn-info btn-xs\" /></td>" +
            "<td><button type=\"button\" name=\"del_ourwork\" class=\"btn btn-danger\" onclick=\"delete_ourwork(" + obj.user_company_id + ");\">ลบ</button></td>"

          if ($("input[name='type']").val() == 'insert') {
            var tr = $("<tr />", { class: 'table-success', id: 'row-' + obj.user_company_id }).append(td);
            $("table tbody").prepend(tr);
          } else {
            $("#row-" + obj.user_company_id).html(td);
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
    var user_company_id = $(this).attr("user_company_id");
    if (user_company_id != '') {
      $.ajax({
        url: "../../modal/company.php",
        method: "POST",
        data: { user_company_id: user_company_id },
        success: function (data) {
          $('#employee_detail').html(data);
          $('#dataModal').modal('show');
        }
      });
    }
  });
});


function delete_company(id) {
  if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
    $.ajax({
      type: "POST",
      url: "../../controller/company_controller.php",
      data: { delete_user_company_id: id, type: 'delete' },
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
  $("#insert").text('เพิ่ม');
  $("input[name='type']").val('insert');
}


function edit_data(id) {
  $(".modal-title").text('แก้ไขผลงาน');
  $("#insert").text('แก้ไข');
  $("input[name='type']").val('edit')

  $.post('../../controller/company_controller.php', { type: 'showDetail', id: id }, function (res) {
    var obj = $.parseJSON(res);
    $("#user_company_id").val(obj.user_company_id);
    $("#user_company_name").val(obj.user_company_name);
    $("#user_company_address").val(obj.user_company_address);
    $("#user_company_phone").val(obj.user_company_phone);
    $("#user_company_fax").val(obj.user_company_fax);
    $("#user_company_update_by").val(obj.user_company_update_by);
    $("#user_company_update_date").val(obj.user_company_update_date);


  })

  $("#add_data_Modal").modal();

}