<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clearTokens()
    {
        $this->clearRefreshTokens($this->tokens->pluck('id'));

        foreach ($this->tokens as $token) {
            $token->delete();
        }
    }

    private function clearRefreshTokens($tokens)
    {
        DB::table('oauth_refresh_tokens')->whereIn('access_token_id', $tokens)->delete();
    }

    public function clearTokensExceptForLatest()
    {
        // this allows developers to have multiple tokens which is helpful for testing
        if (config('app.env') == 'local') {
            return;
        }

        $tokens = $this->tokens;
        $tokens->shift();

        $this->clearRefreshTokens($tokens->pluck('id'));
        foreach ($tokens as $token) {
            $token->delete();
        }
    }
}
