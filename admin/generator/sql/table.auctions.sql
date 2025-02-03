-- 
-- Editor SQL for DB table auctions
-- Created by http://editor.datatables.net/generator
-- 

CREATE TABLE IF NOT EXISTS `auctions` (
	`a_id` int(10) NOT NULL auto_increment,
	`a_name` varchar(255),
	`a_url` varchar(255),
	PRIMARY KEY( `a_id` )
);