<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Model\EmailTemplate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\HtmlString;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;


class SignupActivate extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $emailtemp = EmailTemplate::where('id',1)->get()->toArray();
        //print_r($emailtemp[0]['subject']);die;

        $url = url('/api/auth/signup/activate/'.$notifiable->activation_token);

        return (new MailMessage)
            ->subject($emailtemp[0]['subject'])
            ->line(new HtmlString($emailtemp[0]['content']))
            //->action('Confirm Account', url($url))
            ->line('Thank you for using our application!');

        // $content = $emailtemp[0]['content'];
        // return (new MailMessage)
        //     ->from('bacancymobiletest@gmail.com', 'Admin')
        //     ->subject('Welcome to the the Portal')
        //     ->markdown('mail.welcome.index', ['user' => $content]);
       

        // $url = url('/api/auth/signup/activate/'.$notifiable->activation_token);
        // return (new MailMessage)
        //     ->subject('Confirm your account')
        //     ->line('Thanks for signup! Please before you begin, you must confirm your account.')
        //     ->action('Confirm Account', url($url))
        //     ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
