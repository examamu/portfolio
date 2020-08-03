



document.addEventListener("DOMContentLoaded", function(){

for(let i = 1; i <= num; i++) {

  var modal = document.getElementById('modal_window');
  var value = 'description' + i;
  var btn = document.getElementById(value);
  var attr = document.getElementById('post_description');
  console.log(attr);
  btn.addEventListener('click', function() {
    if (typeof btn !== 'undefined') {
        modal.style.display = 'block';
        attr.setAttribute("value", i-1);
    }
  });
}

window.addEventListener('click', function(e) {
    if (e.target == modal) {
      modal.style.display = 'none';
      attr.setAttribute("value", "");
    }
});


}, false);