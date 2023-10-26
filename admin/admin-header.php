<?php
session_start();
include_once('../dbconnect/connection.php');
$con = connection();

if ($_SESSION["Role"] == null) {
    header("Location: ../landing.html");
    exit;
} else {
    if ($_SESSION["Role"] == "admin") {
    } elseif ($_SESSION["Role"] != "user") {
        header("Location: ../landing.html");
        exit;
    }
}

$userId = $_SESSION['ID'];

// Fetch user data
$sql = "SELECT * FROM user WHERE ID = '$userId'";
$result = $con->query($sql);
$row = $result->fetch_assoc();

// Adding Activity
if (isset($_POST['addActivity'])) {
    $activityName = $_POST['nameActivity'];
    $location = $_POST['location'];
    $date = date("m/d/Y", strtotime($_POST['date']));
    $time = date("h:i A", strtotime($_POST['time']));
    $img = $_FILES['image']['name'];


    $stmt = $con->prepare("INSERT INTO `activities` (`activityName`, `location`, `dateOfActivity`, `timeOfActivity`, `image`, `userID`) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $activityName, $location, $date, $time, $img, $userId);


    if ($stmt->execute()) {
        $activityId = $stmt->insert_id;

        move_uploaded_file($_FILES["image"]["tmp_name"], "../activityImg/" . $_FILES['image']['name']);

        $_SESSION['userID'] = $userId;
        // $_SESSION['addStatus'] = "Activity Added Successfully!";
        // header('Location: user.php');

        echo "<script language='javascript'>
            alert('Activity Added Successfully!');
            window.location.href ='user.php';
            </script>";

        exit;
    } else {
        echo 'Error: ' . $stmt->error;
    }
    // }
}

// Update Activity
if (isset($_POST['updateActivity'])) {
    $activityId = $_POST['acitivityID'];
    $activityName = $_POST['nameActivity'];
    $location = $_POST['location'];
    $date = date("m/d/Y", strtotime($_POST['date']));
    $time = date("h:i A", strtotime($_POST['time']));
    $new_img = $_FILES['image']['name'];

    $old_img = $_POST['old_image'];


    $stmt = $con->prepare("UPDATE `activities` SET `activityName` = ?, `location` = ?, `dateOfActivity` = ?, `timeOfActivity` = ?, `image` = ?, userId = ? WHERE `id` = $activityId");
    $stmt->bind_param("sssssi", $activityName, $location, $date, $time, $new_img, $userId);

    if ($stmt->execute()) {

        if ($_FILES["image"]["tmp_name"] != '') {
            move_uploaded_file($_FILES["image"]["tmp_name"], "activityImg/" . $_FILES['image']['name']);
            unlink("activityImg/" . $old_img);
        }

        $_SESSION['status'] = "Image Updated Successfully!";
        header('Location: user/user.php');

        exit;

    } else {
        $_SESSION['status'] = "Image Not Updated.!";
        header('Location: user/user.php');
    }
}

if (isset($_POST['addRemarks'])) {
    $activityId = $_POST['activityId'];
    $remarks = $_POST['remarks'];

    if (!empty($remarks)) {
        $stmt = $con->prepare("UPDATE activities SET remarks = ? WHERE id = ?");
        $stmt->bind_param("si", $remarks, $activityId);

        if ($stmt->execute()) {
            // echo "Remarks added successfully."; //needs a modal to show succes message
        } else {
            echo "Failed to add remarks.";
        }
    }
}


// Fetch All user 
$sqlUser = "SELECT * FROM user ORDER BY ID DESC";
$resultUser = $con->query($sqlUser);

// Stored in Array
$Users = [];
$deactivatedUser = 0;
$activatedUser = 0;
$totalRoleUser = 0;
$totalAdmin = 0;
while ($rowData = $resultUser->fetch_assoc()) {
    $Users[] = $rowData;

    // For Counting the Active User
    if ($rowData['status'] == 'active') {
        $activatedUser++;
    }

    // For Counting the De-acActive User
    if ($rowData['status'] == 'deactivate') {
        $deactivatedUser++;
    }
    // For Counting the Admin User
    if ($rowData['role'] == 'user') {
        $totalRoleUser++;
    }

    // For Counting the User
    if ($rowData['role'] == 'admin') {
        $totalAdmin++;
    }


}
// Count Total Users
$totalUser = count($Users);



// Show Activity in dashboard
$sqlActivity = "SELECT * FROM activities ";
$resultActivity = $con->query($sqlActivity);

// Fetch all activity rows into an array
$activities = [];
while ($rowData = $resultActivity->fetch_assoc()) {
    $activities[] = $rowData;
}
$totalActivities = count($activities);


// Announcement
$sqlAnnounce = "SELECT announcements.*, user.firstName AS creator_name
                FROM announcements
                JOIN user ON announcements.admin_id = user.ID
                ORDER BY created_at DESC";
$resultAnnounce = $con->query($sqlAnnounce);

$announcements = [];
while ($rowData = $resultAnnounce->fetch_assoc()) {
    $announcements[] = $rowData;
}
// Count Total Announcement
$totalAnnouncements = count($announcements);





// Graphs
$sql = "SELECT gender, COUNT(*) AS count FROM user GROUP BY gender";
$result = $con->query($sql);
$genderData = array();
if ($result->num_rows > 0) {
    while ($rowGender = $result->fetch_assoc()) {
        $genderData[$rowGender['gender']] = $rowGender['count'];
    }
} else {
    echo "No User data found.";
}
// Bar Chart
$query = "SELECT MONTH(STR_TO_DATE(dateOfActivity, '%m/%d/%Y')) AS month, COUNT(*) AS count FROM activities GROUP BY MONTH(STR_TO_DATE(dateOfActivity, '%m/%d/%Y'))";
$result = $con->query($query);
$activityData = array_fill(0, 12, 0);
if ($result->num_rows > 0) {
    while ($rowActivity = $result->fetch_assoc()) {
        $month = $rowActivity['month'];
        $count = $rowActivity['count'];
        $monthIndex = $month - 1;
        $activityData[$monthIndex] = (int) $count;
    }
} else {
    echo "No activity data found.";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../assets/img/logo.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



    <!-- Template Main CSS File -->
    <link href="../assets/css/dash.css" rel="stylesheet">
    <link href="../assets/css/manage.css" rel="stylesheet">

    <!-- charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center">
                <img src="../assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->


                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="../assets/img/profile.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                            <?php echo $row['firstName'] ?>
                        </span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header text-center">
                            <h6>
                                <?php echo $row['firstName'] . ' ' . $row['lastName'] ?>
                            </h6>
                            <span>
                                <?php echo $row['role'] ?>
                            </span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </header><!-- End Header -->