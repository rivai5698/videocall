<?php
session_start();
//tiến hành kiểm tra là người dùng đã đăng nhập hay chưa
//nếu chưa, chuyển hướng người dùng ra lại trang đăng nhập
if (!isset($_SESSION['name'])) {
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no" />
    <title>Trang Chủ</title>

    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../Style/common/b-ground.css">
    <link rel="stylesheet" href="../Style/common/menu.css">
    <link rel="stylesheet" href="../Style/common/calling.css">
</head>
<body>

<?php $sess = $_SESSION['name'] ?>


<div class="sidebar-left">
    <div> <img class="logo2" src="../Style/common/logo1.png"> </div>
    <div class="text_welcome2"> Nhân Viên: <div style="font-weight: normal;font-size: 25px"><?php echo $sess; ?></div></div>
    <div class="menu " id="menu-normal">
        <div class="menu-item">
            <div class="text-menu">Thông tin cá nhân</div>
        </div>
        <div class="menu-item">
            <div class="text-menu">Lịch sử cuộc gọi</div>
        </div>
    </div>
    <div class="btn-logout">
        <a href="logout.php"><button id = "logOutButton" class="text-logout ">Đăng xuất</button></a>
    </div>

</div>

<div class="container">
    <div class="row">
        <div class="col-12">
                <div class="container">

                    <div id="incoming-call-notice" style="display: none;">
                        <div class="spinner-grow text-primary" role="status"  >
                            <span class="sr-only">Cuộc gọi đến...</span>
                        </div>
                        <h3>Cuộc gọi đến...</h3>
                    </div>
                </div>



            <div id="video-container">
                <video id="localVideo" autoplay muted></video>
                <video id="remoteVideo" autoplay style="height: 85vh;"></video>
            </div>

        </div>

    </div>

    <div class="row">
        <div class="col" id="action-buttons">
            <button id="callButton" class="btn btn-success">Call</button>
            <button id="answerCallButton" class="btn btn-info hidden-first">Answer Call</button>
            <button id="rejectCallButton" class="btn btn-warning hidden-first">Reject Call</button>
            <button id="endCallButton" class="btn btn-danger hidden-first">End Call</button>
        </div>

    </div>
</div>

<?php //if(isset($_SESSION['name']) && $_SESSION['name'] != NULL)
//        unset($_SESSION['name']);
//    ?>

<script src="../js/lib/jquery.js"></script>
<script src="../js/lib/socket.io-2.2.0.js"></script>
<script src="../js/StringeeSDK-1.5.10.js"></script>




<script>
    var token = 'eyJjdHkiOiJzdHJpbmdlZS1hcGk7dj0xIiwidHlwIjoiSldUIiwiYWxnIjoiSFMyNTYifQ.eyJqdGkiOiJTS2ExNmlUTTgwa01SNkIzak9EajcwVW9RR3pYTk5uWGMtMTYxNjgxNDgxNiIsImlzcyI6IlNLYTE2aVRNODBrTVI2QjNqT0RqNzBVb1FHelhOTm5YYyIsImV4cCI6MTYxOTQwNjgxNiwidXNlcklkIjoiYWdlbnQxIn0.oOptusiUREw6XV6BZUPTY54J87rnBiRC5qxzMO_cd58';
    var callerId = 'agent1';
    var calleeId = 'user123123';
</script>


<script src="../js/code.js"></script>
</body>
</html>

