<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 50%;
            margin-top:20px;
        }
        input{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <?php
    if(isset($_POST['con'])){
    $host ='localhost';
    $user='root';
    $pass='';
    $bd='std';
    @$con=mysqli_connect($host,$user,$pass,$bd);
    // @$insert="insert into student value(4,'aicha','kouba')";
    $name='';
    $id='';
    $adr='';
    $r=mysqli_query($con,"select * from student");
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['addresss'])){
        $adr=$_POST['addresss'];
    }
    $update="update student set name='ZAki' where id=1";
    $del="delete from student  where id=1";
    $insert="insert into student value($id ,'$name','$adr') ";
    mysqli_query($con,$insert);
    

    }   
    ?>
    <form method="post">
        <center>
            <input type="text" name="id"><br>
            <input type="text" name="name"><br>
            <input type="text" name="addresss"><br>
            <input type="submit" value="connect" name="con">
        </center>
    </form>
    <center>
        <table>
            <tr>
                <th> id </th> 
                <th> name </th>
                <th> adress </th>
            </tr>
            <?php
                while ($row = mysqli_fetch_array($r)){
                    echo '<tr>';
                    echo '<td>'.$row['id'].'</td>';
                    echo '<td>'.$row['name'].'</td>';
                    echo '<td>'.$row['addresss'].'</td>';
                    echo '</tr>';
                }
            ?>
        </table>
        
    </center>
</body>
</html>