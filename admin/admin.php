<?php include_once('admin-header.php') ?>


<style>
    /* Override the Sidebar */
    .sidebar {
        width: 110px;
        padding: 0;
    }

    .sidebar-nav .nav-item {
        margin-bottom: 0;
    }

    .sidebar-nav .nav-link {
        flex-direction: column;
        background: #ffffff4c;
        font-size: 12px;
        color: black;
    }

    .sidebar-nav .nav-link.collapsed {
        color: black;
    }

    .sidebar-nav .nav-link.collapsed:hover {
        color: #d6d6d6;
    }

    .sidebar-nav .nav-link.collapsed i {
        color: black;
    }

    .sidebar-nav .nav-link i {
        font-size: 24px;
    }

    .sidebar-nav .nav-link:hover {
        background: #ffffff18;
    }

    @media (min-width: 1200px) {

        #main,
        #footer {
            margin-left: 110px;
        }
    }

    table {
        text-align: center;
    }

    .upper-table {
        padding: 10px 0;
    }

    .upper-table input {
        width: 300px;
        padding: 8px;
    }

    .list-btn {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .btns-cont button {
        padding: 10px;
        border-radius: 5px;
        outline: none;
        border: none;
        background: #47b2e4;
        color: white;
        width: 100%;
    }

    .btns-cont button:hover {
        background-color: #2e98c9;

    }

    .imgCont {
        padding: 10px 5px;
        border: 1px solid darkgrey;
        border-radius: 10px;
    }

    .sidebar-nav .nav-link i {
        margin-right: 0;
        color: black;
    }

    td {
        vertical-align: middle;
        text-align: center;
    }

    td img {
        cursor: pointer;
    }

    .expandable-image {
        cursor: pointer;
        transition: all 0.3s;
    }

    .btns-cont button i {
        margin-right: 5px;
    }

    /* Remarks */
    #remarksInput {
        width: 100%;
        padding: 10px;
    }

    .remarkBtn {
        background: #2076f3;
    }

    /* ADD */
    #file {
        display: none;
    }

    #photo-name {
        cursor: pointer;
    }

    .img-cont {
        width: 90%;
        margin: auto;

    }

    #choosen-img {
        max-height: 300px;
        width: 100%;
        object-fit: contain;
        border-radius: 5px;
        margin: auto;
    }

    .photo-cont {
        display: flex;
        align-items: center;
        padding: 10px 0;

    }

    .photo-btn {
        display: block;
        position: relative;
        background-color: #47b2e4;
        color: #fff;
        font-size: 14px;
        text-align: center;
        padding: 10px 0;
        width: 150px;
        border-radius: 5px;
        cursor: pointer;
    }

    .photo-btn:hover {
        background-color: #2e98c9;

    }

    #submitBtn {
        background: #47b2e4;
    }

    #submitBtn:hover {
        background-color: #2e98c9;

    }
</style>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar" style='background: #47b2e4;'>

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="user.php">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-newspaper"></i><span>ActivityFeed</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-calendar-date"></i><span>Calendar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-inboxes"></i><span>Inbox</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-clock-history"></i><span>History</span>
            </a>
        </li>


        <!-- <li class="nav-heading" style='margin-top:50px;'>Pages</li> -->
        <li class="nav-heading" style='color:black;'>Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="">
                <i class="bi bi-card-list"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Register Page Nav -->

    </ul>

</aside><!-- End Sidebar-->


