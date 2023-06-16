<?php

namespace App\Observers;

use App\Models\countries;
use App\Models\VisaRequest;
use App\Models\Visa;

class CountriesObserver
{
    /**
     * Handle the countries "created" event.
     *
     * @param  \App\Models\countries  $countries
     * @return void
     */
    public function created(countries $countries)
    {
        //
    }

    /**
     * Handle the countries "updated" event.
     *
     * @param  \App\Models\countries  $countries
     * @return void
     */
    public function updated(countries $countries)
    {
        //
    }

    /**
     * Handle the countries "deleting" event.
     *
     * @param  \App\Models\countries  $countries
     * @return void
     */
    public function deleting(countries $countries)
    {
        VisaRequest::where('countries_id', $countries->id)->delete();
        Visa::where('countries_id', $countries->id)->delete();
    }

    /**
     * Handle the countries "deleted" event.
     *
     * @param  \App\Models\countries  $countries
     * @return void
     */
    public function deleted(countries $countries)
    {
        //
    }

    /**
     * Handle the countries "restored" event.
     *
     * @param  \App\Models\countries  $countries
     * @return void
     */
    public function restored(countries $countries)
    {
        //
    }

    /**
     * Handle the countries "force deleted" event.
     *
     * @param  \App\Models\countries  $countries
     * @return void
     */
    public function forceDeleted(countries $countries)
    {
        //
    }
}
