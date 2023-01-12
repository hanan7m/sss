<?php
    if(isset($_SESSION['message'])) :
?>
<html>
    <head>
<style>
    div{direction: rtl;
          text-align: center;}
    .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}
.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}
.closebtn:hover {
  color: black;
}

</style>


    </head>
</html>
    <div class="alert" role="alert">
        <strong><?= $_SESSION['message']; ?></strong> 
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    </div>

<?php 
    unset($_SESSION['message']);
    endif;
?>



