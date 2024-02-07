<?php

namespace App\Observers;

use App\Models\Qoutation;

class QuotationObserver
{
    /**
     * Handle the Qoutation "created" event.
     *
     * @param  \App\Models\Qoutation  $qoutation
     * @return void
     */
    public function creating(Qoutation $qoutation)
    {
        // Check if there is a row with the same pr_no
        $existingModel = Qoutation::where('pr_no', $qoutation->pr_no)->first();

        if ($existingModel) {
            // If a row with the same pr_no exists, assign the same comp_no
            $qoutation->comp_no = $existingModel->comp_no;
        } else {
            // If no row with the same pr_no exists, generate a new comp_no
            $qoutation->comp_no = $this->generateUniqueCompNo();
        }
    }

    private function generateUniqueCompNo()
    {
        // You can implement your own logic to generate a unique comp_no
        // For example, you can use auto-incrementing primary key value
        // Or you can use UUIDs
        return DB::table('qoutations')->max('comp_no') + 1;
    }
    public function created(Qoutation $qoutation)
    {
        //
    }

    /**
     * Handle the Qoutation "updated" event.
     *
     * @param  \App\Models\Qoutation  $qoutation
     * @return void
     */
    public function updated(Qoutation $qoutation)
    {
        //
    }

    /**
     * Handle the Qoutation "deleted" event.
     *
     * @param  \App\Models\Qoutation  $qoutation
     * @return void
     */
    public function deleted(Qoutation $qoutation)
    {
        //
    }

    /**
     * Handle the Qoutation "restored" event.
     *
     * @param  \App\Models\Qoutation  $qoutation
     * @return void
     */
    public function restored(Qoutation $qoutation)
    {
        //
    }

    /**
     * Handle the Qoutation "force deleted" event.
     *
     * @param  \App\Models\Qoutation  $qoutation
     * @return void
     */
    public function forceDeleted(Qoutation $qoutation)
    {
        //
    }
}
