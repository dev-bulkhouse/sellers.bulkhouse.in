<?php
$sql = "SELECT * FROM document_details WHERE compid = '" . $compid . "' LIMIT 1";
$res = $this->db->query($sql);
$row_docs = $res->row();

$sql = "SELECT * FROM doc_req WHERE firm_type = '" . $firm_type . "' LIMIT 1";
$doc_req = $this->db->query($sql);
$req_docs = $doc_req->row();

if (isset($row_docs->pan_prop)) {
    $pan_id = $row_docs->pan_prop;
    $pan_lock = $row_docs->pan_prop_lock;
}

if (isset($row_docs->vat_cst)) {
    $tin_id = $row_docs->vat_cst;
}

if (isset($row_docs->pan_comp)) {
    $pan_comp_id = $row_docs->pan_comp;
}

if (isset($row_docs->part_deed)) {
    $part_deed_id = $row_docs->part_deed;
}
if (isset($row_docs->sign)) {
    $sign_id = $row_docs->sign;
}

if (isset($row_docs->cert_of_incorp)) {
    $cert_of_incorp_id = $row_docs->cert_of_incorp;
}

if (isset($row_docs->moa_aoa)) {
    $moa_aoa_id = $row_docs->moa_aoa;
}
?><div class="large-5 columns main_panel_grid " data-equalizer-watch="main" data-equalizer="inn">
    <div class="large-12 columns panel   radius" data-equalizer-watch="inn" style="margin-top: 20px">
        <div id="targetLayer2" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
        <div id="targetLayer"></div>
        <div id="uploadFormLayer" class="large-12 columns" style="min-height: 200px">
            <h5 style="border-bottom: 1px solid"><i class="fa fa-newspaper-o"></i> Documents Information</h5>
            <ul class="small-block-grid-5">
                <?php if ($req_docs->pan_prop == 1) { ?>
               
<table>     
  <tr>
      <td>Pan Card: </td>
      <td id="sub_access1" data-reveal-id="pan_pop">Please upload <span class="label">Pan card</span></td>
      <td id="disapproved1" data-reveal-id="pan_pop">Pan card disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access1" >Pan card added and <span class="label">waiting for approve</span></td>
  </tr>
  </table>

                
<!--                <li class="pan_prop_box">
                            <a id="sub_access1" data-reveal-id="pan_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Pan card</p>

                            </a>

                            <a id="disapproved1" data-reveal-id="pan_pop"  style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Pan card disapproved</p>

                            </a>

                            <div id="no_access1"  style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">Pan card added and waiting for approve</p>
                            </div>
                </li>-->
              <?php  } ?>
      <?php if($req_docs->vat_cst == 1) { ?>
      <table>               
  <tr>
      <td>VAT and CST: </td>
      <td id="sub_access2" data-reveal-id="vat_pop">Please upload <span class="label">VAT and CST</span></td>
      <td id="disapproved2" data-reveal-id="vat_pop">VAT and CST disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access2" >VAT and CST added and <span class="label">waiting for approve</span></td>
      
  </tr>
   </table>

<!--                <li class="vat_box">
                    <a id="sub_access2" data-reveal-id="vat_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">VAT and CST</p>

                            </a>

                            <a id="disapproved2" data-reveal-id="vat_pop" style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">VAT and CST disapproved</p>

                            </a>

                            <div id="no_access2" style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">VAT and CST added and waiting for approve</p>
                            </div>
                </li>-->
                <?php  } ?>
                <?php if ($req_docs->pan_comp == 1) { ?>
 <table>
 <tr>
      <td>Company PAN: </td>
      <td id="sub_access3" data-reveal-id="pan_comp_pop">Please upload <span class="label">Company PAN</span></td>
      <td id="disapproved3" data-reveal-id="pan_comp_pop">Company PAN disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access3" >Company PAN added and <span class="label">waiting for approve</span></td>
      
  </tr>
   </table>
<!--                <li class="pan_comp_box">
                            <a id="sub_access3" data-reveal-id="pan_comp_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Company PAN</p>

                            </a>

                            <a id="disapproved3" data-reveal-id="pan_comp_pop" style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Company PAN disapproved</p>

                            </a>

                            <div id="no_access3" style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">Company PAN added and waiting for approve</p>
                            </div>
                </li>-->
                <?php  } ?>
                <?php if ($req_docs->part_deed == 1) { ?>
 <table>
<tr>
      <td>Partnership Deed: </td>
      <td id="sub_access4" data-reveal-id="part_deed_pop">Please upload <span class="label">Partnership Deed</span></td>
      <td id="disapproved4" data-reveal-id="part_deed_pop">Partnership Deed disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access4" >Partnership Deed added and <span class="label">waiting for approve</span></td>
      
  </tr>
   </table>
<!--                <li class="part_deed_box">
                            <a id="sub_access4" data-reveal-id="part_deed_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Partnership Deed</p>

                            </a>

                            <a id="disapproved4" data-reveal-id="part_deed_pop" style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Partnership Deed disapproved</p>

                            </a>

                            <div id="no_access4" style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">Partnership Deed added and waiting for approve</p>
                            </div>
                </li>-->
                <?php  } ?>
                <?php if ($req_docs->sign == 1) { ?>
                 <table>
<tr>
      <td>Authorised Signatory: </td>
      <td id="sub_access5" data-reveal-id="sign_pop">Please upload <span class="label">Authorised Signatory</span></td>
      <td id="disapproved5" data-reveal-id="sign_pop">Authorised Signatory disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access5" >Authorised Signatory added and <span class="label">waiting for approve</span></td>
      
  </tr>
   </table>
<!--                <li class="sign_box">
                            <a id="sub_access5" data-reveal-id="sign_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Authorised Signatory</p>

                            </a>

                            <a id="disapproved5" data-reveal-id="sign_pop" style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Authorised Signatory disapproved</p>

                            </a>

                            <div id="no_access5" style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">Authorised Signatory added and waiting for approve</p>
                            </div>
                </li>-->
                    <?php  } ?>
                <?php if ($req_docs->cert_of_incorp == 1) { ?>
 <table> 
<tr>
      <td>Certificate Of Incorporation: </td>
      <td id="sub_access6" data-reveal-id="cert_of_incorp_pop">Please upload <span class="label">Certificate Of Incorporation</span></td>
      <td id="disapproved6" data-reveal-id="cert_of_incorp_pop">Certificate Of Incorporation disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access6" >Certificate Of Incorporation added and <span class="label">waiting for approve</span></td>
      
  </tr>
   </table>
<!--                 <li class="cert_of_incorp_box">
                            <a id="sub_access6" data-reveal-id="cert_of_incorp_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Certificate Of Incorporation</p>

                            </a>

                            <a id="disapproved6" data-reveal-id="cert_of_incorp_pop"  style="display: none" >
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">Certificate Of Incorporation Disapproved</p>

                            </a>

                            <div id="no_access6" style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">Certificate Of Incorporation added and waiting for approve</p>
                            </div>
                </li>-->
                <?php  } ?>
                <?php if ($req_docs->moa_aoa == 1) { ?>
 <table>                
<tr>
      <td>MOA and AOA: </td>
      <td id="sub_access7" data-reveal-id="moa_aoa_pop">Please upload <span class="label">MOA and AOA</span></td>
      <td id="disapproved7" data-reveal-id="moa_aoa_pop">MOA and AOA disapproved/ <span class="warning label">Upload it Again</span></td>
      <td id="no_access7" >MOA and AOA added and <span class="label">waiting for approve</span></td>
      
  </tr>
</table>
<!--                <li class="moa_aoa_box">
                            <a id="sub_access7" data-reveal-id="moa_aoa_pop"   style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">MOA and AOA</p>

                            </a>

                            <a id="disapproved7" data-reveal-id="moa_aoa_pop" style="display: none">
                                <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                                <p style="font-size: 0.8em;padding-left: 10px">MOA and AOA disapproved</p>

                            </a>

                            <div id="no_access7" style="display: none">
                            <img src="http://sellers.bulkhouse.in/img/pan_card_icon.png" />
                            <p style="font-size: 0.8em;padding-left: 10px">MOA and AOA added and waiting for approve</p>
                            </div>
                </li>-->
                <?php  } ?>

            </ul>
             <?php $this->db->select('*');
        $this->db->from('bank_details');
        $this->db->where(array('bank_details.status' => 2));
        $this->db->where(array('bank_details.compid' => $compid));
        $query = $this->db->get();
        $bnk = $query->result(); 
        foreach ($bnk as $bk) {            if ($bk->status == 2 ) {?>
                
            <form action="confirm_bank/amount/<?php echo $compid; ?>" method="post">
             <input type="text" name="cofirm_amount"/>
             <input type="submit" value="submit"/>
            </form>
        <?php }} ?>
        </div>
        
        
        <div id="pan_pop" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>Pancard Details</h3>
                <form id="pan" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="pan" id="pan" placeholder="Pan Number" value="<?php
                            if(isset($pan_id)) {
                                echo $pan_id;
                                }?>">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file1" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_5" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer5"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>


            <div id="vat_pop" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>vat_cst Details</h3>
                <form id="vat_cst" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="vat_cst" id="vat_cst" placeholder="vat_cst Number">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file2" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_6" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer6"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>

            <div id="pan_comp_pop" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>Company Pan-card Details</h3>
                <form id="pan_comp" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="pan_comp" id="pan_comp" placeholder="Company Pan Number">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file3" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button  class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_7" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer7"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>

            <div id="part_deed_pop" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>Partnership Deed Details</h3>
                <form id="part_deed" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="part_deed" id="part_deed" placeholder="Partnership Deed">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file4" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_8" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer8"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
            <div id="sign_pop" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>Authorised Signatory Details</h3>
                <form id="sign" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="sign" id="sign" placeholder="Authorised Signatory">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file5" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_9" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer9"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
            <div id="cert_of_incorp_pop" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>Certificate of Incorporation Details</h3>
                <form id="cert_of_incorp" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="cert_of_incorp" id="cert_of_incorp" placeholder="Cerificate Of Incorporation">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file6" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_10" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer10"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>

            <div id="moa_aoa_pop" class="reveal-modal small" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
                <h3>MOA and AOA Details</h3>
                <form id="moa_aoa" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
                    <input  type="text" name="moa_aoa" id="moa_aoa" placeholder="MOA and AOA">
                    <div class="inputBtnSection">
                        <div class="large-6 columns">
                            <input name="upload_file7" id="uploadBtn" type="file" />
                        </div>
                        <div class="large-6 columns">
                            <button class="uploadBtn button tiny" type="submit">Upload and Submit</button>
                        </div>
                    </div>
                </form>
                <div id="targetLayer_11" style="display: none"><i class="fa fa-spinner fa-pulse"></i></div>
                <div id="targetLayer11"></div>
                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
            </div>
    </div>
    
   
</div>