<?php
/**
 * Converts an Array to PDF
 * @author Joe Huss <detain@interserver.net>
 * @copyright 2017
 * @package MyAdmin
 * @category XML
 */

/**
 * converts an array into a PDF
 *
 * @param array $fields array of rows/fields
 * @param $headers
 * @return string the PDF
 */
function array2Pdf(array $fields, $headers) {
	function_requirements('phpExcellCommon');
	return phpExcellCommon($fields, 'PDF', $headers);
}