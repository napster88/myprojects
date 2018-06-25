<?php
require_once('include/MVC/View/views/view.list.php');
class te_DispatchRequestViewList extends ViewList {
	var $vendorlist;
	var $kitweight;
	var $docweight;

	function te_DispatchRequestViewList(){
			parent::ViewList();
	}

	function preDisplay() {
		$cvlistoption = '';
		$weightlistoption = '';

		 $crbean = BeanFactory::getBean('te_Courier');
	   $crbeanList = $crbean->get_full_list();
	    foreach ($crbeanList as $bean) {
				$cvlistoption .= '<option value="'.$bean->id.'">'.$bean->name.'</option>';
	    }

			$weight_slabs = $GLOBALS['app_list_strings']['weight_slabs'];
			foreach ($weight_slabs as $key => $value) {
				$weightlistoption .= '<option value="'.$key.'">'.$value.'</option>';
			}



		$this->vendorlist = $cvlistoption;
		$this->kitweight = $weightlistoption;
		$this->docweight = $weightlistoption;
		parent:: preDisplay();
	}

	function display(){
		$scripts = '<script type="text/javascript" src="custom/modules/te_DispatchRequest/js/disp_action.js"></script>';
		$scripts .= '<style>
	 			 .popup_backover{
	 				 background-color:#0009;
	 				 position:fixed;
	 				 top:0;
	 				 left:0;
	 				 width:100%;
	 				 height:100%;
	 				 z-index:9;
	 				 display:none;
	 			 }
	 			 .action_popup{
	 				 background-color:#fff;
	 				 position:fixed;
	 				 top:20%;
	 				 left:40%;
	 				 width:30%;
	 				 padding:20px;
	 				 z-index:10;
	 				 display:none;
	 			 }
	 			 .entry_close_button{
	 				 position:absolute;
	 				 top:10px;
	 				 right:20px;
	 				 background-color:#000;
	 				 color:#fff;
	 				 padding: 0px 6px 3px 6px;
	 				 font-size: 19px;
	 				 border-radius: 20px;
	 				 cursor: pointer;
	 				 line-height: 17px;
	 			 }
				 .outstock_div{
				 	display:none;
				 }
	  </style>';
		echo $scripts;
		parent::display();
		$pophtml = '<div class="approve action_popup">
		<span class="entry_close_button">x</span>
			<form id="approve_form" name="approve_form" action="">
				<div class="outstock_div">
					<p><b>Partial Dispatch Reason</b> :
						<select class="partial_reason" name="reason"></select>
					</p>
					<p><b>Next Dispatch Date</b> : <input type="date" name="next_dispatch_date" class="next_dispatch_date" /></p>
				</div>
				<p><b>Pickup Date</b> : <input type="date" name="pickup_date"></p>
				<p><b>Courier Vendor</b> : ';
				if(!empty($this->vendorlist)){
					$pophtml .= '<select name="c_vendor">';
					$pophtml .= $this->vendorlist;
					$pophtml .= '</select>';
				}
				$pophtml .= '</p>
				<p><b>Kit Weight</b> : ';
				if(!empty($this->kitweight)){
					$pophtml .= '<select name="kit_weight">';
					$pophtml .= $this->kitweight;
					$pophtml .= '</select>';
				}
				$pophtml .= '</p>
				<p><b>Document Weight</b> : ';
				if(!empty($this->docweight)){
					$pophtml .= '<select name="doc_weight">';
					$pophtml .= $this->docweight;
					$pophtml .= '</select>';
				}
				$pophtml .= '</p>
				<p><b>Consignment Number</b> : <input type="text" name="consignment_number" /></p>
				<p><b>Tracking URL</b> : <input type="text" name="tracking_url" /></p>
				<p><b>Remark</b> : <textarea name="comment"></textarea></p>
				<input type="hidden" class="beanId" name="beanId" value="" />
				<input type="hidden" class="beanAction" name="beanAction" value="" />
				<input type="hidden" class="approve_kit_items" name="kititems" value="" />
				<div class="button action_save">Update</div>
			</form>
		</div>';
		$pophtml .= '<div class="disapprove action_popup">
		<span class="entry_close_button">x</span>
			<form id="disapprove_form" name="hold_form" action="">
				<p><b>Reason for disapprove</b> :
					<select class="disapprove_reason" name="reason"></select>
				</p>
				<p><b>Comment</b> : <textarea name="comment"></textarea></p>
				<input type="hidden" class="beanId" name="beanId" value="" />
				<input type="hidden" class="beanAction" name="beanAction" value="" />
				<div class="button action_save">Update</div>
			</form>
		</div>';
		$pophtml .= '<div class="hold action_popup">
		<span class="entry_close_button">x</span>
			<form id="hold_form" name="hold_form" action="">
				<p><b>Reason for hold</b> :
					<select class="hold_reason" name="reason"></select>
				</p>
				<p><b>Dispatch Date</b> : <input type="date" name="dispatch_date" /></p>
				<p><b>Courier Vendor</b> : ';
				if(!empty($this->vendorlist)){
					$pophtml .= '<select name="c_vendor">';
					$pophtml .= $this->vendorlist;
					$pophtml .= '</select>';
				}
				$pophtml .= '</p>
				<p><b>Kit Weight</b> : ';
				if(!empty($this->kitweight)){
					$pophtml .= '<select name="kit_weight">';
					$pophtml .= $this->kitweight;
					$pophtml .= '</select>';
				}
				$pophtml .= '</p>
				<p><b>Document Weight</b> : ';
				if(!empty($this->docweight)){
					$pophtml .= '<select name="doc_weight">';
					$pophtml .= $this->docweight;
					$pophtml .= '</select>';
				}
				$pophtml .= '</p>
				<p><b>Consignment Number</b> : <input type="text" name="consignment_number" /></p>
				<p><b>Tracking URL</b> : <input type="text" name="tracking_url" /></p>
				<p><b>Remark</b> : <textarea name="comment"></textarea></p>
				<input type="hidden" class="beanId" name="beanId" value="" />
				<input type="hidden" class="beanAction" name="beanAction" value="" />
				<div class="button action_save">Update</div>
			</form>
		</div>';
		$pophtml .= '<div class="complete action_popup">
		<span class="entry_close_button">x</span>
			<form id="complete_form" name="complete_form" action="">
				<p><b>Dispatch Date</b> : <input type="date" name="dispatch_date" /></p>
				<p><b>Remark</b> : <textarea name="comment"></textarea></p>
				<input type="hidden" class="beanId" name="beanId" value="" />
				<input type="hidden" class="beanAction" name="beanAction" value="" />
				<div class="button action_save">Update</div>
			</form>
		</div>';
		$pophtml .= '<div class="return action_popup">
		<span class="entry_close_button">x</span>
			<form id="return_form" name="return_form" action="">
				<p><b>Return Reason</b> :
					<select class="return_reason" name="reason"></select>
				</p>
				<p><b>Kit Items</b> :
					<div class="return_kit_items">

					</div>
				</p>
				<p><b>Remark</b> : <textarea name="comment"></textarea></p>
				<input type="hidden" class="beanId" name="beanId" value="" />
				<input type="hidden" class="beanAction" name="beanAction" value="" />
				<div class="button action_save">Update</div>
			</form>
		</div>';
		$pophtml .= '<div class="popup_backover"></div>';

		echo $pophtml;

	}
	 public function displayHeader($retModTabs = false)
    {

        global $theme;
        global $max_tabs;
        global $app_strings;
        global $current_user;
        global $sugar_config;
        global $app_list_strings;
        global $mod_strings;
        global $current_language;

        $GLOBALS['app']->headerDisplayed = true;

        $themeObject = SugarThemeRegistry::current();
        $theme       = $themeObject->__toString();

        $ss = new Sugar_Smarty();
        $ss->assign("APP", $app_strings);
        $ss->assign("THEME", $theme);
        $ss->assign("THEME_CONFIG", $themeObject->getConfig());
        $ss->assign("THEME_IE6COMPAT", $themeObject->ie6compat ? 'true' : 'false');
        $ss->assign("MODULE_NAME", $this->module);
        $ss->assign("langHeader", get_language_header());

        // set ab testing if exists
        $testing = (isset($_REQUEST["testing"]) ? $_REQUEST['testing'] : "a");
        $ss->assign("ABTESTING", $testing);

        // get browser title
        $ss->assign("SYSTEM_NAME", $this->getBrowserTitle());

        // get css
        $css = $themeObject->getCSS();
        if ($this->_getOption('view_print'))
        {
            $css .= '<link rel="stylesheet" type="text/css" href="' . $themeObject->getCSSURL('print.css') . '" media="all" />';
        }
        $ss->assign("SUGAR_CSS", $css);

        // get javascript
        ob_start();
        $this->renderJavascript();

        $ss->assign("SUGAR_JS", ob_get_contents() . $themeObject->getJS());
        ob_end_clean();

        // get favicon
        if (isset($GLOBALS['sugar_config']['default_module_favicon']))
            $module_favicon = $GLOBALS['sugar_config']['default_module_favicon'];
        else
            $module_favicon = false;

        $favicon = $this->getFavicon();
        $ss->assign('FAVICON_URL', $favicon['url']);

        // build the shortcut menu
        $shortcut_menu       = array();
        foreach ($this->getMenu() as $key => $menu_item)
            $shortcut_menu[$key] = array(
                "URL"         => $menu_item[0],
                "LABEL"       => $menu_item[1],
                "MODULE_NAME" => $menu_item[2],
                "IMAGE"       => $themeObject
                        ->getImage($menu_item[2], "border='0' align='absmiddle'", null, null, '.gif', $menu_item[1]),
            );
        $ss->assign("SHORTCUT_MENU", $shortcut_menu);

        // handle rtl text direction
        if (isset($_REQUEST['RTL']) && $_REQUEST['RTL'] == 'RTL')
        {
            $_SESSION['RTL'] = true;
        }
        if (isset($_REQUEST['LTR']) && $_REQUEST['LTR'] == 'LTR')
        {
            unset($_SESSION['RTL']);
        }
        if (isset($_SESSION['RTL']) && $_SESSION['RTL'])
        {
            $ss->assign("DIR", 'dir="RTL"');
        }

        // handle resizing of the company logo correctly on the fly
        $companyLogoURL     = $themeObject->getImageURL('company_logo.png');
        $companyLogoURL_arr = explode('?', $companyLogoURL);
        $companyLogoURL     = $companyLogoURL_arr[0];

        $company_logo_attributes = sugar_cache_retrieve('company_logo_attributes');
        if (!empty($company_logo_attributes))
        {
            $ss->assign("COMPANY_LOGO_MD5", $company_logo_attributes[0]);
            $ss->assign("COMPANY_LOGO_WIDTH", $company_logo_attributes[1]);
            $ss->assign("COMPANY_LOGO_HEIGHT", $company_logo_attributes[2]);
        }
        else
        {
            // Always need to md5 the file
            $ss->assign("COMPANY_LOGO_MD5", md5_file($companyLogoURL));

            list($width, $height) = getimagesize($companyLogoURL);
            if ($width > 212 || $height > 40)
            {
                $resizePctWidth  = ($width - 212) / 212;
                $resizePctHeight = ($height - 40) / 40;
                if ($resizePctWidth > $resizePctHeight)
                    $resizeAmount    = $width / 212;
                else
                    $resizeAmount    = $height / 40;
                $ss->assign("COMPANY_LOGO_WIDTH", round($width * (1 / $resizeAmount)));
                $ss->assign("COMPANY_LOGO_HEIGHT", round($height * (1 / $resizeAmount)));
            }
            else
            {
                $ss->assign("COMPANY_LOGO_WIDTH", $width);
                $ss->assign("COMPANY_LOGO_HEIGHT", $height);
            }

            // Let's cache the results
            sugar_cache_put('company_logo_attributes', array(
                $ss->get_template_vars("COMPANY_LOGO_MD5"),
                $ss->get_template_vars("COMPANY_LOGO_WIDTH"),
                $ss->get_template_vars("COMPANY_LOGO_HEIGHT")
                    )
            );
        }
        $ss->assign("COMPANY_LOGO_URL", getJSPath($companyLogoURL) . "&logo_md5=" . $ss->get_template_vars("COMPANY_LOGO_MD5"));

        // get the global links
        $gcls                 = array();
        $global_control_links = array();
        require("include/globalControlLinks.php");

        foreach ($global_control_links as $key => $value)
        {
            if ($key == 'users')
            {   //represents logout link.
                $ss->assign("LOGOUT_LINK", $value['linkinfo'][key($value['linkinfo'])]);
                $ss->assign("LOGOUT_LABEL", key($value['linkinfo'])); //key value for first element.
                continue;
            }

            foreach ($value as $linkattribute => $attributevalue)
            {
                // get the main link info
                if ($linkattribute == 'linkinfo')
                {
                    $gcls[$key] = array(
                        "LABEL"   => key($attributevalue),
                        "URL"     => current($attributevalue),
                        "SUBMENU" => array(),
                    );
                    if (substr($gcls[$key]["URL"], 0, 11) == "javascript:")
                    {
                        $gcls[$key]["ONCLICK"] = substr($gcls[$key]["URL"], 11);
                        $gcls[$key]["URL"]     = "javascript:void(0)";
                    }
                }
                // and now the sublinks
                if ($linkattribute == 'submenu' && is_array($attributevalue))
                {
                    foreach ($attributevalue as $submenulinkkey => $submenulinkinfo)
                        $gcls[$key]['SUBMENU'][$submenulinkkey] = array(
                            "LABEL" => key($submenulinkinfo),
                            "URL"   => current($submenulinkinfo),
                        );
                    if (substr($gcls[$key]['SUBMENU'][$submenulinkkey]["URL"], 0, 11) == "javascript:")
                    {
                        $gcls[$key]['SUBMENU'][$submenulinkkey]["ONCLICK"] = substr($gcls[$key]['SUBMENU'][$submenulinkkey]["URL"], 11);
                        $gcls[$key]['SUBMENU'][$submenulinkkey]["URL"]     = "javascript:void(0)";
                    }
                }
            }
        }
        $ss->assign("GCLS", $gcls);

        $ss->assign("SEARCH", isset($_REQUEST['query_string']) ? $_REQUEST['query_string'] : '');

        if ($this->action == "EditView" || $this->action == "Login")
            $ss->assign("ONLOAD", 'onload="set_focus()"');

        $ss->assign("AUTHENTICATED", isset($_SESSION["authenticated_user_id"]));

        // get other things needed for page style popup
        if (isset($_SESSION["authenticated_user_id"]))
        {
            // get the current user name and id
            $ss->assign("CURRENT_USER", $current_user->full_name == '' || !showFullName() ? $current_user->user_name : $current_user->full_name );
            $ss->assign("CURRENT_USER_ID", $current_user->id);

            // get the last viewed records
            require_once("modules/Favorites/Favorites.php");
            $favorites        = new Favorites();
            $favorite_records = $favorites->getCurrentUserSidebarFavorites();
            $ss->assign("favoriteRecords", $favorite_records);

            $tracker = new Tracker();
            $history = $tracker->get_recently_viewed($current_user->id);
            $ss->assign("recentRecords", $this->processRecentRecords($history));
        }

        $bakModStrings = $mod_strings;
        if (isset($_SESSION["authenticated_user_id"]))
        {
            // get the module list
            $moduleTopMenu = array();

            $max_tabs = $current_user->getPreference('max_tabs');
            // Attempt to correct if max tabs count is extremely high.
            if (!isset($max_tabs) || $max_tabs <= 0 || $max_tabs > 10)
            {
                $max_tabs = $GLOBALS['sugar_config']['default_max_tabs'];
                $current_user->setPreference('max_tabs', $max_tabs, 0, 'global');
            }

            $moduleTab = $this->_getModuleTab();
            $ss->assign('MODULE_TAB', $moduleTab);


            // See if they are using grouped tabs or not (removed in 6.0, returned in 6.1)
            $user_navigation_paradigm = $current_user->getPreference('navigation_paradigm');
            if (!isset($user_navigation_paradigm))
            {
                $user_navigation_paradigm = $GLOBALS['sugar_config']['default_navigation_paradigm'];
            }


            // Get the full module list for later use
            foreach (query_module_access_list($current_user) as $module)
            {
                // Bug 25948 - Check for the module being in the moduleList
                if (isset($app_list_strings['moduleList'][$module]))
                {
                    $fullModuleList[$module] = $app_list_strings['moduleList'][$module];
                }
            }


            if (!should_hide_iframes())
            {
                $iFrame = new iFrame();
                $frames = $iFrame->lookup_frames('tab');
                foreach ($frames as $key => $values)
                {
                    $fullModuleList[$key] = $values;
                }
            }
            elseif (isset($fullModuleList['iFrames']))
            {
                unset($fullModuleList['iFrames']);
            }

            if ($user_navigation_paradigm == 'gm' && isset($themeObject->group_tabs) && $themeObject->group_tabs)
            {
                // We are using grouped tabs
                require_once('include/GroupedTabs/GroupedTabStructure.php');
                $groupedTabsClass = new GroupedTabStructure();
                $modules          = query_module_access_list($current_user);

                //handle with submoremodules
                $max_tabs = $current_user->getPreference('max_tabs');
                // If the max_tabs isn't set incorrectly, set it within the range, to the default max sub tabs size
                if (!isset($max_tabs) || $max_tabs <= 0 || $max_tabs > 10)
                {
                    // We have a default value. Use it
                    if (isset($GLOBALS['sugar_config']['default_max_tabs']))
                    {
                        $max_tabs = $GLOBALS['sugar_config']['default_max_tabs'];
                    }
                    else
                    {
                        $max_tabs = 8;
                    }
                }

                $subMoreModules                                         = false;
                $groupTabs                                              = $groupedTabsClass->get_tab_structure(get_val_array($modules));
                // We need to put this here, so the "All" group is valid for the user's preference.
                $groupTabs[$app_strings['LBL_TABGROUP_ALL']]['modules'] = $fullModuleList;


                // Setup the default group tab.
                $allGroup        = $app_strings['LBL_TABGROUP_ALL'];
                $ss->assign('currentGroupTab', $allGroup);
                $currentGroupTab = $allGroup;
                $usersGroup      = $current_user->getPreference('theme_current_group');
                // Figure out which tab they currently have selected (stored as a user preference)
                if (!empty($usersGroup) && isset($groupTabs[$usersGroup]))
                {
                    $currentGroupTab = $usersGroup;
                }
                else
                {
                    $current_user->setPreference('theme_current_group', $currentGroupTab);
                }

                $ss->assign('currentGroupTab', $currentGroupTab);
                $usingGroupTabs = true;
            }
            else
            {
                // Setup the default group tab.
                $ss->assign('currentGroupTab', $app_strings['LBL_TABGROUP_ALL']);

                $usingGroupTabs                                         = false;
                $groupTabs[$app_strings['LBL_TABGROUP_ALL']]['modules'] = $fullModuleList;
            }


            $topTabList = array();

            // Now time to go through each of the tab sets and fix them up.
            foreach ($groupTabs as $tabIdx => $tabData)
            {
                $topTabs = $tabData['modules'];
                if (!is_array($topTabs))
                {
                    $topTabs = array();
                }
                $extraTabs = array();

                // Split it in to the tabs that go across the top, and the ones that are on the extra menu.
                if (count($topTabs) > $max_tabs)
                {
                    $extraTabs = array_splice($topTabs, $max_tabs);
                }
                // Make sure the current module is accessable through one of the top tabs
                if (!isset($topTabs[$moduleTab]))
                {
                    // Nope, we need to add it.
                    // First, take it out of the extra menu, if it's there
                    if (isset($extraTabs[$moduleTab]))
                    {
                        unset($extraTabs[$moduleTab]);
                    }
                    if (count($topTabs) >= $max_tabs - 1)
                    {
                        // We already have the maximum number of tabs, so we need to shuffle the last one
                        // from the top to the first one of the extras
                        $lastElem  = array_splice($topTabs, $max_tabs - 1);
                        $extraTabs = $lastElem + $extraTabs;
                    }
                    if (!empty($moduleTab))
                    {
                        $topTabs[$moduleTab] = $app_list_strings['moduleList'][$moduleTab];
                    }
                }


                /*
                  // This was removed, but I like the idea, so I left the code in here in case we decide to turn it back on
                  // If we are using group tabs, add all the "hidden" tabs to the end of the extra menu
                  if ( $usingGroupTabs ) {
                  foreach($fullModuleList as $moduleKey => $module ) {
                  if ( !isset($topTabs[$moduleKey]) && !isset($extraTabs[$moduleKey]) ) {
                  $extraTabs[$moduleKey] = $module;
                  }
                  }
                  }
                 */

                // Get a unique list of the top tabs so we can build the popup menus for them
                foreach ($topTabs as $moduleKey => $module)
                {
                    $topTabList[$moduleKey] = $module;
                }

                //$groupTabs[$tabIdx]['modules'] = $topTabs;
                // $groupTabs[$tabIdx]['extra'] = $extraTabs;
            }
        }

        if (isset($topTabList) && is_array($topTabList))
        {
            // Adding shortcuts array to menu array for displaying shortcuts associated with each module
            $shortcutTopMenu = array();
            foreach ($topTabList as $module_key => $label)
            {
                global $mod_strings;
                $mod_strings = return_module_language($current_language, $module_key);
                foreach ($this->getMenu($module_key) as $key => $menu_item)
                {
                    $shortcutTopMenu[$module_key][$key] = array(
                        "URL"         => $menu_item[0],
                        "LABEL"       => $menu_item[1],
                        "MODULE_NAME" => $menu_item[2],
                        "IMAGE"       => $themeObject
                                ->getImage($menu_item[2], "border='0' align='absmiddle'", null, null, '.gif', $menu_item[1]),
                        "ID"          => $menu_item[2] . "_link",
                    );
                }
            }
            if (!empty($sugar_config['lock_homepage']) && $sugar_config['lock_homepage'] == true)
                $ss->assign('lock_homepage', true);
            $ss->assign("groupTabs", $groupTabs);
            $ss->assign("shortcutTopMenu", $shortcutTopMenu);
            $ss->assign('USE_GROUP_TABS', $usingGroupTabs);

            // This is here for backwards compatibility, someday, somewhere, it will be able to be removed
            $ss->assign("moduleTopMenu", $groupTabs[$app_strings['LBL_TABGROUP_ALL']]['modules']);
            $ss->assign("moduleExtraMenu", $groupTabs[$app_strings['LBL_TABGROUP_ALL']]['extra']);

// Show the custom panel in the left panel


        global $current_user;
		$sqlFollw = "SELECT status,count(id) as count FROM te_dispatchrequest WHERE deleted =0 AND status LIKE 'waiting_for_approval'";
					$resFollw = $GLOBALS['db']->query($sqlFollw);
					$rowFollw= $GLOBALS['db']->fetchByAssoc($resFollw);
					
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">'.$rowFollw['count'].'</div>            
						<span class="count_top">  <a   href= "index.php?searchFormTab=basic_search&module=te_DispatchRequest&action=index&query=true&status_basic=waiting_for_approval">Waiting For Approval
						</a></span></div>	';
		$sqlFollwa = "SELECT status,count(id) as count FROM te_dispatchrequest WHERE deleted =0 AND status LIKE 'approved'";
					$resFollwa = $GLOBALS['db']->query($sqlFollwa);
					$rowFollwa= $GLOBALS['db']->fetchByAssoc($resFollwa);
					
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">'.$rowFollwa['count'].'</div>
						<span class="count_top">  <a   href="index.php?searchFormTab=basic_search&module=te_DispatchRequest&action=index&query=true&status_basic=approved">Approved
					</a></span></div>	';
					
		$sqlFollwd = "SELECT status,count(id) as count FROM te_dispatchrequest WHERE deleted =0 AND status LIKE 'disapproved'";
					$resFollwd = $GLOBALS['db']->query($sqlFollwd);
					$rowFollwd= $GLOBALS['db']->fetchByAssoc($resFollwd);
					
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">'.$rowFollwd['count'].'</div>
						<span class="count_top"> <a   href="index.php?searchFormTab=basic_search&module=te_DispatchRequest&action=index&query=true&status_basic=disapproved">Disapproved</a></span></div>';
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">0</div>
						<span class="count_top">  <a   href="#">Todays Partial</a></span>
					</div>	';
		$sqlFollc = "SELECT status,count(id) as count FROM te_dispatchrequest WHERE deleted =0 AND status LIKE 'completed'";
					$resFollc = $GLOBALS['db']->query($sqlFollc);
					$rowFollc= $GLOBALS['db']->fetchByAssoc($resFollc);		
								
		$Dispatchstus   .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">'.$rowFollc['count'].'</div>
						<span class="count_top">   <a   href="index.php?searchFormTab=basic_search&module=te_DispatchRequest&action=index&query=true&status_basic=completed">Dispatched</a></span>
					</div>	';
					
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">3</div>
						<span class="count_top">  <a   href="#">Overdue Partial</a></span>
					</div>	';
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">2</div>
						<span class="count_top">  <a   href="#">Todays Hold</a></span>
					</div>	';
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">2</div>
						<span class="count_top">  <a   href="#">Overdue Hold</a></span>
					</div>	';
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">1</div>
						<span class="count_top">  <a   href="#">Overdue</a></span>
					</div>	';
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">0</div>
						<span class="count_top">  <a   href="#">New Requests</a></span>
					</div>	';
		$sqlFollwh = "SELECT status,count(id) as count FROM te_dispatchrequest WHERE deleted =0 AND status LIKE 'hold'";
					   $resFollwh = $GLOBALS['db']->query($sqlFollwh);
					   $rowFollwh= $GLOBALS['db']->fetchByAssoc($resFollwh);
					
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">'.$rowFollwh['count'].'</div>
						<span class="count_top">  <a   href="index.php?searchFormTab=basic_search&module=te_DispatchRequest&action=index&query=true&status_basic=hold">On Hold</a></span>
					</div>	';
		$Dispatchstus        .= '<div class="col-xs-6 col-sm-3 tile_stats_count">
						<div class="count">2</div>
						<span class="count_top">  <a   href="#">Partial Dispatch</a></span>
					</div>	';
					
		
		


		$ss->assign("statusWiseCount", $Dispatchstus);
				
				$ss->assign("csshack", 'leadpage');
		 if (isset($extraTabs) && is_array($extraTabs))
        {
            // Adding shortcuts array to extra menu array for displaying shortcuts associated with each module
            $shortcutExtraMenu = array();
            foreach ($extraTabs as $module_key => $label)
            {
                global $mod_strings;
                $mod_strings = return_module_language($current_language, $module_key);
                foreach ($this->getMenu($module_key) as $key => $menu_item)
                {
                    $shortcutExtraMenu[$module_key][$key] = array(
                        "URL"         => $menu_item[0],
                        "LABEL"       => $menu_item[1],
                        "MODULE_NAME" => $menu_item[2],
                        "IMAGE"       => $themeObject
                                ->getImage($menu_item[2], "border='0' align='absmiddle'", null, null, '.gif', $menu_item[1]),
                        "ID"          => $menu_item[2] . "_link",
                    );
                }
            }
            $ss->assign("shortcutExtraMenu", $shortcutExtraMenu);
        }

        if (!empty($current_user))
        {
            $ss->assign("max_tabs", $current_user->getPreference("max_tabs"));
        }


        $imageURL    = SugarThemeRegistry::current()->getImageURL("dashboard.png");
        $homeImage   = "<img src='$imageURL'>";
        $ss->assign("homeImage", $homeImage);
        global $mod_strings;
        $mod_strings = $bakModStrings;
        $headerTpl   = $themeObject->getTemplate('header.tpl');
        if (inDeveloperMode())
            $ss->clear_compiled_tpl($headerTpl);
        //~ echo $themeObject->getTemplate('_headerModuleList.tpl');die;
        if ($retModTabs)
        {
            return $ss->fetch($themeObject->getTemplate('_headerModuleList.tpl'));
        }
        else
        {
            $ss->display($headerTpl);

            $this->includeClassicFile('modules/Administration/DisplayWarnings.php');

        }    $errorMessages = SugarApplication::getErrorMessages();
		
		}
		
		
	}
}
?>
