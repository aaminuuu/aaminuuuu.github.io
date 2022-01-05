<?php include("includes/config.php");?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Add Blog</h3></div>
                                    <div class="card-body">
                                        <form actio="" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="small mb-1" for="ctgyname">Blog name</label>
                                                <input class="form-control py-4" id="ctgyname" name="ctgyname" type="text" placeholder="Enter Blog Name" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Select Blog image</label>
                                                <input type="file" class="form-control-file" id="usercover" name="usercover" onchange="UImageValidation()" required>
                                                <progress id="progressBar" value="" max="100" style="width:90%;"></progress><span id="stats" ></span>
			<w id="status" ></w><e id="loaded_n_total" style="display:none;" ></e>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="Blogs.php">Go Back To Blogs</a>
                                                <input type="submit" class="btn btn-primary" name="addctgy" value="Add Blog">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="index.php">Go Back to Users</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>Ideal Cupboard
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
function _(el){
	return document.getElementById(el);
}

function uploaduCover(){
	var file = _("usercover").files[0];
	var str = _("ctgyname").value;
	if(file != null || file!= undefined || file.length!= 0 ){
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("usercover", file);
	formdata.append("ctgyname", str);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlercover, false);
	ajax.addEventListener("load", completeHandlercover, false);
	ajax.addEventListener("error", errorHandlercover, false);
	ajax.addEventListener("abort", abortHandlercover, false);
	ajax.open("POST", "userimage_parser.php");
	ajax.send(formdata);}
}
function progressHandlercover(event){
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	_("status").innerHTML = Math.round(percent)+"%";
}
function completeHandlercover(event){
	_("status").innerHTML = event.target.responseText;
	_("progressBar").value = 100;
}
function errorHandlercover(event){
	_("status").innerHTML = "Upload Failed";
}
function abortHandlercover(event){
	_("status").innerHTML = "Upload Aborted";
}

function UImageValidation(){ 
	var fileInput = _("usercover");
	var filePath = fileInput.value; 
	var imageExtensions = /(\.jpg|\.jpeg|\.png)$/i;
	if (!imageExtensions.exec(filePath)) { 
		_("stats").innerHTML = "<p><w style='color: #E1868E'>invalid Image type choose again</w></p>";
    fileInput.value = '';}
    else{
        _("stats").innerHTML ="";
        uploaduCover();
    }
}
</script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>