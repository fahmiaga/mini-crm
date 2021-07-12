<?php

namespace App\Jobs;

use App\Mail\NewCompanyMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Company;
use Illuminate\Http\Request;

class NewCompanyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     * @param  \Illuminate\Http\Request  $request
     */
    public function handle(Request $request)
    {
        // $file = $request->file('logo');
        // $time = time();
        // $fileName = $time . '.' . $file->extension();
        // $file->move(public_path('logo'), $fileName);
        // $data =  Company::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'logo' => $fileName,
        //     'website' => $request->website,
        // ]);

        // Mail::send(
        //     'email.companyAdded',
        //     $data->toArray(),
        //     function ($message) {
        //         $message->to('fahmi.aga@gmail.com', 'Code Online')->subject('New Company Added');
        //     }
        // );
        Mail::to('fahmi.aga@gmail.com')->send(new NewCompanyMail());
    }
}
