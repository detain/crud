<?php
/**
 * CRUD System
 * Last Changed: $LastChangedDate: 2016-10-05 12:42:23 -0400 (Wed, 05 Oct 2016) $
 * @author detain
 * @version $Revision: 21022 $
 * @copyright 2017
 * @package MyAdmin
 * @category Admin
 */
use \detain\Crud\Crud;

/**
 * crud_innertell_pending_orders_new()
 * @return void
 */
function crud_innertell_pending_orders_new() {
		Crud::init("select servers.server_id
	 , servers.username
	 , servers.ccname
	 , servers.exp
	 , servers.bankname
	 , servers.cc
	 , servers.server_hostname
	 , servers.root
	 , servers.dedicated_tag
	 , servers.custom_tag
	 , servers.status
	 , servers.`comment`
	 , servers.inital_bill
	 , servers.hardware
	 , servers.ips
	 , servers.monthly_bill
	 , servers.setup
	 , servers.discount
	 , servers.rep
	 , servers.`date`
	 , servers.total_cost
	 , servers.referer
	 , servers.server_location
	 , servers.fraud
	 , servers.modernbill_package_id
	 , servers.hardware_ordered
	 , servers.server_billed
	 , servers.welcome_email
	 , servers.dedicated_cpu
	 , servers.dedicated_memory
	 , servers.dedicated_hd1
	 , servers.dedicated_hd2
	 , servers.dedicated_bandwidth
	 , servers.dedicated_ips
	 , servers.dedicated_os
	 , servers.dedicated_cp
	 , servers.dedicated_raid
	 , group_concat(DISTINCT vlans.vlans_networks SEPARATOR ':') AS vlans
	 , group_concat(DISTINCT vlans.vlans_ports SEPARATOR ':') AS ports
	 , users.id as user_id FROM
  innertell.servers
LEFT JOIN vlans
ON vlans_comment LIKE concat('%', server_hostname)
GROUP BY
  servers.username
", 'domains')
		->set_title('Pending Server Orders')
		->go();
}
