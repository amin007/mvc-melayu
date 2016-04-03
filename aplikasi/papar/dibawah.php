
<footer>
<span class="label label-info">&copy; Hak Cipta Terperihara</span>
</footer>
<!-- // untuk paparkan JS sahaja -->
<?php
if (isset($this->js)) 
  foreach ($this->js as $js)
  {
    echo "\n" . '<script type="text/javascript" src="' . URL . $js .'"></script>';
  }

?>
</body>
</html>
