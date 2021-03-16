<?php
namespace App\Jobs;

use App\Notifications\SlackNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class SlackNotificationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;

    public function handle()
    {
        $webhook = config('services.slack.webhooks.slack_avaliacao');

        if ($webhook) {
            Notification::route('slack', $webhook)->notify(new SlackNotification());
        }
    }
}
