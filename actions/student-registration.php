<?php
require_once __DIR__ . '/../includes/config.php';

if ( isset($_POST['type']) and $_POST['type'] == 'student' and isset($_POST['email']) and ! empty($_POST['email']) )
{
    $name        = $_POST['name'] ?? '';
    $dob         = $_POST['dob'] ?? '';
    $mobile      = $_POST['mobile'] ?? '';
    $email       = $_POST['email'] ?? '';
    $address     = $_POST['address'] ?? '';
    $country     = $_POST['country'] ?? '';
    $state       = $_POST['state'] ?? '';
    $zip         = $_POST['zip'] ?? '';
    $password    = date('dmY', strtotime($dob));
    $md_password = md5($password);

    $father_name     = $_POST['father_name'] ?? '';
    $father_mobile   = $_POST['father_mobile'] ?? '';
    $mother_name     = $_POST['mother_name'] ?? '';
    $mother_mobile   = $_POST['mother_mobile'] ?? '';
    $parents_address = $_POST['parents_address'] ?? '';
    $parents_country = $_POST['parents_country'] ?? '';
    $parents_state   = $_POST['parents_state'] ?? '';
    $parents_zip     = $_POST['parents_zip'] ?? '';

    $school_name         = $_POST['school_name'] ?? '';
    $previous_class      = $_POST['previous_class'] ?? '';
    $status              = $_POST['status'] ?? '';
    $total_marks         = $_POST['total_marks'] ?? '';
    $obtain_mark         = $_POST['obtain_mark'] ?? '';
    $previous_percentage = $_POST['previous_percentage'] ?? '';

    $class          = $_POST['class'] ?? '';
    $section        = $_POST['section'] ?? '';
    $subject_streem = $_POST['subject_streem'] ?? '';
    $doa            = $_POST['doa'] ?? '';
    $type           = $_POST['type'] ?? '';
    $date_add       = date('Y-m-d');
    $payment_method = $_POST['payment_method'] ?? '';

    $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$email'");

    if ( mysqli_num_rows($check_query) > 0 )
    {
        // $error = 'Email already exists';
        echo 'Email already exists';

        die;
    }
    else
    {
        $query = mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$name','$email','$md_password','$type')") or die(mysqli_error($db_conn));

        if ( $query )
        {
            $user_id = mysqli_insert_id($db_conn);
        }
    }

    $usermeta = [
        'dob' => $dob,
        'mobile' => $mobile,
        'payment_method' => $payment_method,
        'class' => $class,
        'address' => $address,
        'country' => $country,
        'state' => $state,
        'zip' => $zip,
        'father_name' => $father_name,
        'father_mobile' => $father_mobile,
        'mother_name' => $mother_name,
        'mother_mobile' => $mother_mobile,
        'parents_address' => $parents_address,
        'parents_country' => $parents_country,
        'parents_state' => $parents_state,
        'parents_zip' => $parents_zip,
        'school_name' => $school_name,
        'previous_class' => $previous_class,
        'status' => $status,
        'total_marks' => $total_marks,
        'obtain_mark' => $obtain_mark,
        'previous_percentage' => $previous_percentage,
        'section' => $section,
        'subject_streem' => $subject_streem,
        'doa' => $doa,
    ];

    foreach ( $usermeta as $key => $value )
    {
        mysqli_query($db_conn, "INSERT INTO usermeta (`user_id`,`meta_key`,`meta_value`) VALUES ('$user_id','$key','$value')") or die(mysqli_error($db_conn));
    }

    $months = ['january', 'fabruary', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'];

    $att_data = [];

    for ( $i = 1; $i <= 31; $i++ )
    {
        $att_data[$i] = [
            'signin_at' => '',
            'signout_at' => '',
            'date' => $i
        ];
    }

    $att_data = serialize($att_data);

    foreach ( $months as $key => $value )
    {
        mysqli_query($db_conn, "INSERT INTO `attendance` (`attendance_month`,`attendance_value`,`std_id`) VALUES ('$value','$att_data','$user_id')") or die(mysqli_error($db_conn));
    }

    // Parent registration
    $check_query = mysqli_query($db_conn, "SELECT * FROM accounts WHERE email = '$father_mobile'");

    if ( mysqli_num_rows($check_query) > 0 )
    {
        $parent = mysqli_fetch_object(mysqli_query($db_conn,"SELECT * FROM `accounts` as a JOIN `usermeta` as m ON a.id = m.user_id WHERE a.type = 'parent' AND a.email = '$father_mobile' AND m.meta_key = 'children';"));
        // $error = 'Email already exists';
        // echo 'Email already exists';die;
        $children = unserialize($parent->meta_value);
        $children[] = $user_id;
        $children = serialize($children);
        $query = mysqli_query($db_conn, "UPDATE `usermeta` SET `meta_value` = '$children' WHERE meta_key = 'children' ")or die(mysqli_error($db_conn));;
    }
    else
    {
        $md_password = md5($father_mobile);
        $query = mysqli_query($db_conn, "INSERT INTO accounts (`name`,`email`,`password`,`type`) VALUES ('$father_name','$father_mobile','$md_password','parent')") or die(mysqli_error($db_conn));

        if ( $query )
        {
            $parent_id = mysqli_insert_id($db_conn);
        }

        $chld = [$user_id];
        $chld = serialize($chld);

        mysqli_query($db_conn, "INSERT INTO usermeta (`user_id`,`meta_key`,`meta_value`) VALUES ('$parent_id','children','$chld')") or die(mysqli_error($db_conn));
    }

    $response = [
        'success' => TRUE,
        'payment_method' => $payment_method,
        'std_id' => $user_id
    ];

    print json_encode($response);

    die;
}