<main id="main" class="main" style='margin-top:60px;'>

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../userManage.php">Home</a></li>
                <!-- <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li> -->
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Total User  -->
                    <div class="col-xxl-3 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Users <span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <!-- <div class="ps-3">
                            <h6>
                                 <?php echo $totalUser ?>
                            </h6>

                        </div> -->
                                    <div class="total-right" style="padding-left: 20px;">
                                        <div class="cont admin">
                                            <h5>
                                                <?php echo $totalAdmin ?>
                                                <strong>- Admin</strong>
                                            </h5>
                                        </div>

                                        <div class="cont user">
                                            <h5>
                                                <?php echo $totalRoleUser ?>
                                                <strong>- User</strong>

                                            </h5>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Active User -->
                    <div class="col-xxl-2 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Active  Users </h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>
                                            <?php echo $activatedUser ?>
                                        </h6>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Active User -->


                    <!-- Deactivate User -->
                    <div class="col-xxl-2 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Deactive User</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?php echo $deactivatedUser ?>
                                            </h6>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <!-- End Deactivate USer  -->


                    <!-- Activities User -->
                    <div class="col-xxl-2 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Total Activities</h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?php echo $totalActivities ?>
                                            </h6>

                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <!-- End Activities USer  -->

                    <!-- Announcement  -->
                    <div class="col-xxl-3 col-xl-4">

                        <div class="card info-card customers-card">

                            <div class="row">
                                <div class="card-body">
                                    <h5 class="card-title">Announcement </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>
                                                <?php echo $totalAnnouncements ?>
                                            </h6>

                                        </div>
                                        <button class="btn btn-primary" style="margin-left:10px;"
                                            id='addAnnounceBtn'>Add</button>
                                    </div>

                                </div>


                            </div>
                        </div>

                    </div>
                    <!-- End Announcement  -->





                </div>

            </div>

            <!-- Chartss -->
            <style>
                #genderChart,
                #activityChart {
                    height: 300px !important;
                }
            </style>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart
                            </div>
                            <div class="card-body">
                                <canvas id="activityChart" width="100%" height="50"></canvas>
                            </div>
                            <div class="card-footer small text-muted" id="activityChartUpdated"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Pie Chart
                            </div>
                            <div class="card-body" style="display:flex; align-items:center; justify-content:center;">
                                <canvas id="genderChart" class='chart'>
                                </canvas>
                            </div>
                            <div class="card-footer small text-muted" id="genderChartUpdated"></div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal -->
            <!-- ADD Announcement -->
            <div id="announcementModalForm" class="modal">
                <div class="modal-content" style="margin:8% auto;border-radius:1rem;">
                    <span class="close" onclick="closeModal()">&times;</span>
                    <header>Add Announcement</header>

                    <div id="errorMessage" class="statusMessage d-none"></div>

                    <form id="announceForm">

                        <div class='field input-field'>
                            <input type='text' name='nameAnnouncement' id='nameAnnouncement' placeholder='Title'>
                        </div>

                        <!-- Activity Location -->
                        <div class='field input-field'>
                            <textarea type='text' name='contentAnnounce' id='contentAnnounce'
                                placeholder='Content here'></textarea>
                        </div>

                        <div class='field input-field'>
                            <button class='setBtn' style='display:flex;float:inline-end;font-size:17px;'>Post</button>

                        </div>
                    </form>
                </div>
            </div>


            <script>
                // Get the gender data from PHP variables

                function updateTimestamp(elementId) {
                    var now = new Date();
                    var timestamp = "Updated at " + now.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                    document.getElementById(elementId).innerHTML = timestamp;
                }

                // Get the gender data from PHP variables
                var labels = <?php echo json_encode(array_keys($genderData)); ?>;
                var data = <?php echo json_encode(array_values($genderData)); ?>;

                var ctx = document.getElementById('genderChart').getContext('2d');
                var genderChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            backgroundColor: [
                                '#FF6384',
                                '#36A2EB',
                                '#FFCE56'
                            ]
                        }]
                    }
                });

                var activityLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                var activityData = <?php echo json_encode(array_values($activityData)); ?>;
                activityData.push(<?php echo array_sum($activityData); ?>);

                var activityCtx = document.getElementById('activityChart').getContext('2d');
                var activityChart = new Chart(activityCtx, {
                    type: 'bar',
                    data: {
                        labels: activityLabels,
                        datasets: [{
                            label: 'Number of Activities',
                            data: activityData,
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                stepSize: 1,
                                ticks: {
                                    callback: function (value, index, values) {
                                        if (index === values.length - 1) {
                                            return 'Total: ' + value;
                                        } else {
                                            return value;
                                        }
                                    }
                                }
                            }
                        }
                    }
                });

                // Update the "Updated at" timestamps
                updateTimestamp("activityChartUpdated");
                updateTimestamp("genderChartUpdated");


            </script>


            <div class="card mb-4" style="margin: 10px;">
                <div class="card-header" style='font-size: 18px; color:black; font-weight: 600;'>
                    <i class="bi bi-table"></i>
                    List Of Users
                </div>

                <div class="card-header">
                    <div class="upper-table">
                        <input type="text" name="searchUser" placeholder="Enter Lastname">
                    </div>
                    <!-- <table class="table" style="height: 450px; overflow:auto;"> -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($Users)) {
                                foreach ($Users as $User) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $User['ID'] ?>
                                        </td>
                                        <td>
                                            <?php echo $User['firstName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $User['lastName']; ?>
                                        </td>
                                        <td>
                                            <?php echo $User['gender']; ?>
                                        </td>
                                        <td>
                                            <?php echo $User['address']; ?>
                                        </td>
                                        <td>
                                            <?php echo $User['email']; ?>
                                        </td>

                                        <td>
                                            <?php echo $User['status']; ?>
                                        </td>
                                        <td>
                                            <?php if ($User['status'] == 'active') { ?>
                                                <button class="editActivityBtn btn btn-danger"
                                                    id="<?php echo $activity['id'] ?>">Deactivate</button>
                                            <?php } else { ?>
                                                <button id="<?php echo $activity['id'] ?>" class="activareBtn btn btn-primary"
                                                    data-bs-toggle="modal" data-bs-target="#deleteModal">Activate</button>
                                            <?php } ?>
                                        </td>

                                    </tr>
                                <?php }
                            } else { ?>
                                <div class="alert alert-warning alert-dismissable fade show" role="alert"
                                    style="display:flex;align-items: center; justify-content:space-between;">
                                    <strong>No User Added Yet!</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close"
                                        style="width: 50px;"></button>
                                </div>


                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4" style="margin: 10px;">
            <div class="card-header" style='font-size: 18px; color:black; font-weight: 600;'>
                <i class="bi bi-table"></i>
                List Of Activities
            </div>

            <div class="card-header">
                <div class="upper-table">
                    <input type="text" name="searchUser" placeholder="Enter Lastname">
                </div>
                <!-- <table class="table" style="height: 450px; overflow:auto;"> -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity Name</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>OOTD</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($activities)) {
                            $countActivity = 1;
                            foreach ($activities as $activity) { ?>
                                <tr>
                                    <td>
                                        <?php echo $countActivity++; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['activityName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['location']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['dateOfActivity']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['timeOfActivity']; ?>
                                    </td>
                                    <td>
                                        <img src="<?php echo "../activityImg/" . $activity['image']; ?>" alt="Activity Image"
                                            class="expandable-image"
                                            style="width: 120px; height:120px; object-fit:cover; border-radius: 5px;">
                                    </td>
                                    <td style="width:200px">
                                        <p>
                                            <?php echo $activity['remarks'] ?>
                                        </p>
                                    </td>

                                </tr>
                            <?php }
                        } else { ?>
                            <div class="alert alert-warning alert-dismissable fade show" role="alert"
                                style="display:flex;align-items: center; justify-content:space-between;">
                                <strong>No Activity Added Yet!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close"
                                    style="width: 50px;"></button>
                            </div>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>


        </div>

    </section>

</main>






<!-- EDIT Activity -->
<div id="editModal" class="modal" style="z-index:99999; overflow: auto;"></div>


<!-- Add Remarks Modal -->
<div id="addRemarksModal" class="modal" style="z-index:99999; overflow: auto;">

</div>

<!-- Delete Activity -->
<div id="deleteModal" class="modal fade" role="dialog" aria-hidden="true" style="z-index:99999;">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="padding: 5px;">
            <div class="modal-header">
                <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title" id="deleteModalLabel">DELETE</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<style>
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .close-modal {
        position: absolute;
        top: 5px;
        right: 5px;
        font-size: 50px;
        font-weight: 600;
    }
</style>



<!-- Modal -->

<!-- ADD Activity -->
<div id="activityModal" class="modal" style="overflow:auto;">
    <div class="modal-content" style="margin:8% auto;">
        <span class="close" onclick="closeModal()">&times;</span>
        <header>Add Activity</header>

        <form action='' method='POST' enctype="multipart/form-data">
            <!-- Activity Name -->
            <div class='field input-field'>
                <input type='text' name='nameActivity' placeholder='Name Activity' class='input' required>
            </div>

            <!-- Activity Location -->
            <div class='field input-field'>
                <input type='text' name='location' placeholder='Location' class='input' required>
            </div>

            <!-- Activity Date & Time -->
            <div class='field input-field' style="display: flex; align-items:center; gap: 20px;">
                <div>
                    <label>Date: </label>
                    <input type='date' name='date' placeholder='Date' class='input'>
                </div>
                <div>
                    <label>Time: </label>
                    <input type='time' name='time' placeholder='Time' class='input'>
                </div>
            </div>

            <!-- Activity File OOTD -->
            <div class='field input-field'>
                <label>OOTD: </label>
                <div class="img-cont" style="display: none;">
                    <img id="choosen-img">

                </div>
                <div class="photo-cont">
                    <input type='file' id="file" name='image' class='file' accept='image/*'
                        style="margin-bottom: 20px;">
                    <label class="photo-btn" for="file" style="margin-bottom: 0;"><i class="bi bi-upload"></i> Choose a
                        Photo</label>
                    <div style="margin-left:8px;">
                        <span id="photo-name"></span>
                    </div>
                </div>
            </div>

            <div class='field button-field'>
                <input type='submit' class='addActivity' id='submitBtn' name='addActivity' value='Add'>
            </div>
        </form>
    </div>
</div>

<script>
    let uploadBtn = document.getElementById('file');
    let imageCont = document.querySelector('.img-cont');
    let choosenImage = document.getElementById('choosen-img');
    let fileName = document.getElementById('photo-name');
    console.log(uploadBtn);

    uploadBtn.addEventListener('change', () => {
        imageCont.style.display = 'block';
        let reader = new FileReader();
        reader.readAsDataURL(uploadBtn.files[0]);
        console.log(uploadBtn.files[0].name)
        reader.onload = () => {
            choosenImage.setAttribute("src", reader.result);
        }
        fileName.textContent = uploadBtn.files[0].name;
    });



</script>

<!-- Show Activity -->
<div id="showModal" class="modal" style="overflow:auto;">
    <div class="modal-content" style="max-width:80%; margin:5% auto;">
        <span class="close" onclick="closeModal()">&times;</span>
        <header>Show Activity</header>
        <div class="card mb-4">
            <div class="card-header">
                <input type="text" placeholder="Search name">

            </div>
            <div class="card-header" style=" margin-bottom: 0px; height: 370px; overflow: auto;">
                <table id="datatablesSimple" class='table' style='text-align:center;'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity Name</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>OOTD</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($activities)) {
                            $countActivity = 1;
                            foreach ($activities as $activity) { ?>
                                <tr>
                                    <td>
                                        <?php echo $countActivity++; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['activityName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['location']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['dateOfActivity']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['timeOfActivity']; ?>
                                    </td>
                                    <td><img src="<?php echo "activityImg/" . $activity['image']; ?>" alt="Activity Image"
                                            style="width: 80px; height:80px; object-fit:cover; border-radius: 5px;"></td>
                                    <td>
                                        <button id="<?php echo $activity['id'] ?>" class="editActivityBtn btn btn-primary"
                                            onclick="">Edit</button>
                                        <button id="<?php echo $activity['id'] ?>" class="deleteBtn btn btn-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button>
                                    </td>
                                </tr>
                            <?php }
                        } else { ?>

                            <div class="alert alert-warning alert-dismissable fade show" role="alert"
                                style="display:flex;align-items: center; justify-content:space-between;">
                                <strong>No Activity Added Yet!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close"
                                    style="width: 50px;"></button>
                            </div>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Set Activity -->
<div id="setModal" class="modal" style="overflow:auto;">
    <div class="modal-content" style="max-width:80%; margin:5% auto;">
        <span class="close" onclick="closeModal()">&times;</span>
        <header>Set Activity</header>
        <div class="card mb-4">
            <div class="card-header">
                <input type="text" placeholder="Search name">

            </div>
            <div class="card-header" style="height: 370px; overflow:auto;">
                <table id="datatablesSimple" class='table' style='text-align:center;'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Activity Name</th>
                            <th>Location</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>OOTD</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($activities)) {
                            $countActivity = 1;
                            foreach ($activities as $activity) { ?>
                                <tr>
                                    <td>
                                        <?php echo $countActivity++; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['activityName']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['location']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['dateOfActivity']; ?>
                                    </td>
                                    <td>
                                        <?php echo $activity['timeOfActivity']; ?>
                                    </td>
                                    <td><img src="<?php echo "../activityImg/" . $activity['image']; ?>" alt="Activity Image"
                                            style="width: 80px; height:80px; object-fit:cover; border-radius: 5px;"></td>
                                    <td>
                                        <!-- <button class='btn btn-secondary'>Cancel</button> 
                                        <button class='btn btn-primary'>Done</button> -->
                                        <button id="<?php echo $activity['id'] ?>"
                                            class='setActivityBtn btn btn-primary'>Remarks</button>

                                    </td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="7">
                                    <div class="alert alert-warning alert-dismissable fade show" role="alert"
                                        style="display:flex;align-items: center; justify-content:space-between;">
                                        <strong>No Activity Added Yet!</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss='alert' aria-label="close"
                                            style="width: 50px;"></button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- End of Modal -->

<script>
    $(document).on('submit', '#announceForm', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('addAnnouncement', true)
        $.ajax({
            type: "POST",
            url: "../select.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
                if (response.status == 422) {
                    alert(response.message);
                } else if (response.status == 200) {
                    $('#announceForm')[0].reset();
                    $('#announcementModalForm').css('display', 'none');
                    alert(response.message);
                } else if (response.status == 450) {
                    alert(response.message);
                }
            }
        });
    });
    $(document).ready(function () {
        $('.editActivityBtn').click(function () {
            act_id = $(this).attr('id')
            $.ajax({
                url: "../select.php",
                method: 'post',
                data: { update_id: act_id },
                success: function (result) {
                    $('#editModal').html(result);
                }
            });


            $('#editModal').show();
        })

        // For Delete Activity
        $('.deleteBtn').click(function () {
            const act_id = $(this).attr('id')
            // alert(act_id)
            confirmDeleteModal(act_id);
        });


        // For Set Remarks
        $('.setActivityBtn').click(function () {
            act_id = $(this).attr('id');
            $.ajax({
                url: "../select.php",
                method: 'post',
                data: { set_act: act_id },
                success: function (result) {
                    $('#addRemarksModal').html(result);
                    $('#addRemarksModal').show();
                }
            });
        });



    })

    function confirmDeleteModal(actId) {
        $("#deleteModal .modal-body").text("Are you sure you want to delete Activity ");

        $("#confirmDelete").off("click").on("click", function () {
            console.log("Deleting item ID: " + actId);
            deleteActivity(actId);
        });
    }

    function deleteActivity(actId) {
        $.ajax({
            url: "../select.php",
            method: 'post',
            data: { delete_id: actId },
            success: function (result) {
                $('#deleteModal').html(result);
                location.reload();
            }
        });
    }


</script>



<?php include_once('admin-footer.php') ?>