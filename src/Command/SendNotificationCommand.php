<?php

namespace App\Command;

use App\Factory\NotificationFactory;
use App\Type\NotificationType;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SendNotificationCommand extends Command
{
    private NotificationFactory $notificationFactory;

    public function __construct(NotificationFactory $notificationFactory)
    {
        $this->notificationFactory = $notificationFactory;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('send:notification')
            ->setDescription('Send notification by type')
            ->addOption('type', null, InputOption::VALUE_REQUIRED, 'Notification type')
            ->addOption('to', null, InputOption::VALUE_REQUIRED, 'To')
            ->addOption('message', null, InputOption::VALUE_REQUIRED, 'Message');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $type = $input->getOption('type');
        $to = $input->getOption('to');
        $message = $input->getOption('message');

        // Create notification from factory.
        $notification = $this->notificationFactory->create($type);

        // Prepare notification type.
        $notificationType = (new NotificationType())
            ->setTo($to)
            ->setMessage($message);

        $io->info("To: {$notificationType->getTo()}, Message: {$notificationType->getMessage()}");

        // Notification sending.
        $status = $notification->send($notificationType);

        if ($status) {
            $io->success(get_class($notification) . ' type sent.');
        } else {
            $io->error(get_class($notification) . ' type not sent.');
        }

        return Command::SUCCESS;
    }
}
