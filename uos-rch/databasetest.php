<?php
$services_json = json_decode(getenv("VCAP_SERVICES"),true);
print_r($services_json);
?>
