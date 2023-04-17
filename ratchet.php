<?php
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;

require __DIR__.'/vendor/autoload.php';

$server = IoServer::factory(
    new HttpServer(
        new WsServer(
            new class() implements \Ratchet\MessageComponentInterface {
                protected $clients;

                public function __construct() {
                    $this->clients = new \SplObjectStorage;
                }

                public function onOpen(\Ratchet\ConnectionInterface $conn) {
                    $this->clients->attach($conn);
                    echo "New client connected\n";
                }

                public function onMessage(\Ratchet\ConnectionInterface $from, $msg) {
                    foreach ($this->clients as $client) {
                        if ($client !== $from) {
                            $client->send($msg);
                        }
                    }
                }

                public function onClose(\Ratchet\ConnectionInterface $conn) {
                    $this->clients->detach($conn);
                    echo "Client disconnected\n";
                }

                public function onError(\Ratchet\ConnectionInterface $conn, \Exception $e) {
                    echo "An error occurred: {$e->getMessage()}\n";
                    $conn->close();
                }
            }
        )
    ),
    8080
);

$server->run();
