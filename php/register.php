<?php
$error = '';
$fullname = '';
$email = '';
$password = '';

function clean_text($string)
{
$string = trim($string);
$string = stripslashes($string);
$string = htmlspecialchars($string);
return $string;
}

if(isset($_POST["submit"]))
{
if(empty($_POST["fullname"]))
{
$error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
}
else
{
$fullname = clean_text($_POST["fullname"]);
if(!preg_match("/^[a-zA-Z ]*$/",$fullname))
{
$error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
}
}
if(empty($_POST["email"]))
{
$error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
}
else
{
$email = clean_text($_POST["email"]);
if(!filter_var($email, FILTER_VALIDATE_EMAIL))
{
$error .= '<p><label class="text-danger">Invalid email format</label></p>';
}
}
if(empty($_POST["password"]))
{
$error .= '<p><label class="text-danger">Password is required</label></p>';
}
else
{
$password = clean_text($_POST["password"]);
}
if ($error == '') {
    $file_open = fopen("../storage/users.csv", "a");
    $no_rows = count(file("../storage/users.csv"));
    if ($no_row > 1) {
        $no_rows = ($no_rows -1) +1;
    }
    $form_data = array(
            'sr_no' => $no_row,
            'fullname' => $fullname,
            'email' => $email,
            'dob' => $password);

        fputcsv($file_open,$form_data);
        $error = '<label class="text-success">Data Stored</label>';
    }

}
?>
