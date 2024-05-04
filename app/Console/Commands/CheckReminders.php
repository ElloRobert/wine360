<?php

namespace App\Console\Commands;

use App\Mail\RemindersMail;
use App\Reminder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;


class CheckReminders extends Command
{
    protected $signature = 'check:reminders';
    protected $description = 'Check reminders and send email if necessary';

    public function handle()
    {
        // Dohvati sve instance Reminder modela
        $reminders = Reminder::where('status', false)
            ->where('end_date_reminder', '<=', now())
            ->get();
        $batchSize = 5; // Number of emails to send in each batch
        $delayBetweenBatches = 300; // Delay between batches in seconds (5 minutes)
        $chunks = $reminders->chunk($batchSize);
        foreach ($chunks as $index => $chunk) {
            foreach ($chunk as $reminder) {
                // Pošalji mail
                Mail::to($reminder->creator->email)->send(new RemindersMail($reminder));
                if ($reminder->recurring_reminder_id == 0) {
                    // recurring_reminder_id = 0, postavi status na "poslano" samo za remindere na zahtjev
                    $reminder->update(['status' => true]);
                } elseif ($reminder->recurring_reminder_id == 1) {
                    // recurring_reminder_id = 1, produlji end_date_reminder za 7 dana
                    $reminder->update([
                        'end_date_reminder' => now()->addDays(7),
                    ]);
                } elseif ($reminder->recurring_reminder_id == 2) {
                    // recurring_reminder_id = 2, produlji end_date_reminder za mjesec dana
                    $reminder->update([
                        'end_date_reminder' => now()->addMonth(),
                    ]);
                } elseif ($reminder->recurring_reminder_id == 3) {
                    // recurring_reminder_id = 3, produlji end_date_reminder za godinu dana
                    $reminder->update([
                        'end_date_reminder' => now()->addYear(),
                    ]);
                }
            }

            // Odmori se između batcheva ako je trenutni batch veći od 5
            if (count($chunk) >= $batchSize && $index < count($chunks) - 1) {
                sleep($delayBetweenBatches);
            }
        }
    }
}
