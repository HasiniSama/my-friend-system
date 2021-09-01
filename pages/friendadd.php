<?php 
session_start();
include "../database/db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $id = $_SESSION['id'];

    //Paging
    $range=5;
	if(isset($_REQUEST['pageno'])){
		$pageno=$_REQUEST['pageno'];
		$start=($range*($pageno-1));
	}
	else{
		$pageno=1;
		$start=0;
	}

    //check click on Add friend button
    if(isset($_REQUEST['submit'])){
		$check=$_REQUEST['stat'];
	}
	else{
		$check="NotFriend";
	}

    //getting all recornds of not a friend
    $sql_all="SELECT * FROM friends WHERE friend_id NOT IN(SELECT friend_id2 FROM myfriends WHERE friend_id1='$id') AND friend_id!='$id'";
	$result_all = mysqli_query($conn, $sql_all);
	$last_page=ceil(($result_all->num_rows)/$range);//get last page

    //if click on Add Friend button this condition becomes TRUE
    if($check=="Friend"){
		$id_friend=$_REQUEST['user_id'];
		$sql1="INSERT INTO myfriends VALUES('$id','$id_friend')";
		$sql2="INSERT INTO myfriends VALUES('$id_friend','$id')";
		$result1 = mysqli_query($conn, $sql1);
		$result2 = mysqli_query($conn, $sql2);
		$check="NotFriend";
	}
	$sql_all="SELECT * FROM myfriends  WHERE friend_id1='$id'";
	$result_all = mysqli_query($conn, $sql_all);
	$friends_count=$result_all->num_rows;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="../resources/style.php?theme=DarkCyan"/>
    <title>Friend List</title>
</head>
<body>
<h1>My Friend System</h1>
    <h2>Add Friend Page</h2>
    <h3>Total number of friends is <?php echo $result_all->num_rows;?></h3>
    <div>
        <form class="one">
        <table>    
            <?php
                $sql="SELECT friend_id, profile_name FROM friends WHERE friend_id NOT IN(SELECT friend_id2 FROM myfriends WHERE friend_id1='$id') AND friend_id!='$id' LIMIT $start, $range";
                $result = mysqli_query($conn, $sql);
                    while($raw=$result->fetch_array()){
            ?>   
                <tr>
                    <td><?php echo $raw['profile_name']?></td>
                    <td><?php
                    $idf=$raw['friend_id'];
                    $sql_mutual="SELECT  COUNT(friend_id2)-COUNT(DISTINCT(friend_id2)) AS count FROM myfriends WHERE friend_id1='$id' OR friend_id1='$idf'";
                    $result_mutual = mysqli_query($conn, $sql_mutual);
                    foreach($result_mutual as $Count){
                        echo $Count['count'];   
                    }
                    ?> mutual friends</td> 

                    <td><form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="stat" value="Friend"><!--stat contain value of the add friend or not-->
                        <input type="hidden" name="user_id" value=<?php echo $raw['friend_id'];?>><!--mail contain email adress of user-->   
                        <input type="submit" id = "btn2" name="submit" value="Add Friend"/>
                        </form>
                    </td>      
                </tr>  
            <?php
                } 
            ?><br>
            <table>
            <tr>
                <td>
                    <?php
                    //paging
                    if ($pageno>1){
                    ?>
                        <a href="friendadd.php?pageno=<?php echo $pageno-1; ?>">Previous</a>
                    <?php
                    }
                    if($pageno<$last_page){
                    ?>
                        <a class="four" href="friendadd.php?pageno=<?php echo $pageno+1; ?>">Next</a>
                    <?php
                    }     
                    ?>
                </td>	            
            </tr>
            </table>
        </table> 
            <p>
                <a class = "three" href="friendlist.php" type="button">Friend List</button>
                <a class = "two" href="logout.php" type="button">Log out</button>
            </p>
        </form>
    </div>
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
?>