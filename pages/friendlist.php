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

    if (isset ($_REQUEST['submit']) ){
		$check=$_REQUEST['stat'];
	}
	else{
		$check="Friend";
		
	}

    if($check=="Unfriend"){
		$id_frnd=$_REQUEST['user_id'];
		$sql="DELETE FROM `myfriends` WHERE (friend_id1='$id' AND friend_id2='$id_frnd') OR (friend_id1='$id_frnd' AND friend_id2='$id') ";
		$result = mysqli_query($conn, $sql);
		$check="Friend";	
	}
    //get last page
	$sql_all="SELECT u.profile_name ,u.friend_id FROM friends u,myfriends f WHERE u.friend_id= f.friend_id2 AND f.friend_id1='$id'";
	$result_all=mysqli_query($conn, $sql_all);//get all recornds of not a friend
	$last_page=ceil(($result_all->num_rows)/$range);//get last page - list of notFriends

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
    <h2><?php echo $_SESSION["name"]?>'s Friend List</h2>
    <h3>Total number of friends is <?php echo $result_all->num_rows;?></h3>
    <div>
        <form class="one">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Unfriend</th>
                </tr>
                <?php
                    $sql="SELECT u.profile_name, u.friend_id FROM friends u, myfriends f WHERE u.friend_id=f.friend_id2 AND f.friend_id1='$id' LIMIT $start, $range";
                    $result = mysqli_query($conn, $sql);
                    while($raw=$result->fetch_array()){	//list friends
                ?>
                    <tr>
                        <td><?php echo $raw[0]?></td>
                        <td><form name="form" method="post" action=<?php echo $_SERVER['PHP_SELF']?>>
                            <input type="hidden" value="Unfriend" name="stat"><!--return contain value unfriend or not-->
                            <input type="hidden" name="user_id" value=<?php echo $raw[1];?>><!--Return id of unfriend person-->
                            <input type="submit" id = "btn3" name="submit" value="Unfriend" ><!--Unfriend button-->
				</form></td>
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
                                <a href="friendlist.php?pageno=<?php echo $pageno-1; ?>">Previous</a>
                            <?php
                            }
                            if($pageno<$last_page){
                            ?>
                                <a class="four" href="friendlist.php?pageno=<?php echo $pageno+1; ?>">Next</a>
                            <?php
                            }     
                            ?>
                        </td>	            
                    </tr>
                </table>
            </table> 
            <p>
                <a class = "three" href="friendadd.php" type="button">Add Friends</button>
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