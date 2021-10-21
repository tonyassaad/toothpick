<?php

namespace App\Jobs;

use App\Events\WebAccountCreatedEvent;
use App\Models\Parents;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Ramsey\Uuid\Uuid;
use URL;

class CreateWebUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    protected $parentParams;

    /**
     * Create a new job instance.
     *
     * @param  $request
     */
    public function __construct($parentParams)
    {
        $this->parentParams = $parentParams;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $request = request();

        DB::transaction(function () use ($request) {
            $uuid = (string) Uuid::uuid4();
            $this->user = Parents::firstOrCreate(['email' => $this->parentParams['email']], [
                    'uuid' =>$uuid,
                    'first_name' => $this->parentParams['first_name'],
                    'last_name' => $this->parentParams['last_name'],
                    'email' => $this->parentParams['email'],
                    'password' => FacadesHash::make($this->parentParams['password']),
                   // 'profile_picture' =>  $profilePic,
                ]);
            if ($this->user && $this->user->wasRecentlyCreated == 1) {
                $verifyAccountSignedRoute = URL::signedRoute('verify-account', ['uuid' => $this->user->uuid]);
                $parseResetRouteUrl = parse_url($verifyAccountSignedRoute);
                $confirmUrlRouteSignature = $parseResetRouteUrl['query'];
                $confirmUrl = FacadesConfig::get('general.website_uri').'/confirm-user/'.$this->user->uuid.'/'.$confirmUrlRouteSignature;
             //   PushParentToBusinessCenter::dispatchNow($this->user);
                event(new WebAccountCreatedEvent($this->user, ['confirm_account_link' => $confirmUrl]));
            }
        });

        return $this->user;
    }
}
