<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class ContactController extends Controller
{
    public function index(){


       
        $lang = [
            'az' => '/elaqe/',
            'en' => '/en/contact/',
            'ru' => '/ru/kontakt/',
        ];
        
        $meta['title'] = 'Əlaqə';

        return view('site.contact',compact('lang','meta'));
    }
    
    
    public function form(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ], [
            'name.required' => 'Ad xanası doldurulmalıdır.',
            'email.required' => 'Email xanası doldurulmalıdır.',
            'email.email' => 'Email formatı düzgün deyil.',
            'subject.required' => 'Mövzu xanası boş buraxıla bilməz.',
            'message.required' => 'Mesaj xanası doldurulmalıdır.',
        ]);
        
        $details = [
            'title' => 'Yeni əlaqə formu mesajı',
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'text' => $request->message,
        ];

        Mail::send('emails.contact', $details, function ($message) use ($request) {
            $message->to('info@yoxla.az') // Mesajın gedəcəyi mail
                    ->subject('Əlaqə formu mesajı');
        });

        return back()->with('success', 'Mesajınız uğurla göndərildi!');
    }

    
}
