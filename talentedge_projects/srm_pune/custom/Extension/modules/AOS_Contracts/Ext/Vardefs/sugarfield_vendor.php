<?php
 // created: 2016-09-18 22:23:31
$dictionary['AOS_Contracts']['fields']["te_vendor_id_c"]=array(
	'required' => false,
	'name' => 'te_vendor_id_c',
	'vname' => 'LBL_VENDOR_TE_VENDOR_ID',
	'type' => 'id',
	'massupdate' => 0,
	'no_default' => false,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => 0,
	'audited' => false,
	'inline_edit' => true,
	'reportable' => false,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => 36,
	'size' => '20',
);
$dictionary['AOS_Contracts']['fields']["vendor"]=array(
	'required' => false,
	'source' => 'non-db',
	'name' => 'vendor',
	'vname' => 'LBL_VENDOR',
	'type' => 'relate',
	'massupdate' => 0,
	'no_default' => false,
	'comments' => '',
	'help' => '',
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => false,
	'inline_edit' => true,
	'reportable' => true,
	'unified_search' => false,
	'merge_filter' => 'disabled',
	'len' => '255',
	'size' => '20',
	'id_name' => 'te_vendor_id_c',
	'ext2' => 'te_vendor',
	'module' => 'te_vendor',
	'rname' => 'name',
	'quicksearch' => 'enabled',
	'studio' => 'visible',
);
?>