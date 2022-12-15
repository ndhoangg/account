<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account - Base Inc</title>
    <link rel="stylesheet" type="text/css" href="./css/account.css">
    <link rel="stylesheet" type="text/css" href="./css/popup.css">
    <link rel="stylesheet" type="text/css" href="./css/sidebar.css">
    <link rel="stylesheet" type="text/css" href="./css/loading.css">
    <link rel="stylesheet" type="text/css" href="./css/menu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="./scripts/Loading.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="../shared-components/shared.css"> -->
    <!-- <script src='../shared-components/Loading.js'></script> -->
</head>

<body>
    <?php
    include_once "./data/InitData.php";
    include_once "./components/Sidebar.php";
    ?>
    <div id='loading-wrap' 
    style='position:fixed; height:100%; width:100%; overflow:hidden; top:0; left:0; display:none; z-index:100000'>
        <div id='loading-message'>
            <div class='loader'>
            </div>
            <div class='message'>Loading, please wait</div>
        </div>
    </div>
    <div id="master">
        <div id="profile-box" class="profile-box">
            <div id="dialog-wrapper">
                <span class="close">&times;</span>
                <div id="profile-box-content-wrapper">
                    <div class="box-title">
                        CHỈNH SỬA THÔNG TIN CÁ NHÂN
                    </div>

                    <!-- Nội dung form đăng nhập -->
                    <div class="profile-box-content">
                        <form action="" method="post">
                            <?php
                            include "./components/PopupRows.php"
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-detail">
            <div class="apptitle">
                <div class="cta url" id="update-button"  onclick="loadingComponentOnClick()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5z" />
                    </svg>
                    Chỉnh sửa tài khoản
                </div>
                <div class="back url">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                    </svg>
                    <div class="label">Tài khoản</div>
                    <div class="title">
                        <?php
                        echo ($user_detail['last_name'] . ' ' . $user_detail['first_name'] . ' - ' . $user_detail['job_title']);
                        ?>
                    </div>
                </div>
            </div>
            <div class="profile">
                <div class="profile-info">
                    <div class="image">
                        <?php
                        echo ("<img" . " src='" . "data:image/png;base64,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" . "' alt='Avatar' id='avatar-picture'>")
                        ?>
                        <div class="upload-form">
                            <form action="" method="post" enctype="multipart/form-data">
                                <input type="file" name="avatar-to-upload" id="avatar-to-upload" onchange="previewImage(event)">
                                <script type="text/javascript">
                                    function previewImage(event) {
                                        var file = new FileReader();
                                        file.onload = function() {
                                            var output = document.getElementById("avatar-picture");
                                            output.src = file.result;
                                        }
                                        file.readAsDataURL(event.target.files[0]);
                                    }
                                </script>
                            </form>
                        </div>
                    </div>
                    <div class="text">
                        <?php
                        include_once "./components/InfoRows.php"
                        ?>
                    </div>
                </div>
                <div class="list">
                    <div class="title">Thông tin liên hệ </div>
                    <?php
                    include_once "./components/ContactInfo.php"
                    ?>
                </div>
                <div class="list">
                    <div class="title">Nhóm</div>
                </div>
                <div class="list">
                    <div class="title">Nhân viên trực tiếp</div>
                </div>
                <div class="list">
                    <div class="title">Học vấn
                    </div>
                </div>
                <div class="list">
                    <div class="title">Kinh nghiệm làm việc
                    </div>
                </div>
                <div class="list">
                    <div class="title">Giải thưởng & Thành tích
                    </div>
                </div>
            </div>
        </div>
        <div id="menu">
            <?php
            include "./components/SideMenu.html";
            ?>
        </div>
    </div>
</body>
<script src='./scripts/UpdateProfilePopup.js'>
</script>
<script src='./scripts/Logout.js'>
</script>
<script type="text/javascript" src='./scripts/Sidebar.js'>
</script>
<script type="text/javascript" src='./scripts/SideMenu.js'>
</script>

</html>