<?php
echo '<pre>	GET the iid from the url; </br></br>
		  Query both invoices, and i_charges, tables with a left join to retrieve all data for invoice with the invoice information that, when clicked, will:</br></br>
		
		I.really I need to query * icharges, (joined and where`d) with: invoices, iip_relates, icp_relates,  master, 
		Where   mid = ic_mid
		where invoices.iip_iid = icharges.ic_iid
		where icp_relates.icp_icid = icharges.ic_id
		 for each: echo columns 
		 icharges.*, invoice.iid:invoice.iclose, master.mid:master.mpid::master.mipid
		II.  Generate a page that, at the top shows the invoice table information for the selected invoice, in a form input view </br></br>
		III.  Include a new datatable of the charges for that invoice  drawn in the lower portion of the page. </br></br> 
		IV.  Write a script and place a  (submit form) button in top portion of page when clicked will</br>
			display a form (maybe in same page in a modal iframe) that when submitted will:
			A. creates a payment record created with payment date, check no, rec&apos;d by, amount, invoice.iid and payment total from the form</br>
			then for each icharge in form that is selected do this:
subrinvpmt function(){	B. For each invoice charge:
				
				1. change ic_paid to 1
				2. update iip_relates to record a relationship between invoice.iid record and ipayments.ip_id - iip_relate,</br>
				3. record a relationship between icharge.ic_id and ipayments.ip_id  for each ic_id,  -  icp_relate</br>
				4. change invoice.iclose to 1,  </br>
				5. Change master.mpaid to 1 for paid, </br>
				6. Return the user to invoice page with payment button.  </br></br>
		V.   for partial  payments that, when clicked, will:</br></br>
			
			A. Create a payment record created with payment date, check no, rec&apos;d by, amount, invoice.iid and payment total from the form</br>
			B. Write a script to place a "Mark Row(s) as Paid" button in the table Buttons
			Call subrinvpmt(selected rows){
				for each icharge.icid
					a. change ic_paid to 1	
					a. record a relationship between invoice.iid record and ipayments.ip_id,iip_relate,</br>
					b. record a relationship between icharge.ic_id and ipayments.ip_id and pyaemnt relationship,  icp_relate</br></br> 
					
					
					e. Change master.mready to 1 for paid, </br>
					d. Return the user to invoice page with payment button.  </br></br> </h3></pre>
partial/full pmt
			c. invoice.iclose if paid in full
Roman Numerals
Capitalized Letters
Arabic Numerals
Lowercase Letters
			
';?> 