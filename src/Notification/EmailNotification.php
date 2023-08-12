<?php

namespace App\Notification;

use App\Type\NotificationType;

class EmailNotification implements NotificationInterface
{
    public function send(NotificationType $notification): bool
    {
        // email send service
        // example $this->emailService->send($notification->getTo(), $notification->getMessage());

        return true;
    }
}
