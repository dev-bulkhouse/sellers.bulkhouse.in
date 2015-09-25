<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Add Leads | Sellers.Bulkhouse</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="/css/app.v1.css">
        <link rel="stylesheet" href="/css/font.css" cache="false">
        <!--[if lt IE 9]>
        <script src="js/ie/respond.min.js" cache="false"></script>
        <script src="js/ie/html5.js" cache="false"></script>
        <script src="js/ie/fix.js" cache="false"></script>
        <![endif]-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

        <style>
            .bg-primary {
                background-color: #F1F1F1;
                color: black;
            }
            .bg-primary .nav li a {
                color: black;
            }
        </style>
    </head>

    <body style="background-color: white">

        <section>
            <div class="row m-n animated fadeInDown">
                <div class="col-md-12 col-lg-4 col-md-offset-4  m-t-lg">
                    <?php $this->load->view('alert/success-message'); ?>
                    <section class="panel">
                        <header class="panel-heading bg bg-primary text-center"> Add Leads</header>
                        <form action="/admin/add_leads" method="POST" class="panel-body">
                            <div class="form-group">
                                <label class="control-label">Vendor Email</label>
                                <input type="text" name="email" placeholder="Vendor Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Vendor Name</label>
                                <input type="text" name="name" placeholder="Enter Vendor Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Vendor Phone</label>
                                <input type="text" name="phone" placeholder="Enter Vendor Phone" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="sel1">Select Agent:</label>
                                <select name="agent" class="form-control" id="sel1">
                                    <?php $this->db->select('*');
                                        $this->db->from('employee');
                                        $query = $this->db->get();

                                        foreach ($query->result() as $row) {
                                            ?>
                                             <option value="<?php echo $row->agent_id ?>"><?php echo $row->agent_name.' - ('.$row->agent_id.')'; ?></option>
                                       <?php }?>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">Submit</button>
                            <div class="line line-dashed"></div>

                        </form>
                    </section>

                </div>
            </div>
        </section>






