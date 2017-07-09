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
 * crud_licenses()
 * @return void
 */
function crud_licenses() {
		Crud::init('select * from licenses', 'licenses')
		->set_title('Licenses')
		->go();
}
