<?php

namespace App\Rules;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class dateExpire implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute, $value)
    {
          $pickupDate = Carbon::parse($value);
          $lastDate = Carbon::now()->addYear();
          return $value >= now() && $value <= $lastDate;
    }
  public function message(){

    return 'Please enter a date within 1 year from today';
  }

}
