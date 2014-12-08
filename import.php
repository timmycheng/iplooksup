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
		<script src="js/ajaxfileupload.js"></script>
		<script	src="js/ajax.js"></script>
	</head>
	<body>
		<div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <h1>IP 查找 <small><a href="index.php">返回首页</a></small> </h1>
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
                <div class="col-md-4">
                    <form class='form-horizontal' id='import_form' action='source/up_load.php' method='POST' enctype="multipart/form-data">
                    	<div class="form-group">
                    		<label for="file">文件上传：</label>
                    		<input type="file" id='file' name='file' />                  		
                    	</div>
                    	<div class="form-group">
                    		<input class='btn btn-primary' type="submit" value="提交文件" />
                            <input type="button" id="clc-ret" class="btn btn-primary" value="清除结果" />
                    	</div>
                        <div class="form-group">
                            <input type="button" id="lit" class="btn btn-primary" value='显示列表'>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 ">
                	<p class="lead">模板：</p>
                	<p><a href="tmp/model.xls">下载地址</a></p>
                	<p class="lead">两种格式：</p>
                	<p>sheet1 子网地址段（xxx.xxx.xxx.xxx/xx），单个地址子网掩码为32</p>
                	<p>sheet2 开始结束地址段（xxx.xxx.xxx.xxx - xxx.xxx.xxx.xxx）</p>


                </div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                	<hr>
                </div>
                <div class="col-md-4"></div>
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