 <div class="wrap">
  <h2>Event Options</h2>
  <p>Setting</p>
  <ul class="nav nav-tabs">
    <li class="active"><a href="#home">Event</a></li>
    <li><a href="#menu2">Customer</a></li>
    <li><a href="#menu3">Join event</a></li>
    <li><a href="#menu5">Consultant</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
    <h3>Create new event</h3>
      <div class="wrap-form">
   
      <form class="contact" name="drfit_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>"> 
       
        <div class="form-group">
            <div class="col-sm-12">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                    <input id="hatazu_event_name" name="hatazu_event_name" placeholder="Name" class="form-control alert-border" type="text" required>
                </div>
                <div class="alert alert-danger" style="display:none">
                  <strong>Tên sự kiện </strong> không hợp lệ
                </div>
            </div>

        </div>
       
          <div class="form-group">
               <div class="col-sm-12">
                  <div class="input-group date form_datetime_start" data-date="2017-08-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:mm" data-link-field="dtp_input1">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      <input id="datebook_start" name="datebook_start" class="form-control" size="16" type="text" value="" placeholder="Start" readonly>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
                    </div>
                  <input type="hidden" id="dtp_input1" value="" /><br/>
              </div>
          </div>
         
          <div class="form-group">
               <div class="col-sm-12">
                  <div class="input-group date form_datetime_finish" data-date="2017-08-16T05:25:07Z" data-date-format="yyyy-mm-dd HH:mm" data-link-field="dtp_input2">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                      <input id="datebook_finish" name="datebook_finish" class="form-control" size="16" type="text" value="" placeholder="Finish" readonly>
                      <span class="input-group-addon"><i class="glyphicon glyphicon-remove"></i></span>
                    </div>
                  <input type="hidden" id="dtp_input2" value="" /><br/>
              </div>
          </div>
         
          <div class="form-group">
               <div class="col-sm-12 text-left">
                  <button id="btn-submit" type="button" name="btn-submit">Xác nhận</button>
               </div>
          </div>
          <img id="loading" style="float:left; margin:3px; display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/>
          <div id="response"></div>
      </form>
    
      <!-- <button id="clear_data">clear data</button>
      <p><a><img id="clear_data_waiting" style="display:none;" src="<?php //echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/></a></p>
        <div id="clear_data_response_warming"></div>-->
        <div class="list_event">
          <table id="tb_event"  cellpadding="0" cellspacing="0" border="0" class="display DataTable" width="100%">
          <thead>
            <tr>
              <th>id</th>
              <th>name_event</th>
              <th>start</th>
              <th>finish</th>
              <th>delete</th>
            </tr>
          </thead>
      </table>
        </div>
       </div>
    </div>
    
    <div id="menu2" class="tab-pane fade">
      <h3>Customers</h3>   
       <table id="tb_customers"  cellpadding="0" cellspacing="0" border="0" class="display DataTable" width="100%">
          <thead>
            <tr>
              <th>Id</th>
              <th>firstname</th>
              <th>lastname</th>
              <th>email</th>
              <th>num_phone</th>
              <th>address</th>
              <th>time_reg</th>
              <th>edit</th>
            </tr>
          </thead>
      </table>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Customers join event</h3>
      <form id="frm_join_event">
        <div class="form-group">
          <select id="sel_event">
          <!-- Dependent Select option field -->
          </select>
          <img id="sel-event-waiting" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/> 
        </div>
        <div id="sel_change"></div>   
      </form> 
       <table id="tb_customers_join_event"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
          <thead>
            <tr>
              <th>id</th>
              <th>fistname</th>
              <th>lastname</th>
              <th>email</th>
              <th>num_phone</th>
              <th>number_lotto</th>
              <th>gift</th>
              <th>nameservice</th>
              <th>date_join</th>
              <th>delete</th>
            </tr>
          </thead>
      </table>
    </div>
    
    <div id="menu5" class="tab-pane fade">
      <h3>Consultant</h3>
      <!-- <form id="frm_consultant">
        <div class="form-group">
          <select id="sel_not_reach">
         
          </select>
          <img id="sel-event-waiting" style="display:none;" src="<?php //echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/> 
        </div>
        <div id="sel_not_change"></div>   
      </form> -->
      
       <table id="tb_consultant"  cellpadding="0" cellspacing="0" border="0" class="display" width="100%">
          <thead>
            <tr>
              <th>id</th>
              <th>fistname</th>
              <th>lastname</th>
              <th>email</th>
              <th>num_phone</th>
              <th>message</th>
              <th>address</th>
              <th>time_reg</th>
              <!-- <th>deletes</th> -->
              </tr>
          </thead>
      </table>
    </div>
  </div>
</div>
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal_popup">Open Modal</button>-->
    <!-- Modal -->
