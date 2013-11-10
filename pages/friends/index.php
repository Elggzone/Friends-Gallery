<?php
/**
 * Elgg friends page
 *
 * @package Elgg.Core
 * @subpackage Social.Friends
 */

$owner = elgg_get_page_owner_entity();
if (!$owner) {	
	forward('', '404');
}

if ($handler == 'friendsof') {
	$title = elgg_echo("friends:of:owned", array($owner->name));
} else {
	$title = elgg_echo("friends:owned", array($owner->name));
}

$options = array(
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'type' => 'user',
	'full_view' => false,
	'count' => true
);

switch ($handler) {
	case 'friendsof':
		$options['inverse_relationship'] = true;
		break;
	case 'friendsgallery':
		$options['inverse_relationship'] = false;
		$options['limit'] = 12;		
		$options['list_class'] = "elgg-gallery-friends";		
		$options['size'] = "large";
		$options['no_results'] = elgg_echo('friends:none');
		$options['use_hover'] = false;
		$options['use_link'] = false;
		break;
	case 'friends':		
	default:
		$options['inverse_relationship'] = false;
		$options['no_results'] = elgg_echo('friends:none');
		break;
}
$content = elgg_list_entities_from_relationship($options);

$number = elgg_get_entities_from_relationship($options);

$params = array(
	'content' => $content,
	'title' => $title . " ($number)",
	'filter_override' => elgg_view('friendsgallery/nav', array('selected' => $handler)),
);

$body = elgg_view_layout('content', $params);

echo elgg_view_page($title, $body);
