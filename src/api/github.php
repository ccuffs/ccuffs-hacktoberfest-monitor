<?php

// a function that acess the github api using a token and curl
function github_api_call($url, $token) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'github-api-request');    
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: token ' . $token));
    $output = curl_exec($ch);
    return json_decode($output, true);
}

// a function that returns all users that belong to an organization on github
function get_users_from_organization($token, $organization) {
    $url = 'https://api.github.com/orgs/' . $organization . '/members';
    $users = github_api_call($url, $token);
    return $users;
}

// a function that returns all users that commented on any issues of an organization on github
function get_users_from_organization_with_comments($token, $organization) {
    $url = 'https://api.github.com/orgs/' . $organization . '/issues';
    $issues = github_api_call($url, $token);
    $users = array();
    foreach ($issues as $issue) {
        $comments = $issue['comments'];
        foreach ($comments as $comment) {
            $user = $comment['user'];
            $users[] = $user;
        }
    }
    return $users;
}

// list all commits in an organization on github within a period of time
function get_commits_from_organization($token, $organization, $start_date, $end_date) {
    $url = 'https://api.github.com/repos/' . $organization . '/commits?since=' . $start_date . '&until=' . $end_date;
    $commits = github_api_call($url, $token);
    return $commits;
}

// list all pull request in an organization on github wihin a period of time
function get_pull_requests_from_organization($token, $organization, $start_date, $end_date) {
    $url = 'https://api.github.com/repos/' . $organization . '/pulls?since=' . $start_date . '&until=' . $end_date;
    $pull_requests = github_api_call($url, $token);
    return $pull_requests;
}

// example of use of get_pull_requests_from_organization
// $token = 'your_token';
// $organization = 'your_organization';
// $start_date = '2016-01-01';
// $end_date = '2016-12-31';
// $pull_requests = get_pull_requests_from_organization($token, $organization, $start_date, $end_date);
// print_r($pull_requests);


?>