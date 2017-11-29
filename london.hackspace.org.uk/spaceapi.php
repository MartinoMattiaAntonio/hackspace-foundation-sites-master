<?php
$data = array(
    'api' => '0.13',
    'space' => 'London Hackspace',
    'logo' => 'https://london.hackspace.org.uk/images/london.png',
    'url' => 'https://london.hackspace.org.uk',
    'location' => array(
        'address' => '447 Hackney Road, London E2 9DY',
        'lat' => 51.5321,
        'lon' => -0.0607
    ),
    'spacefed' => array(
        'spacenet' => true,
        'spacesaml' => false,
        'spacephone' => false
    ),
    'state' => array(
        // the android app needs a boolean here
        'open' => null,
        'message' => 'members only'
    ),
    'contact' => array(
        'irc' => 'ircs://chat.freenode.net/london-hack-space',
        'twitter' => 'londonhackspace',
        'email' => 'contact@london.hackspace.org.uk',
        'ml' => 'london-hack-space@googlegroups.com',
    ),
    'issue_report_channels' => array(
        'email'
    ),
    'feeds' => array(
        'wiki' => array(
            'url' => 'https://wiki.london.hackspace.org.uk/w/api.php?hidebots=1&amp;days=7&amp;limit=50&amp;action=feedrecentchanges&amp;feedformat=atom',
            'type' => 'atom'
        ),
        'calendar' => array(
            'url' => 'https://www.google.com/calendar/ical/gc1bopmh3c5n0ogvlo6ceujlkc%40group.calendar.google.com/public/basic.ics',
            'type' => 'ical'
        )
    )
);

$dw = date("N");

// is it the Tuesday open evening?
if ($dw == 2) {
    $hr = date("G");
    if ($hr > 18) {
        $data['state']['open'] = true;
        $data['state']['message'] = 'weekly open evening';
    }
}

// http://spaceapi.net/validator suggests these headers
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Cache-Control: no-cache');

echo json_encode($data);
?>
