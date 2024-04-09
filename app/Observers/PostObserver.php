<?php

namespace App\Observers;

use App\Models\Post;
use App\Services\RabbitMQ\RabbitMQService;

class PostObserver
{

    /**
     * @var RabbitMQService
     */
    protected RabbitMQService $rabbitMQService;

    /**
     * @param RabbitMQService $rabbitMQService
     */
    public function __construct(RabbitMQService $rabbitMQService)
    {
        $this->rabbitMQService = $rabbitMQService;
    }

    /**
     * Handle the Post "created" event.
     * @param Post $post
     * @return void
     */
    public function created(Post $post): void
    {
        $this->rabbitMQService->publish($post->id,'created');
    }

    /**
     * Handle the Post "updated" event.
     * @param Post $post
     * @return void
     */
    public function updated(Post $post): void
    {
        $this->rabbitMQService->publish($post->id,'updated');
    }

    /**
     * Handle the Post "deleted" event.
     * @param Post $post
     * @return void
     */
    public function deleted(Post $post): void
    {
        $this->rabbitMQService->publish($post->id,'deleted');
    }

}
