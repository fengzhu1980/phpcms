$(document).ready(function () {
  ClassicEditor
    .create(document.querySelector('#body'))
    .catch(error => {
      console.error(error);
    });
});

// Select box
$(document).ready(function() {
  $('#selectAllBoxes').click(function(event){
    if (this.checked) {
      $('.checkBoxes').each(function(){
        this.checked = true;
      });
    } else {
      $('.checkBoxes').each(function(){
        this.checked = false;
      });
    }
  });

  // Loading picture
  // var div_box = "<div id='load-screen'><div id='loading'></div></div>";
  // $("body").prepend(div_box);
  // $('#load-screen').delay(700).fadeOut(600, function() {
  //   $(this).remove();
  // });
});

// Load user online
function loadUserOnline () {
  $.get('functions.php?onlineusers=result', function(data) {
    $('.usersonline').text(data);
  });
}

// setInterval(function() {
//   loadUserOnline();
// }, 500);