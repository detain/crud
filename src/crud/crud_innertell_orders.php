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
use \MyCrud\Crud;

/**
 * crud_innertell_orders()
 * @return void
 */
function crud_innertell_orders() {
		Crud::init('select server_id, username, server_hostname, server_status from servers', 'servers')
		->set_title('Dedicated Server Orders')
		->go();
}
