<?php
/**
 *
 * Friends Gallery plugin
 * @author Elggzone - perjensen-online.dk
 *
*/

elgg_register_event_handler('init', 'system', 'friendsgallery_init');

function friendsgallery_init() {
	
	elgg_unregister_page_handler('friends', '_elgg_friends_page_handler');
	elgg_unregister_page_handler('friendsof', '_elgg_friends_page_handler');
			
	elgg_register_page_handler('friends', 'custom_friends_page_handler');
	elgg_register_page_handler('friendsof', 'custom_friends_page_handler');	
	elgg_register_page_handler('friendsgallery', 'custom_friends_page_handler');
	
	elgg_register_event_handler('pagesetup', 'system', 'friendsgallery_pagesetup', 0);

	elgg_extend_view('css/elgg', 'friendsgallery/css');	
}

function custom_friends_page_handler($segments, $handler) {
	
	elgg_set_context('friends');
	$path = elgg_get_plugins_path() . 'friendsgallery/pages/friends';
	
	if (isset($segments[0]) && $user = get_user_by_username($segments[0])) {
		elgg_set_page_owner_guid($user->getGUID());
	}
	if (!elgg_get_page_owner_guid()) {
		return false;
	}
	if (elgg_get_logged_in_user_guid() == elgg_get_page_owner_guid()) {
		_elgg_setup_collections_menu();
	}
	
	require_once "$path/index.php";
	return true;

}

function friendsgallery_pagesetup() {

	$owner = elgg_get_page_owner_entity();

	if ($owner) {
		$params = array(
			'name' => 'friends:gallery',
			'text' => elgg_echo('friends:gallery'),
			'href' => 'friendsgallery/' . $owner->username,
			'contexts' => array('friends'),
		);
		elgg_register_menu_item('page', $params);
	}
}
