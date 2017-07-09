<?php
/**
 * CRUD System
 * Last Changed: $LastChangedDate: 2016-10-05 12:42:23 -0400 (Wed, 05 Oct 2016) $
 * @author detain
 * @copyright 2017
 * @package MyAdmin
 * @category Admin
 */
use \MyCrud\Crud;

/**
 * crud_reusable_fantastico()
 * @return void
 */
function crud_reusable_fantastico() {
		Crud::init('get_reusable_fantastico', 'licenses', 'function')
		->set_title('Reusable Fantastico')
		->go();
}
