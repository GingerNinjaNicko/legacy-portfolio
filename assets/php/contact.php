<?php
if(isset($_POST) && !empty($_POST['name'])){
  echo "POST recived";
} else {
  echo "No POST data recieved";
}