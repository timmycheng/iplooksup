<!DOCTYPE HTML>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no"> -->
        <title>IP 查找</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
		<script	src="js/ajax.js"></script>
	</head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h1>IP 查找 <small><a href="import.php">导入</a></small> </h1>
                </div>
                <div class="col-md-4">
                    <p class="text-right">Made By Tim</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form class='form-horizontal' id='index_form' action='source/looks_up.php' method='post'>
                        <div class="form-group">
                            <div class="col-md-10">
                                <input class='form-control' type='text' name='input_ip_addr' id='input_ip_addr' placeholder='请输入IP'/>
                            </div>
                            <div class="col-md-2">
                                <input class='btn btn-primary ' type='submit' value='搜索' />
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr style="display:none;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="result" id="result"></div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

    </body>
</html>