<div class="customer_event">
<div class="modal fade" id="modal_popup" role="dialog">
      <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button id="btn-close" type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Delete</h4> 
          </div>
          <div class="modal-body">          
            <div class="row">       
                <form id="frm_delete_join" class="main-centers">
                    <input type="hidden" id="id_join" name="id_join">
                     <div class="col-sm-12 text-center">    
                         <div class="form-group">
                            <label for="txt">Are you sure you wish to delete 1 row?</label>  
                        </div>
                     </div>           
                      <div class="col-sm-12 text-right">    
                      <button type="submit" id="sub-btn" class="btn btn-default">Delete</button>
                     </div> 
                </form>                    
            </div>
            <div class="modal-footer">
              <div class="row">
              <div class="col-sm-12 text-left">
                <p><img id="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/></p>
                <div id="response" style="font-size:13px;color:#000;"></div> 
              </div>
              </div>
            </div>
        </div>     
      </div>
    </div>
</div>
</div>
<div class="popup_event">
<div class="modal fade" id="popup_event" role="dialog">
      <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button id="btn-close" type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Delete</h4> 
          </div>
          <div class="modal-body">          
            <div class="row">       
                <form id="frm_delete_event" class="main-centers">
                    <input type="hidden" id="id_event"  name="id_event">
                     <div class="col-sm-12 text-center">    
                         <div class="form-group">
                            <label for="txt">Are you sure you wish to delete 1 row?</label>  
                        </div>
                     </div>           
                      <div class="col-sm-12 text-right">    
                      <button type="submit" id="sub-btn" class="btn btn-default">Delete</button>
                     </div> 
                </form>                    
            </div>
            <div class="modal-footer">
              <div class="row">
              <div class="col-sm-12 text-left">
                <p><img id="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/></p>
                <div id="response" style="font-size:13px;color:#000;"></div> 
               <!-- <button type="submit" class="btn btn-default" data-dismiss="modal">Delte</button>  -->
              </div>
              </div>
            </div>
        </div>     
      </div>
    </div>
</div>
</div>
<div class="popup_edit_customer">
<div class="modal fade" id="popup_edit_customer" role="dialog">
      <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button id="btn-close" type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Update</h4> 
          </div>
          <div class="modal-body" style="padding:0px 50px;">           
            <div class="row">       
                <form id="frm_edit_customer" class="form_edit">
                     <div class="col-md-12">
                        <div class="row">
                           <input type="hidden" id="id_customer"  name="id_customer">    
                           <div class="form-group">
                            <div class="input-group">                      
                              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Họ">                                                                         
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">                      
                              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Tên">                                                                         
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">                      
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email">                                                                         
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">                      
                              <input type="number" name="num_phone" id="num_phone" class="form-control" placeholder="Số điện thoại…">                                                                         
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="input-group">                      
                              <input type="text" name="address" id="address" class="form-control" placeholder="Địa chỉ">                                                                         
                            </div>
                          </div>
                      </div>
                   </div>           
                    <div class="col-sm-12 text-right">    
                    <button type="button" id="btn-update" class="btn btn-default">Update</button>
                   </div> 
                </form>                    
            </div>
            <div class="modal-footer">
              <div class="row">
              <div class="col-md-12 text-left">
                <p><img id="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/></p>
                <div id="response" style="font-size:13px;color:#000;"></div> 
               <!-- <button type="submit" class="btn btn-default" data-dismiss="modal">Delte</button>  -->
              </div>
              </div>
            </div>
        </div>     
      </div>
    </div>
</div>
</div>
<div class="popup_delete_customer">
<div class="modal fade" id="popup_delete_customer" role="dialog">
      <div class="modal-dialog">    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button id="btn-close" type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Delete</h4> 
          </div>
          <div class="modal-body">          
            <div class="row">       
                <form id="frm_delete_customer" class="main-centers">
                    <input type="hidden" id="id_customer"  name="id_customer">
                     <div class="col-sm-12 text-center">    
                         <div class="form-group">
                            <label for="txt">Are you sure you wish to delete 1 row?</label>  
                        </div>
                     </div>           
                      <div class="col-sm-12 text-right">    
                      <button type="button" id="btn-trash" class="btn btn-default">Delete</button>
                     </div> 
                </form>                    
            </div>
            <div class="modal-footer">
              <div class="row">
              <div class="col-sm-12 text-left">
                <p><img id="loading" style="display:none;" src="<?php echo plugin_dir_url(__FILE__)."images/loader.gif";?>"/></p>
                <div id="response" style="font-size:13px;color:#000;"></div> 
               <!-- <button type="submit" class="btn btn-default" data-dismiss="modal">Delte</button>  -->
              </div>
              </div>
            </div>
        </div>     
      </div>
    </div>
</div>
</div>