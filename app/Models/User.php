<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\CourseStudent;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'occupation',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_students','user_id','course_id');
    }



    public function subscribe_transactions(): HasMany
    {
        return $this->hasMany(SubscribeTransaction::class);
    }


    // cek subscription
    public function hasActiveSubscription()
    {

        $latestSubscription = $this->subscribe_transactions()
            ->where('is_paid', true)->latest('updated_at')->first();

        if (!$latestSubscription) {
            return false;
        }

        $subcriptionEndDate=Carbon::parse($latestSubscription->subscription_start_date)->addMonth(1);  // waktu berlangganan 1 bulam setelah mulai daftar di acc
        return Carbon::now()->lessThanOrEqualTo($subcriptionEndDate);  //true == dia berlangganan
    }
}
