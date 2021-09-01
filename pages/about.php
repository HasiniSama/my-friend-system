<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="../resources/style.php?theme=DarkCyan"/>
    <title>About Page</title>
</head>
<body>
<h1>My Friend System</h1>
    <h2>About Project</h2>
    <div class = "box">
            <p>This system was developed as an assignment for<br>SENG 21253 - Web Application Development (2019/2020) <br>University of Kelaniya.<br>php + MySQL + HTML + CSS.</p>
            <hr width="100%">
        <h1>Database schema</h1>
        <p>The system database consists of two tables. Table <code>friends</code> and Table <code>myfriends</code>.<br><br></p>
        <table>
            <h3>friends</h3>
            <tr>
            <th>#Field_no</th>
            <th>Name</th>
            <th>Type</th>
            <th>Default value</th>
            <th>Other</th>
            </tr>
            <tr>
            <td>1</td>
            <td>friend_id</td>
            <td>UNSIGNED INT</td>
            <td>AUTO</td>
            <td>PRIMARY KEY</td>
            </tr>
            <tr>
            <td>2</td>
            <td>friend_email</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
            <td>-</td>
            </tr>
            <tr>
            <td>3</td>
            <td>password</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
            <td>-</td>
            </tr>
            <tr>
            <td>4</td>
            <td>profile_name</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
            <td>-</td>
            </tr>
            <tr>
            <td>5</td>
            <td>date_started</td>
            <td>TIMESTAMP</td>
            <td>CURRENT</td>
            <td>-</td>
            </tr>
        </table>
        <br><br>
        <table>
            <h3>myfriends</h3>
            <tr>
            <th>#Field_no</th>
            <th>Name</th>
            <th>Type</th>
            <th>Default value</th>
            <th>Other</th>
            </tr>
            <tr>
            <td>1</td>
            <td>friend_id1</td>
            <td>INT</td>
            <td>NOT NULL</td>
            <td>COMPOSITE KEY</td>
            </tr>
            <tr>
            <td>2</td>
            <td>friend_id2</td>
            <td>INT</td>
            <td>NOT NULL</td>
            <td>COMPOSITE KEY</td>
            </tr>
        </table>
        <br><br>
        <a href="index.php">Home</a>
    </div>
</body>
</html>