<?php
namespace app\client;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
  protected $clients;

  public function __construct() {
      echo "Server started";
  }

  public function onOpen(ConnectionInterface $conn) {
        
      $this->clients[$conn->resourceId] = $conn;
      echo "New connection: ({$conn->resourceId})\n";
  }

  public function onMessage(ConnectionInterface $from, $msg) {
      
      foreach ($this->clients as $client) {
              // The sender is not the receiver, send to each client connected
              $client->send($msg);
          
      }
  }

  public function onClose(ConnectionInterface $conn) {
      // The connection is closed, remove it, as we can no longer send it messages
      unset($this->clients[$conn->resourceId]);
      echo "Connection {$conn->resourceId} closed\n";
  }

  public function onError(ConnectionInterface $conn, \Exception $e) {
      echo "Error: {$e->getMessage()}\n";

      $conn->close();
  }
}