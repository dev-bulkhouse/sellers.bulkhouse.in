
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>


        <title>Upload Document</title>

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            <link rel="stylesheet" href="/css/app.v1.css" />
            <link rel="stylesheet" href="/css/font.css" cache="false" />

            <link rel="stylesheet" type="text/css" href="/css/component.css" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"/>
            <script src="/js/modernizr.custom.js"></script>
            <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <!--    <script src="<?php echo site_url(); ?>js/vendor.js" type="text/javascript"></script>-->
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
            <style>
                *{
                    box-sizing:border-box;
                    -moz-box-sizing:border-box;
                    -webkit-box-sizing:border-box;
                }

                .inputBtnSection{

                }
                .fileUpload {
                    position: relative;
                    overflow: hidden;
                    /*border:solid 1px gray;*/
                    display:inline-block;
                    vertical-align:top;
                }
                .uploadBtn{
                    display: inline-block;
                    padding: 6px 12px;
                    margin-bottom: 0;
                    font-size: 14px;
                    font-weight: normal;
                    line-height: 1.428571429;
                    text-align: center;
                    vertical-align: middle;
                    cursor: pointer;
                    border: 1px solid transparent;
                    border-radius: 4px;
                    white-space: nowrap;
                    -webkit-user-select: none;
                    -moz-user-select: none;
                    -ms-user-select: none;
                    -o-user-select: none;
                    user-select: none;
                }

                .fileUpload input.upload {
                    position: absolute;
                    top: 0;
                    right: 0;
                    margin: 0;
                    padding: 0;
                    font-size: 20px;
                    cursor: pointer;
                    opacity: 0;
                    filter: alpha(opacity=0);
                }

                .list-group-item{
                    font-size: 1.2em
                }
                .btn-default {
                    color: #fff !important;
                    background-color: #5DCFF3;
                    border-color: #5DCFF3;
                }
                .bg-primary {
                    background-color: #F5F5F5;
                    color: #010101;
                }
                .bg-primary .nav li a {
                    color: #010101;
                }
                .bg-primary .nav li a:hover {
                    color: #010101;
                }




            </style>
    </head>

    <body>
        <section class="vbox" style="background-color: #fff">

            <form action="/main/upl" method='post' enctype="multipart/form-data">
                <h3 style="padding: 20px">Upload</h3><br/>
                <div class="form-group m-t-lg">

                    <div class="col-lg-5 media m-t-none">
                        <div class="media-body">
                            <input type="text" class="form-control" name="email" placeholder="sample input">
                        </div>
                        <br/>
                        <div class="media-body">
                            <input type="file" name="file" title="Browse" class="btn btn-sm btn-info m-b-sm">
                        </div>
                        <br/>
                        <div class="media-body">
                            <button class="btn btn-sm btn-default" type="submit">Submit</button>
                        </div>
                    </div>

                </div>
            </form>







        </section>
        <div>

            <?php
$pan_prop_type = "http://sellers.bulkhouse.files.s3.amazonaws.com/1_pan_card.pdf";

$filejpg = "http://sellers.bulkhouse.files.s3.amazonaws.com/1_pan_card.jpg";
$filepdf = "http://sellers.bulkhouse.files.s3.amazonaws.com/1_pan_card.pdf";
if ($pan_prop_type == $filejpg){ ?>
<div class="modal-body">
           <img src="<?php echo $pan_prop_type; ?>">
                        </div>

<?php }elseif ($pan_prop_type == $filepdf){ ?>
 <div class="modal-body">
     <iframe width="100%" height="800px" src="<?php echo $pan_prop_type; ?>"></iframe>
                        </div>
	<?php }else {?>
	<div></div>
	<?php } ?>

        </div>

    </body>
</html>
