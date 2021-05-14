<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog"> 
      <div class="modal-content"> 
                  
         <div class="modal-header"> 
         
         <h4 class="modal-title" id="showTitle">
             </h4> 
             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
         </div> 
         
         <div class="modal-body"> 
                       
             <div id="modal-loader" style="display: none; text-align: center;">
             </div>
                       
             <div id="dynamic-content"> <!-- mysql data will load in table -->
                                        
                 <div class="row"> 
                     <div class="col-md-12"> 
                        
                     <div class="table-responsive">
                             
                     <table class="table table-striped table-bordered">
                     <tr>
                     <th>First Name</th>
                     <td id="showDesc"></td>
                     </tr>
                                     
                     <tr>
                     <th>Last Name</th>
                     <td id="txt_lname"></td>
                     </tr>
                                         
                     <tr>
                     <th>Email ID</th>
                     <td id="txt_email"></td>
                     </tr>
                                         
                     <tr>
                     <th>Position</th>
                     <td id="txt_position"></td>
                     </tr>
                                         
                     <tr>
                     <th>Office</th>
                     <td id="txt_office"></td>
                     </tr>
                                         
                     </table>
                                
                     </div>
                                       
                   </div> 
              </div>
                       
             </div> 
                             
         </div> 
           
       <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
       </div>  
              
      </div> 
   </div>
</div>