<?php

include "include/conn.php";


// echo $uname;
if ($_POST['type'] == 'add_tea_form') {
    $sql = "SELECT * FROM users WHERE name = '{$_POST['id1']}'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    // $num = mysqli_num_rows($query);
    // echo $num;
    // $num != 0
    // echo $data['name'];

    // echo $data['name'];
    $uname = $data['username'];
    $pwd = $data['password'];
    $mob_no = $data['mobile_no'];
    $dept = $data['dept'];

    $str1 = '<div class="form-group">
    <label> Username/E-mail </label>
    <input type="text" name="username" value="';

    $str2 = '"class="form-control" id="username" placeholder="Enter Username" readonly>
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" value= ' . $pwd . ' class="form-control" id="password" placeholder="Enter Password" readonly>
    </div>
    <div class="form-group">
    <label>Mobile No.</label>
    <input type="text" name="mobile" value = ' . $mob_no . ' class="form-control" id="mobno" placeholder="Enter Mobile No." readonly>
    </div>
    <div class="form-group" id="dept-change">
    <label>Department:</label>
    <input type="text" name="dept" value = ' . $dept . ' class="form-control" id="dept" placeholder="Enter Department" readonly>
    </div>';

    echo $str1, $uname, $str2;
}
// value= $uname
// value= $pwd
// value = $mob_no
// value = $dept

if ($_POST['type'] == 'add_tea_form_empty') {

    $str1 = '<div class="form-group">
    <label> Username/E-mail </label>
    <input type="text" name="username" value="';

    $str2 = '"class="form-control" id="username" placeholder="Enter Username" readonly>
    </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" readonly>
    </div>
    <div class="form-group">
    <label>Mobile No.</label>
    <input type="text" name="mobile" class="form-control" id="mobno" placeholder="Enter Mobile No." readonly>
    </div>
    <div class="form-group" id="dept-change">
    <label>Department:</label>
    <input type="text" name="dept" class="form-control" id="dept" placeholder="Enter Department" readonly>
    </div>';

    echo $str1,  $str2;
}


if ($_POST['type'] == 'add_tea_form_dept') {
    $sql = "SELECT * FROM users WHERE name = '{$_POST['id1']}'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $role = $_POST['id2'];
    $dept = $data['dept'];
    $str = "";
    if ($role == 'auditor') {
        $str =  '
<label>Department:</label>
<input type="text" name="dept"  value = ' . $dept . ' class="form-control" id="dept" placeholder="Enter Department" readonly >
';
    } else if ($role == 'idAuditor') {
        $str =  '
        <label>Department:</label>
        <select name="dept" id="dept" placeholder="Enter Department">
          <option value="CE">CE</option>
          <option value="IT">IT</option>
          <option value="EXTC">EXTC</option>
          <option value="EE">EE</option>
          <option value="IE">IE</option>
        </select>';
    }
    echo $str;
}
