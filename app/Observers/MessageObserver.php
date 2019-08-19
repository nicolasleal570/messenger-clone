<?php

namespace App\Observers;

use App\Message;
use App\Conversation;
use App\Events\MessageSent;

class MessageObserver
{
    /**
     * Handle the message "created" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function created(Message $message)
    {
        // Actualizando conversacion para el que envia
        $conversation = Conversation::where('user_id', $message->from_id)
            ->where('contact_id', $message->to_id)->first();

        
        if ($conversation) {
            $conversation->last_message = "Tu: {$message->content}";
            $conversation->last_time = $message->created_at;
            $conversation->save();
        }

        // Actualizando conversacion para el que recibe
        $conversation = Conversation::where('contact_id', $message->from_id)
            ->where('user_id', $message->to_id)->first();
        
        if ($conversation) {
            $conversation->last_message = "{$conversation->contact_name}: {$message->content}";
            $conversation->last_time = $message->created_at;
            $conversation->save();
        }

        event(new MessageSent($message));    
    
    }

    /**
     * Handle the message "updated" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function updated(Message $message)
    {
        //
    }

    /**
     * Handle the message "deleted" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function deleted(Message $message)
    {
        //
    }

    /**
     * Handle the message "restored" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function restored(Message $message)
    {
        //
    }

    /**
     * Handle the message "force deleted" event.
     *
     * @param  \App\Message  $message
     * @return void
     */
    public function forceDeleted(Message $message)
    {
        //
    }
}
