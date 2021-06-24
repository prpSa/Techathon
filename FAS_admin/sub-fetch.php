<?php

include "include/conn.php";



$str1 = '
<div class="form-group"><label> Subject Name </label><select name="subject" id="subject" class="select form-control">';
$str2 = "";
$str3 = '</select> </div>
<select name="year" id="year" class="select form-control">
                            <option value="2019">2019-2020</option>
                            <option value="2020">2020-2021</option>
                            <option value="2021">2021-2022</option>
            </select>';

if ($_POST['type'] == 'sub-fetch') {

    $query = "SELECT * FROM course WHERE dept='{$_POST['id1']}'";
    $query_run = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($query_run)) {
        $str2 .= "<option value='{$row['courseName']}'>{$row['courseName']}</option>";
    }
}
echo $str1, $str2, $str3;
