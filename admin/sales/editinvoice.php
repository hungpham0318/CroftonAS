<?php
echo 'Algorithm:</br></br>
begin process when : USER CLICKS DELETE INVOICE from i_charges view.</br></br>
&nbsp;&nbsp;GET the iid from the url; </br></br>
&nbsp;&nbsp&nbsp;1.  Query both invoices and i_charges tables with a left join to retrieve all data for invoice</br></br>
&nbsp;&nbsp&nbsp;2.  Generate a page that, at the top shows the invoice table information for the invoice, </br></br>
&nbsp;&nbsp&nbsp;3.  Include a new datatable of the charges for that invoice  drawn in the lower portion of the page. </br></br> 
&nbsp;&nbsp;&nbsp;4.  Write a script and place a DELETE THIS INVOICE button in the top part </br>&nbsp;&nbsp&nbsp;&nbsp;&nbsp;with the invoice information that, when clicked, will:</br></br>
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;a. Delete all relates created in invoice process??? check for forgotten specifics</br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;b.  Delete the i_charges for that invoice#;</br></br>
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;c.  Change the minvid to 0 for each ic_mid(mid) in master table; </br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;d.  change the status of each ic_mid=(master.mid)(master.msubstatus) back to "inv-no";  </br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;e.   delete the invoice pdf from the bunker.</br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;f.   Delete the invoice table record.</br></br> 

&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;g. Returns the user to... ??? not sure yet???</br></br> 
&nbsp;&nbsp;&nbsp;5.  Write a script and place a DELETE AND RECREATE THIS INVOICE button in the top part</br>&nbsp;&nbsp&nbsp;&nbsp;&nbsp; with the invoice information that, when clicked, will:</br></br>
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;a. Delete all relates created in invoice process??? check for forgotten specifics</br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;b.  Delete the i_charges for that invoice#;</br></br>
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;c.  Change the minvid to 0 for each ic_mid(mid) in master table; </br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;d.  change the status of each ic_mid=(master.mid)(master.msubstatus) back to "inv-no";  </br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;e.   delete the invoice pdf from the bunker.</br></br> 
&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;f.   Delete the invoice table record.</br></br> 

&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;g. Return the user to Dealership view with only those vechicles in the i_charges.temp table? hmmmm...</br></br> 
';?>  