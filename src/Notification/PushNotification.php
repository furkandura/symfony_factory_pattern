<?php

namespace App\Notification;

use App\Type\NotificationType;

class PushNotification implements NotificationInterface
{
    public function send(NotificationType $notification): bool
    {
        // push notification send service
        // example $this->pushNotificationService->send($notification->getTo(), $notification->getMessage());

        return true;
    }
}
