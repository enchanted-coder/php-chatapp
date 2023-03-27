<?php
  if(isset($_POST['submit'])){
    $link = mysqli_connect("localhost", "root", "", "chatr");

    if($link === false){
      die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($link, $_REQUEST['username']);
    $message = mysqli_real_escape_string($link, $REQUEST['message']);

    date_default_timezone_set('Africa/Nairobi');
    $timestamp = date('y-m-d h:ia');

    $sql = "INSERT INTO chats(username, message, datetime) VALUES('$username', '$message', '$timestamp')";

    if(mysqli_query($link, $sql)){
      ;
    } else{
      echo "ERROR: Message not sent!";
    }

    mysqli_close($link);
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="icon" type="image/x-icon" href="./assets/chat-bubbles.png">
    <link href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" rel="stylesheet">
  </head>
  
  <body onload="show_func()">
<div id="container">
    <main>
        <header>
            <div>
                <h2>CHATBOX</h2>
            </div>
        </header>
 
<script>
function show_func(){
 
 var element = document.getElementById("chathist");
    element.scrollTop = element.scrollHeight;
  
 }
 </script>





<form id="myform" action="Group_chat.php" method="POST" >
<div class="inner_div" id="chathist">


<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "chat_app";
$con = new mysqli($host, $user, $pass, $db_name);
 
$query = "SELECT * FROM chats";
 $run = $con->query($query);
 $i=0;
  
 while($row = $run->fetch_array()) :
 if($i==0){
 $i=5;
 $first=$row;
 ?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
  <?php echo $row['message']; ?>
 </span> <br/>
 <div>
  <span style="color:black;float:left;
   font-size:10px;clear:both;">
   <?php echo $row['username']; ?>, <?php echo $row['datetime']; ?>
 </span>
 </div>
</div>
<br/><br/>
 <?php
 }
else
{
if($row['username']!=$first['username'])
{
?>
 <div id="triangle" class="triangle"></div>
 <div id="message" class="message">
 <span style="color:white;float:left;">
 <?php echo $row['message']; ?></span> <br/>
 <div>
  <span style="color:black;float:right;
          font-size:10px;clear:both;">
   <?php echo $row['username']; ?>,
        <?php echo $row['datetime']; ?>
 </span>
</div>
</div>
<br/><br/>
<?php
}
else
{
?>
 <div id="triangle1" class="triangle1"></div>
 <div id="message1" class="message1">
 <span style="color:white;float:right;">
 <?php echo $row['message']; ?></span> <br/>
 <div>
  <span style="color:black;float:left;
          font-size:10px;clear:both;">
    <?php echo $row['username']; ?>,
        <?php echo $row['datetime']; ?>
  </span>
</div>
</div>
<br/><br/>
<?php
}
}
endwhile; ?>
</div>
    <footer>
        <table>
         <tr>
             <th>
              <input  class="input1" type="text" id="username"
               name="username" placeholder="From"></input>
              </th>
              <th>
              <textarea id="message" name="message" rows='3'
               cols='50' placeholder="Type your message">
             </textarea>
              </th>
              <th>
              <input class="input2" type="submit" id="submit"
              name="submit" value="send"></input>
              </th>               
        </tr>
        </table>               
    </footer>
</form>
</main>   
</div>
 
</body>



<style>
*{
    box-sizing:border-box;
}
body{
    background-color: antiquewhite;
    font-family:Arial;
}
#container{
    width:500px;
    height:700px;
    background:white;
    margin:0 auto;
    font-size:0;
    border-radius:5px;
    overflow:hidden;
}
main{
    width:500px;
    height:700px;
    display:inline-block;
    font-size:15px;
    vertical-align:top;
}
main header{
    height:100px;
    padding:30px 20px 30px 40px;
    background-color: gray;  
}
main header > *{
    display:inline-block;
    vertical-align:top;
}
main header img:first-child{
    width:24px;
    margin-top:8px;
}  
main header img:last-child{
    width:24px;
    margin-top:8px;
}
main header div{
    margin-left:90px;
    margin-right:90px;
}
main header h2{
    font-size:25px;
    margin-top:5px;
    text-align:center;
    color:#FFFFFF;  
}
main .inner_div{
    padding-left:0;
    margin:0;
    list-style-type:none;
    position:relative;
    overflow:auto;
    height:500px;
    background-position:center;
    background-repeat:no-repeat;
    background-size:cover;
    position: relative;
    border-top:2px solid #fff;
    border-bottom:2px solid #fff;
     
}
main .triangle{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
    transparent #58b666 transparent;
    margin-left:20px;
    clear:both;
}
main .message{
    padding:10px;
    color:#000;
    margin-left:15px;
    background-color:#58b666;
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    clear:both;
}
main .triangle1{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
   transparent #6fbced transparent;
    margin-right:20px;
    float:right;
    clear:both;
}
main .message1{
    padding:10px;
    color:#000;
    margin-right:15px;
    background-color:#6fbced;
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    float:right;
    clear:both;
}
main .triangle2{
    width: 0;
    height: 0;
    border-style: solid;
    border-width: 0 8px 8px 8px;
    border-color: transparent
    transparent #58b666 transparent;
    margin-left:20px;
    clear:both
}
main .message2{
    padding:10px;
    color:#000;
    margin-left:15px;
    background-color:#58b666;
    line-height:20px;
    max-width:90%;
    display:inline-block;
    text-align:left;
    border-radius:5px;
    clear:both
}
main footer{
    height:150px;
    padding:20px 30px 10px 20px;
    background-color:gray;
}
main footer .input1{
    resize:none;
    border:100%;
    display:block;
    width:120%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
}
main footer textarea{
    resize:none;
    border:100%;
    display:block;
    width:140%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:20px;
}
main footer .input2{
    resize:none;
    border:100%;
    display:block;
    width:40%;
    height:55px;
    border-radius:3px;
    padding:20px;
    font-size:13px;
    margin-bottom:13px;
    margin-left:100px;
    color:white;
    text-align:center;
    background-color:black;
    border: 2px solid white; 
}
}
main footer textarea::placeholder{
    color:#ddd;
}
</style>
  
  
  </body>
</html>
