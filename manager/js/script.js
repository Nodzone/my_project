function check_user()
{
  if($("#chk_user").val() !== undefined){
    if($("#chk_user").val() == 1){
      $("#dialogFail").modal();
      setTimeout(() => {
        window.location = '../login/login.php';
      }, 5000);
    }
  }
}

$(document).ready(function(){
  check_user();
})