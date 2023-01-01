<?php
  echo '<label for="cookies">Choose a key:</label>
        <select id="cookies" name="cookielist" form="cookieupdateform">';
  echo  ' </select>';
  
  echo '<form id="cookieupdateform">
  <input type="text" name="name" placeholder="Value" id="valueUpdate">
  <input type="text" name="year" placeholder="Số ngày lưu trữ (option)" id="dateUpdate">
  <input type="button" name="submit" id="submit55" value="submit update" class="btn btn-primary" onclick="submit_updform()">
  </form>';
?>