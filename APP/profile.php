<?php
session_start();
include("connect.php");

// Verify login status first
if (!isset($_SESSION['email'])) {
    header("Location: index2.php");
    exit();
}

// Use email instead of ID
$email = $_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email); // 's' = string
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User not found in database");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Table user information</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
       
  
        body {
            background: linear-gradient(135deg, #00feba, #5b548a);
            min-height: 100vh;
            color: black;
        }
        #topBtn {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        #topBtn:hover {
            background-color: #000305;
        }
        .text-primary{
            color: aliceblue;
        }
    	 .inf-content{
    border:1px solid #DDDDDD;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    box-shadow: 7px 7px 7px rgba(0, 0, 0, 0.3);
    
}			                                                      
    </style>
</head>
<body>
 <!-- Return Button as an Icon -->
<button id="topBtn" onclick="goToIndex5()">
    <span class="glyphicon glyphicon-arrow-left"></span> <!-- Return Icon -->
</button>

<script type="text/javascript">
    function goToIndex5() {
        window.location.href = "index5.php"; // Redirect to index4.html
    }
</script>

<div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip" src="https://bootdey.com/img/Content/avatar/avatar7.png" data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
            <tbody>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                            ID                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo htmlspecialchars($user['id']); ?>
                                    </td>
                                </tr>
                                <tr>    
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-user text-primary"></span>    
                                            First Name                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo htmlspecialchars($user['nom']); ?>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-cloud text-primary"></span>  
                                            Last Name                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo htmlspecialchars($user['prenom']); ?>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-envelope text-primary"></span> 
                                            Email                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <a href="mailto:<?php echo htmlspecialchars($user['email']); ?>" style="color: aliceblue;">
                                            <?php echo htmlspecialchars($user['email']); ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-earphone text-primary"></span> 
                                            Telephone                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo htmlspecialchars($user['telephone']); ?>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-map-marker text-primary"></span> 
                                            Region                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo htmlspecialchars($user['region']); ?>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-home text-primary"></span> 
                                            City                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php echo htmlspecialchars($user['ville']); ?>
                                    </td>
                                </tr>
                                <tr>        
                                    <td>
                                        <strong>
                                            <span class="glyphicon glyphicon-time text-primary"></span>
                                            Account Created                                                
                                        </strong>
                                    </td>
                                    <td class="text-primary">
                                        <?php 
                                            // Format the timestamp
                                            $created_at = new DateTime($user['created_at']);
                                            echo htmlspecialchars($created_at->format('F j, Y \a\t g:i a')); 
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>                                        
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>