
<?php
  $username = $_POST[ 'username' ];
  $password = $_POST[ 'password' ];
  $password_confirm = $_POST[ 'password_confirm' ];
  if ( !is_null( $username ) ) {
    $jb_conn = mysqli_connect( 'localhost', 'codingfactory', '1234qwer', 'codingfactory.net_example' );
    $jb_sql = "SELECT username FROM member WHERE username = '$username';";
    $jb_result = mysqli_query( $jb_conn, $jb_sql );
    while ( $jb_row = mysqli_fetch_array( $jb_result ) ) {
      $username_e = $jb_row[ 'username' ];
    }
    if ( $username == $username_e ) {
      $wu = 1;
    } elseif ( $password != $password_confirm ) {
      $wp = 1;
    } else {
      $encrypted_password = password_hash( $password, PASSWORD_DEFAULT);
      $jb_sql_add_user = "INSERT INTO member ( username, password ) VALUES ( '$username', '$encrypted_password' );";
      mysqli_query( $jb_conn, $jb_sql_add_user );
      header( 'Location: register-ok.php' );
    }
  }
?>

<?php

function table_check1($table,$handle)
{
$result = mysql_query("CHECK TABLE {$table}",$handle);
$row = mysql_fetch_assoc($result);
if ( $row['Msg_text']=='OK' ) return true;
return false;
}

function table_check2($table,$handle)
{
$result = mysql_query("SELECT 1 FROM {$table}",$handle);
if ( is_resource($result) ) return true;
return false;
}

function table_check3($table,$handle)
{
$result = mysql_query("SHOW TABLES LIKE '{$table}'",$handle);
$row = mysql_fetch_assoc($result);
if ( $row ) return true;
return false;
}

function table_check4($table,$handle)
{
$result = mysql_query("DESC {$table}",$handle);
if ( is_resource($result) ) return true;
return false;
}

function table_check5($db,$table,$handle)
{
$result = mysql_list_tables($db);
$table_list = array();
while ( $row=mysql_fetch_assoc($result) ) $table_list[] = $row['Tables_in_mysql'];
if ( in_array($table,$table_list) ) return true;
return false;
}

$host = 'localhost';
$user = 'user';
$pass = 'pass';
$db = 'db';

$dbconn = mysql_connect($host,$user,$pass);
mysql_select_db($db,$dbconn);

echo table_check1('table_name',$dbconn) ? '있다' : '없다';
echo '<br>';
echo table_check2('table_name',$dbconn) ? '있다' : '없다';
echo '<br>';
echo table_check3('table_name',$dbconn) ? '있다' : '없다';
echo '<br>';
echo table_check4('table_name',$dbconn) ? '있다' : '없다';
echo '<br>';
echo table_check5($db,'table_name',$dbconn) ? '있다' : '없다';
echo '<br>';

mysql_close($dbconn);


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <script src = "/join.js">
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>찾집</title>
    <link>
</head>
<body>
    <form method="post" action="">
        <div class="container">
      <div class="insert">
      
          <table>
      <caption><h2>회원가입 양식</h2></caption>
      <tr>
          <td class="col1">이름</td>
          <td class="col2"><input type="text" name="name" maxlength="5"></td>
      </tr>
      <tr>
          <td class="col1">아이디</td>
          <td class="col2">
              <input type="text" name="id" maxlength="10">
              <input class='but1' type="button" value="중복확인" onclick="(this.form)">
          </td>
      </tr>
      <tr>
          <td class="col1">비밀번호</td>
          <td class="col2">
              <input type="password" name="pwd" maxlength="16">
              <p>※비밀번호는 <span class="num">문자, 숫자, 특수문자(~!@#$%^&*)의 조합
              10 ~ 16자리</span>로 입력이 가능합니다.</p>
          </td>
      </tr>
      <tr>
          <td class="col1">비밀번호 확인</td>
          <td class="col2"><input type="password" name="pwdCheck" maxlength="16"></td>
      </tr>
      <tr>
          <td class="col1">이메일</td>
          <td class="col2">
              <input type="text" name="mailid">
              <span class="a">@</span>
              <input type="text" name="email">
              <select name="mailslc">
                  <option value="self" selected>직접입력</option>
                  <option value="naver">naver.com</option>
                  <option value="gm">gmail.com</option>
                  <option value="da">daum.com</option>
                  <option value="yah">yahoo.com</option>
              </select>
              <input class='but2' type="button" value="이메일 중복확인" onclick="">
          </td>
      </tr>
     
      </table>
      
    </div>
   
    <div class="create">
      
          <input class="but3" type="button" value="가입취소" onclick="location.href='index.html'">
          <input class="but4" type="button" value="회원가입" onclick="formCheck(this.form)">
          <script>

          </script>
      
    </div>
    </div>
    </form>
</body>
  
 
  </script>
 </head>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus®">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <title>회원가입 양식</title>
  <style type="text/css">
 
    div.create{
    width: 800px;
    text-align: center;
    padding: 30px;
    border-bottom: 1px solid black;
    margin: auto;
    }
 
    table{
    height: 300px;
    width: 900px;
    border-top: 3px solid black;
    margin-right: auto;
    margin-left: auto;
    }
 
    td{
    border-bottom: 1px dotted black;
    }
 
    caption{
    text-align: left;
    }
 
    .col1 {
    background-color: #e8e8e8;
    padding: 10px;
    text-align: right;
    font-weight: bold;
    font-size: 0.8em;
    }
 
    .col2 {
    text-align: left;
    padding: 5px;
    }
 
    .but1 {
    height: 25px;
    width: 80px;
    color: white;
    background-color: black;
    border-color: black;
    }
 
    .but2 {
    height: 27px;
    width: 120px;
    color: white;
    background-color: black;
    border-color: black;
    }
 
    .but3 {
    height: 35px;
    width: 150px;
    background-color: white;
    border: 2px solid black;
    }
 
    .but4{
    height: 35px;
    width: 150px;
    background-color: white;
    border: 2px solid black;
    }
    
    .but1:hover {
    background-color: #b9b9b9;
    color: black;
    border: 2px solid black;
    }
 
    .but2:hover {
    background-color: #b9b9b9;
    color: black;
    border: 2px solid black;
    }
 
    .but3:hover {
    background-color: black;
    color: white;
    border: 2px solid black;
    }
 
    .but4:hover {
    background-color: black;
    color: white;
    border: 2px solid black;
    }
    
    p{
    font-size: 0.7em;
    }
 
    .g{
    font-size: 0.7em;
    }
 
    .c{
    font-size: 0.7em;
    }
 
    .a{
    font-size: 0.7em;
    }
    
    .num{
    color: red;
    }
 
  </style>
 

</html>