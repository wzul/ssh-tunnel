<?php

require __DIR__ . '/vendor/autoload.php';

use Savvii\SshTunnel\SshTunnel;

$tunnel = new SshTunnel(
  sshUsername: 'ubuntu',
  sshHost: '<IP Address>',
  sshPort: 22,
  bindHost: '127.0.0.1',
  bindPort: 3306,
  identityFile: __DIR__ .'/key.pem',   
);

$db = new PDO(
  sprintf(
      "mysql:host=%s;port=%d;",
      $tunnel->localAddress,
      $tunnel->localPort
  ),
  'root',
  'password'
);

echo print_r($db, true);
exit;
