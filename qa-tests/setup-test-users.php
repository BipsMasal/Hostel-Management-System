<?php
/**
 * Creates deterministic QA test users for Newman login tests.
 * Run: php qa-tests/setup-test-users.php
 */
require_once __DIR__ . '/../connect.php';

$users = [
    [
        'fullname' => 'qa_regular_user',
        'email' => 'qa_regular@test.local',
        'phone' => '9800000001',
        'gender' => 'Male',
        'address' => 'QA Test Address',
        'dob' => '2000-01-01',
        'password' => 'QaPass123!',
        'isAdmin' => 0,
    ],
    [
        'fullname' => 'qa_admin_user',
        'email' => 'qa_admin@test.local',
        'phone' => '9800000002',
        'gender' => 'Male',
        'address' => 'QA Admin Address',
        'dob' => '1990-01-01',
        'password' => 'QaAdmin123!',
        'isAdmin' => 1,
    ],
];

foreach ($users as $user) {
    $fullname = mysqli_real_escape_string($conn, $user['fullname']);
    $check = mysqli_query($conn, "SELECT id FROM user WHERE fullname='$fullname' LIMIT 1");

    if (mysqli_num_rows($check) > 0) {
        $isAdmin = (int) $user['isAdmin'];
        mysqli_query($conn, "UPDATE user SET isAdmin=$isAdmin WHERE fullname='$fullname'");
        echo "Updated existing user: {$user['fullname']}\n";
        continue;
    }

    $email = mysqli_real_escape_string($conn, $user['email']);
    $phone = mysqli_real_escape_string($conn, $user['phone']);
    $gender = mysqli_real_escape_string($conn, $user['gender']);
    $address = mysqli_real_escape_string($conn, $user['address']);
    $dob = mysqli_real_escape_string($conn, $user['dob']);
    $password = mysqli_real_escape_string($conn, $user['password']);
    $isAdmin = (int) $user['isAdmin'];

    $sql = "INSERT INTO user (fullname, email, phone, gender, address, dob, password, isAdmin)
            VALUES ('$fullname', '$email', '$phone', '$gender', '$address', '$dob', '$password', $isAdmin)";

    if (mysqli_query($conn, $sql)) {
        echo "Created user: {$user['fullname']}\n";
    } else {
        echo "Failed to create {$user['fullname']}: " . mysqli_error($conn) . "\n";
        exit(1);
    }
}

echo "QA test users ready.\n";
