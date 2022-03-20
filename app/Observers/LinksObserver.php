<?php

namespace App\Observers;

use App\Models\Links;

class LinksObserver
{
    /**
     * До создания записи "created" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function creating(Links $links)
    {
        
    }
    
    /**
     * Handle the Links "created" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function created(Links $links)
    {
        //
    }
    
    /**
     * До обновления the Links "updated" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function updating(Links $links)
    {
        //
    }
    
    /**
     * Handle the Links "updated" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function updated(Links $links)
    {
        //
    }

    /**
     * Handle the Links "deleted" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function deleted(Links $links)
    {
        //
    }

    /**
     * Handle the Links "restored" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function restored(Links $links)
    {
        //
    }

    /**
     * Handle the Links "force deleted" event.
     *
     * @param  \App\Models\Links  $links
     * @return void
     */
    public function forceDeleted(Links $links)
    {
        //
    }
}
