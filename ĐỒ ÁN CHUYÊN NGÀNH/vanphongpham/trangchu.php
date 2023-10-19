<div class="article">
<div class="slider">
<div class="slides">
  <input type="radio" name="radio-btn" id="radio1">
  <input type="radio" name="radio-btn" id="radio2">
  <input type="radio" name="radio-btn" id="radio3">
  <input type="radio" name="radio-btn" id="radio4">
  <input type="radio" name="radio-btn" id="radio5">
<div class="slide first">
  <a href ="anh1">
    <img src="img/anh1.jpg" alt=""></a>
</div>
<div class="slide">
  <a href ="anh2">
    <img src="img/anh2.jpg" alt=""></a>
</div>
<div class="slide">
  <a href ="anh3">
    <img src="img/anh3.jpg" alt=""></a>
</div>
<div class="slide">
  <a href ="anh4">
    <img src="img/anh4.jpg" alt=""></a>
</div>
<div class="slide">
  <a href ="anh5">
    <img src="img/anh5.jpg" alt=""></a>
</div>
<script type="text/javascript">
  var counter = 1;
  setInterval(function(){
  document.getElementById('radio' + counter).checked = true;
  counter++;
  if(counter > 5){
  counter = 1;
  }
  }, 3000);
</script>
</div>