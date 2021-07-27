$(document).ready(function () {

  $("#news_picture").on("change", function (e) {
    var formData = new FormData();
    formData.append('file', $('#news_picture')[0].files[0]);
  });

  $('#add').click(function () {
    $('#insert').val("Insert");
    $('#insert_form')[0].reset();
  });



  $('#insert_form').on("submit", function (event) {
    event.preventDefault();
    if ($('#news_topic').val() == "") {
      alert("news_topic is required");
    }
    else if ($('#news_detail').val() == '') {
      alert("news_detail is required");

    } else {
      var formData = new FormData(this);
      formData.append('news_detail', $('#news_detail').val());

      $.ajax({
        url: "../../controller/news_controller.php",
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
            "<td>" + obj.news_topic + "</td > " +
            "<td><img src='../img/news/" + obj.news_picture + "' style='width:75px;height:75px;'/></td>" +
            "<td>" + obj.news_detail + "</td > " +
            "<td>" + obj.news_update_date + "</td>" +
            "<td><button class=\"btn btn-warning\" onclick=\"window.open('../page_news.php?news=" + obj.news_id + "'); \">ดู</button></td>" +
            "<td><input type=\"button\" name=\"edit\" value=\"แก้ไข\" onclick=\"edit_data(" + obj.news_id + ")\" class=\"btn btn-info btn-xs\" /></td>" +
            "<td><button type=\"button\" name=\"del_news\" class=\"btn btn-danger\" onclick=\"delete_news(" + obj.news_id + ");\">ลบ</button></td>"

          if ($("input[name='type']").val() == 'insert') {
            var tr = $("<tr />", { class: 'table-success', id: 'row-' + obj.news_id }).append(td);
            $("table tbody").prepend(tr);
          } else {
            $("#row-" + obj.news_id).html(td);
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
    var news_id = $(this).attr("news_id");
    if (news_id != '') {
      $.ajax({
        url: "../../modal/news.php",
        method: "POST",
        data: { news_id: news_id },
        success: function (data) {
          $('#employee_detail').html(data);
          $('#dataModal').modal('show');
        }
      });
    }
  });
});


function delete_news(id) {
  if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
    $.ajax({
      type: "POST",
      url: "../../controller/news_controller.php",
      data: { delete_news_id: id, type: 'delete' },
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
  $(".modal-title").text('เพิ่มข่าว');
  $("#insert").text('เพิ่ม');
  $("input[name='type']").val('insert');
}


function edit_data(id) {
  $(".modal-title").text('แก้ไขข่าว');
  $("#insert").text('แก้ไข');
  $("input[name='type']").val('edit')

  $.post('../../controller/news_controller.php', { type: 'showDetail', id: id }, function (res) {
    var obj = $.parseJSON(res);
    $("#news_id").val(obj.news_id);
    $("#news_topic").val(obj.news_topic);
    $("#news_detail").val(obj.news_detail);
    $("#news_create_date").val(obj.news_create_date);
    $("#news_create_by").val(obj.news_create_by);
    $("#news_update_date").val(obj.news_update_date);
    $("#news_update_by").val(obj.news_update_by);
    $("#news_update_by").val(obj.news_update_by);
    if ($(".img-edit").length > 0) $(".img-edit").remove();
    $("#news_picture").after("<img src='../img/news/" + obj.news_picture + "' style='width:75px;height:75px;' class='img-edit'/>")

  })

  $("#add_data_Modal").modal();

}