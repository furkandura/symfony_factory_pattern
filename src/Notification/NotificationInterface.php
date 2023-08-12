<?php

namespace App\Notification;

use App\Type\NotificationType;

interface NotificationInterface
{
    public function send(NotificationType $notification): bool;
}
