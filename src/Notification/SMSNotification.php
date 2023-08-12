<?php

namespace App\Notification;

use App\Type\NotificationType;

class SMSNotification implements NotificationInterface
{
    public function send(NotificationType $notification): bool
    {
        // sms send service
        // example $this->smsService->send($notification->getTo(), $notification->getMessage());

        return true;
    }
}
