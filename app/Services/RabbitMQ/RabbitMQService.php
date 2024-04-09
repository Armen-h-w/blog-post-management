<?php

namespace App\Services\RabbitMQ;

use Illuminate\Support\Facades\Queue;

class RabbitMQService
{

    /**
     * @param int $id
     * @param string $action
     * @return void
     */
    public function publish(int $id, string $action): void
    {
        $message = json_encode(['id' => $id, 'action' => $action]);
        Queue::connection('rabbitmq')->pushRaw($message);
    }

}
