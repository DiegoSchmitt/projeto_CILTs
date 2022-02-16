<?php
if (!($_SESSION['id']))
{
   header('Location: index.php');
}
?>