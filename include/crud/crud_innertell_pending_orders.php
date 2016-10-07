<?php
function crud_innertell_pending_orders() {
	require_once(INCLUDE_ROOT . '/rendering/class.crud.php');
	$crud = crud::init("select o.* , location.id as server_id, dedicated_cpu.short_desc as dedicated_cpu_desc, dedicated_cpu.monthly_price as dedicated_cpu_cost, dedicated_memory.short_desc as dedicated_memory_desc, dedicated_memory.monthly_price as dedicated_memory_cost, dedicated_hd1.short_desc as dedicated_hd1_desc, dedicated_hd1.monthly_price as dedicated_hd1_cost, dedicated_hd2.short_desc as dedicated_hd2_desc, dedicated_hd2.monthly_price as dedicated_hd2_cost, dedicated_bandwidth.short_desc as dedicated_bandwidth_desc, dedicated_bandwidth.monthly_price as dedicated_bandwidth_cost, dedicated_ips.short_desc as dedicated_ips_desc, dedicated_ips.monthly_price as dedicated_ips_cost, dedicated_os.short_desc as dedicated_os_desc, dedicated_os.monthly_price as dedicated_os_cost, dedicated_cp.short_desc as dedicated_cp_desc, dedicated_cp.monthly_price as dedicated_cp_cost  from orders as o left join location on location.order_id=o.id left join dedicated_cpu on o.dedicated_cpu=dedicated_cpu.id  left join dedicated_memory on o.dedicated_memory=dedicated_memory.id  left join dedicated_hd as dedicated_hd1 on o.dedicated_hd1=dedicated_hd1.id  left join dedicated_hd as dedicated_hd2 on o.dedicated_hd2=dedicated_hd2.id  left join dedicated_bandwidth on o.dedicated_bandwidth=dedicated_bandwidth.id  left join dedicated_ips on o.dedicated_ips=dedicated_ips.id  left join dedicated_os on o.dedicated_os=dedicated_os.id  left join dedicated_cp on o.dedicated_cp=dedicated_cp.id")
		->set_title("Pending Dedicated Server Orders")
		->go();
}
