<?php

require_once dirname(__FILE__) . '/../../src/api/main.php';

header('Content-Type: application/json');

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
$organization = isset($_REQUEST['organization']) ? $_REQUEST['organization'] : '';

$token = config('github_token');

switch($action) {
    case 'users':
        $users = get_users_from_organization($token, $organization);
        echo json_encode($users);
        break;
    case 'commenters':
        $users = get_users_from_organization_with_comments($token, $organization);
        echo json_encode($users);

    default:
        echo json_encode(array('error' => 'Invalid action'));
        break;
}

?>