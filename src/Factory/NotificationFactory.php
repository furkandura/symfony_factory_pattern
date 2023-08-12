<?php

namespace App\Factory;

use App\Notification\EmailNotification;
use App\Notification\NotificationInterface;
use App\Notification\PushNotification;
use App\Notification\SMSNotification;
use InvalidArgumentException;

class NotificationFactory
{
    protected array $types = [
        'email' => EmailNotification::class,
        'sms' => SMSNotification::class,
        'push' => PushNotification::class,
    ];

    public function create(string $type): NotificationInterface
    {
        if (!isset($this->types[$type])) {
            throw new InvalidArgumentException("INVALID_NOTIFICATION_TYPE");
        }

        $notificationClass = $this->types[$type];
        return new $notificationClass();
    }
}
