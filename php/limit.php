<!DOCTYPE html>
<html xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Guitar Wars - High Scores Administration</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <h2>权限管理</h2>
  <p>-------权限更改管理--------</p>
  <hr />
 <p>请勾选要更改的权限</p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<?php
  require_once ('../db.php');
      $dbc = $db_h;
  // Delete the customer rows (only if the form has been submitted)
  if (!isset($_POST['submit'])) {
    $query = "SELECT * FROM admin";
    $result = mysqli_query($dbc, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo '<input type="radio" value="' . $row['id'] . '" name="admin" />';
        echo $row['name'];
        echo '<br />';
    }
    echo '<input type="submit" name="subm" value="确定" />';echo '<br />';
    if (isset($_POST['subm']))
    {
        $query = "SELECT * FROM limits WHERE id_limit='1'";
        $result = mysqli_query($dbc, $query);
        $row = mysqli_fetch_array($result);
        echo '<div style="display:inline">';
        echo '<input id="id" type="checkbox" value="' . "0" . '" name="todelete[]" ';
        if ($row['admin_limit']) echo "checked";
        echo '/>';
        echo '<label for="id">权限管理</label><br />';

        echo '<input id="id1" type="checkbox" value="' . "1" . '" name="todelete[]" ';
        if ($row['zhuye_limit']) echo "checked";
        echo '/>';
        echo '<label for="id1">1管理</label><br />';

        echo '<input id="id2" type="checkbox" value="' . "2" . '" name="todelete[]" ';
        if ($row['wenzhang_limit']) echo "checked";
        echo '/>';
        echo '<label for="id2">2管理</label><br />';

        echo '<input id="id3" type="checkbox" value="' . "3" . '" name="todelete[]" ';
        if ($row['tuandui_limit']) echo "checked";
        echo '/>';
        echo '<label for="id3">3管理</label><br />';

        echo '<input id="id4" type="checkbox" value="' . "4" . '" name="todelete[]" ';
        if ($row['tuandui1_limit']) echo "checked";
        echo '/>';
        echo '<label for="id4">4管理</label><br />';

        echo '<input id="id5" type="checkbox" value="' . "5" . '" name="todelete[]" ';
        if ($row['tuandui2_limit']) echo "checked";
        echo '/>';
        echo '<label for="id5">5管理</label><br />';

        echo '<input id="id6" type="checkbox" value="' . "6" . '" name="todelete[]" ';
        if ($row['tuandui3_limit']) echo "checked";
        echo '/>';
        echo '<label for="id6">6管理</label><br />';

        echo '<input id="id7" type="checkbox" value="' . "7" . '" name="todelete[]" ';
        if ($row['tuandui4_limit']) echo "checked";
        echo '/>';
        echo '<label for="id7">7管理</label><br />';

        echo '<input id="id8" type="checkbox" value="' . "8" . '" name="todelete[]" ';
        if ($row['tuandui5_limit']) echo "checked";
        echo '/>';
        echo '<label for="id8">8管理</label><br />';

        echo '<input id="id9" type="checkbox" value="' . "9" . '" name="todelete[]" ';
        if ($row['tuandui6_limit']) echo "checked";
        echo '/>';
        echo '<label for="id9">9管理</label><br />';

        echo '<input id="id10" type="checkbox" value="' . "10" . '" name="todelete[]" ';
        if ($row['xiangmu_limit']) echo "checked";
        echo '/>';
        echo '<label for="id10">10管理</label><br />';

        echo '<input id="id11" type="checkbox" value="' . "11" . '" name="todelete[]" ';
        if ($row['chengguo_limit']) echo "checked";
        echo '/>';
        echo '<label for="id11">11管理</label><br />';

        echo '<input id="id12" type="checkbox" value="' . "12" . '" name="todelete[]" ';
        if ($row['chengguo1_limit']) echo "checked";
        echo '/>';
        echo '<label for="id12">12管理</label><br />';

        echo '<input id="id13" type="checkbox" value="' . "13" . '" name="todelete[]" ';
        if ($row['chengguo2_limit']) echo "checked";
        echo '/>';
        echo '<label for="id13">13管理</label><br />';
    }
  }
  else
  {
    $i = 0;
    while ($i < 13)
        $a[$i++] = 0;
    if (count ($_POST['todelete']) != 0)
        foreach ($_POST['todelete'] as $delete_id)
            $a[$delete_id] = 1;
    $query = "UPDATE limits SET admin_limit=$a[0],zhuye_limit=$a[1],wenzhang_limit=$a[2],tuandui_limit=$a[3],tuandui1_limit=$a[4],tuandui2_limit=$a[5],tuandui3_limit=$a[6],tuandui4_limit=$a[7],tuandui5_limit=$a[8],tuandui6_limit=$a[9],xiangmu_limit=$a[10],chengguo_limit=$a[0],chengguo1_limit=$a[11],chengguo2_limit=$a[12] WHERE id_limit = '1'";
    mysqli_query($dbc, $query)
      or die('Error querying database.');
  }

  mysqli_close($dbc);
?>
    <hr />
    <input type="submit" name="submit" value="提交" />
    <hr />
<?php
   
    if (isset($_POST['submit'])) {
      echo '已更改！';
    }
?>
  </form>
</body>
</html>


</body> 
</html>

