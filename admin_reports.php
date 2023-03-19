<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lost-Item Finder | Reports</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="responsive.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" href="./images/logo.png" type="image/x-icon">
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
    </head>
    <?php include 'code_session.php'; ?>

    <body>
        <header>
            <div class="header" id="header">
                <div class="logo-name">
                </div>
            </div>
            <div class="divider">
                <p>Municipality of Ibaan</p>
            </div>
        </header>
        <nav class="navigation" id="navigation">
            <h3><img src="./images/menu-logo.png" height="18" width="18">Menu</h3>
            <div class="nav-links" id="myDIV">
                <a href="admin_home.php" class="nav-link"><img src="./images/home-icon.png" width="18" height="18" style="margin-right: 3px;">Home</a>
                <a href="admin_itemRecord.php" class="nav-link"><img src="./images/add-icon.png" width="18" height="18" style="margin-right: 3px;">Item Records</a>
                <a href="admin_messages.php" class="nav-link"><img src="./images/messages-icon.png" width="18" height="18" style="margin-right: 3px;">Messages</a>
                <a href="admin_reports.php" class="nav-link active"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Reports</a>
                <a href="admin_accounts.php" class="nav-link"><img src="./images/user-icon.png" width="18" height="18" style="margin-right: 3px;">Accounts</a>
                <a href="logout.php" class="nav-link"><img src="./images/logout-icon.png" width="18" height="18" style="margin-right: 3px;">Logout</a>
            </div>
        </nav>

        <main>
        <section class="form-output" id="form-output">
                <div class="output-container">
                        <div class="col-md-3"></div>
                            <div class="col-md-6 well">
                                <h3 class="text-primary">Item Report</h3>
                                <hr style="border-top:1px dotted #000;"/>
                                <form class="form-inline" method="POST" action="" style="padding: 5% 8% 2% 10%">
                                    <div class="first-three">
                                        <input class="input big" type="date" placeholder="Start Date" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>" />
                                        <input class="input small" type="date" placeholder="End Date" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"/>
                                        <select name="claim" class="input small">
                                            <option value="default">--select--</option>
                                            <option value="1 AND 0">All</option>
                                            <option value="1">CLAIMED</option>
                                            <option value="0">NOT CLAIMED</option>
                                        </select>
                                    </div>
                                    <div class="first-three">
                                        <button class="submit" name="search"><span class="glyphicon glyphicon-search">Search</span></button> 
                                        <button class="submit"> <a href="admin_reports.php" style="text-decoration: none; background-color: none; color: black;"><span class = "glyphicon glyphicon-refresh">Refresh<span></a></button>
                                    </div>
                                </form>
                                <br /><br />
                                <div class='output-cont-table'>	
                                    <table style="width:100%">
                                        <thead class="alert-info">
                                            <tr>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006">Item No.</th>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006; width:13%;"">Item Category</th>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006; width:20%;"">Item Location</th>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006; width:15%;"">Item Brand</th>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006; width:15%;"">Item Color</th>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006; width:20%;">Item Description</th>
                                                <th style="text-align: center; background-color: #cccccc; color: #ec9006; width:18%;">Date</th>
                                            </tr>
                                        <thead>
                                        <tbody>
                                        <?php 
                                            include 'connect_db.php';

                                            if(ISSET($_POST['search'])){
                                                $date1 = date("Y-m-d", strtotime($_POST['date1']));
                                                $date2 = date("Y-m-d", strtotime($_POST['date2']));
                                                $claim = $_POST['claim'];
                                                
                                                $query="SELECT * FROM `tb_itemrecord` WHERE isClaimed = '$claim' AND date(`date`) BETWEEN '$date1' AND '$date2'" or die(mysqli_error());
                                                
                                                //$query="SELECT * FROM `tb_itemrecord` WHERE date(`date`) BETWEEN '$date1' AND '$date2'" or die(mysqli_error());
                                                
                                                $result = mysqli_query($conn, $query);
                                                
                                                if ($result)
                                                {
                                                    // it return number of rows in the table.
                                                    $row = mysqli_num_rows($result);
                                                        
                                                    if ($row)
                                                    {
                                                        echo "<p class='total-item'>Found Item ";
                                                        if ($claim==0){
                                                            echo 'NOT YET CLAIMED: ' .$row;
                                                        }else{
                                                            echo 'CLAIMED: ' .$row;
                                                            echo '</p>';
                                                        }
                                                    }
                                                    // close the result.

                                                    //if table has no data
                                                    if (mysqli_num_rows($result) == 0) {
                                                    echo "<div class='nodata'>
                                                            <img src='./images/nodata.png' width='120px' height='120px'>
                                                            <p>No Data</p>
                                                        </div>";
                                                    }   
                                                }

                                                while($row=mysqli_fetch_assoc($result))
                                                {
                                                ?>
                                                <tr>
                                                    <td style="text-align: center;"><?php echo $row['itemNo']?></td>
                                                    <td style="text-align: center;"><?php echo $row['itemCategory']?></td>
                                                    <td style="text-align: center;"><?php echo $row['itemLocation']?></td>
                                                    <td style="text-align: center;"><?php echo $row['itemBrand']?></td>
                                                    <td style="text-align: center;"><?php echo $row['itemColor']?></td>
                                                    <td style="text-align: center;"><?php echo $row['itemDescription']?></td>
                                                    <td style="text-align: center;"><?php echo $row['date']?></td>
                                                </tr>
                                        <?php
                                        }
                                    }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>	
                            </div>
                    </div>
                </div>
            </section>
        </main>
    </body>
    <style>
        .submit{
            font: .8rem 'Poppins', arial, sans-serif;
            margin: 10px 12px;
            border-radius: 5px;
            border: 2px solid var(--color-gray);
            padding: 5px 5px;
            position: sticky;
        }
        .submit:hover{
            background-color:#ec9006;
        }
    </style>
</html>
