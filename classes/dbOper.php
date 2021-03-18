<?php
error_reporting(0);
$inst = "installation";
include '../header.php';
echo '<body class="bg-light">';
echo '<div class="container-fluid" style="margin-top: 5%;">
     <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4 bg-white shadow border p-4" style="border-radius: 20px 20px 20px 20px;">';
echo '<h3><img src="../images/icaruslogo1ba.png" style="width: 128px;">&nbsp;- Paperless office suite</h3>';
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error connecting to Database check configuration<br />';
    die("Connection failed: " . $conn->connect_error);
    
}

echo '<img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Database Connected successfully';
$conn = new mysqli($servername, $username, $password, "icarus");
if($conn->connect_error){
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error connecting to database. Please check error message below<br />';
    die("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Error message : " . $conn->connect_error);
}
$query = 'CREATE TABLE IF NOT EXISTS n_boards(
            board_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            board_nm            VARCHAR(255)    NOT NULL,
            board_unm           VARCHAR(255)    NOT NULL,
            board_hash          VARCHAR(255)    NOT NULL,
            board_timestamp     TIMESTAMP       NOT NULL,
            PRIMARY KEY(board_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table n_boards created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table n_boards ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS notice_board(
            notice_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            notice_titl         VARCHAR(255)    NOT NULL,
            notice_content      LONGTEXT        NOT NULL,
            notice_priori       VARCHAR(2)      NOT NULL,
            notice_unm          VARCHAR(255)    NOT NULL,
            notice_timestamp    TIMESTAMP       NOT NULL,
            notice_board_id     VARCHAR(255)    NOT NULL,
            PRIMARY KEY(notice_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table notice_board created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table notice_board ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS share_notice(
            share_id            INTEGER         NOT NULL        AUTO_INCREMENT,
            share_b_nm          VARCHAR(255)    NOT NULL,
            share_b_unm         VARCHAR(255)    NOT NULL,
            share_b_hash        VARCHAR(255)    NOT NULL,
            share_timestamp     TIMESTAMP       NOT NULL,
            PRIMARY KEY(share_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table share_notice created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table share_notice ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS office(
            office_id           INTEGER         NOT NULL        AUTO_INCREMENT,
            office_nm           VARCHAR(255)    NOT NULL,
            office_timestamp    TIMESTAMP       NOT NULL,
            PRIMARY KEY(office_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table office created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table office ' .$conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS user(
    user_id             INTEGER         NOT NULL        AUTO_INCREMENT,
    user_nm             VARCHAR(255)    NOT NULL,
    user_pass           VARCHAR(255)    NOT NULL,
    user_typ            VARCHAR(255)    NOT NULL,
    user_office         VARCHAR(255)    NOT NULL,
    PRIMARY KEY(user_id))';
if($conn->query($query) == TRUE){
echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table user created successfully';
}else{
echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table user ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS approval_flow(
            flow_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            flow_nm         VARCHAR(255)    NOT NULL,
            flow_office     VARCHAR(255)    NOT NULL,
            flow_hash       VARCHAR(255)    NOT NULL,
            flow_timestamp  TIMESTAMP       NOT NULL,
            PRIMARY KEY(flow_id))';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table approval_flow created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table approval_flow ' . $conn->error;
}
$query = 'CREATE TABLE IF NOT EXISTS flow_user(
            user_id         INTEGER         NOT NULL        AUTO_INCREMENT,
            user_nm         VARCHAR(255)    NOT NULL,
            user_flow       VARCHAR(255)    NOT NULL,
            user_office     VARCHAR(255)    NOT NULL,
            PRIMARY KEY(user_id))
            ';
if($conn->query($query) == TRUE){
    echo '<br /><img src="../images/tick.png" style="width: 22px;">&nbsp;&nbsp;Table flow_user created successfully';
}else{
    echo '<br /><img src="../images/error.svg" style="width: 18px;">&nbsp;&nbsp;Error creating table flow_user ' . $conn->error;
}
echo '<br /><br />';
echo '<a href="../installation/second.php" class="btn btn-primary bor-ten float-left">&lt; Previous</a>
<a href="../installation/admincreate.php" class="btn btn-primary bor-ten float-right">Next &gt;</a>';
echo '</div>';
echo '<div class="col-sm-4"></div>';
?>