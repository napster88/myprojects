<?php
// created: 2018-05-11 11:31:06
$dictionary["dh_dispatch_history"]["fields"]["dh_dispatch_history_te_dispatchrequest"] = array (
  'name' => 'dh_dispatch_history_te_dispatchrequest',
  'type' => 'link',
  'relationship' => 'dh_dispatch_history_te_dispatchrequest',
  'source' => 'non-db',
  'module' => 'te_DispatchRequest',
  'bean_name' => 'te_DispatchRequest',
  'vname' => 'LBL_DH_DISPATCH_HISTORY_TE_DISPATCHREQUEST_FROM_TE_DISPATCHREQUEST_TITLE',
  'id_name' => 'dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida',
);
$dictionary["dh_dispatch_history"]["fields"]["dh_dispatch_history_te_dispatchrequest_name"] = array (
  'name' => 'dh_dispatch_history_te_dispatchrequest_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_DH_DISPATCH_HISTORY_TE_DISPATCHREQUEST_FROM_TE_DISPATCHREQUEST_TITLE',
  'save' => true,
  'id_name' => 'dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida',
  'link' => 'dh_dispatch_history_te_dispatchrequest',
  'table' => 'te_dispatchrequest',
  'module' => 'te_DispatchRequest',
  'rname' => 'name',
);
$dictionary["dh_dispatch_history"]["fields"]["dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida"] = array (
  'name' => 'dh_dispatch_history_te_dispatchrequestte_dispatchrequest_ida',
  'type' => 'link',
  'relationship' => 'dh_dispatch_history_te_dispatchrequest',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_DH_DISPATCH_HISTORY_TE_DISPATCHREQUEST_FROM_DH_DISPATCH_HISTORY_TITLE',
);
