<?php

namespace App\View\Components;

use App\Models\Ad;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AdCard extends Component
{
    public Ad $ad;


    /**
     * Create a new component instance.
     */
    public function __construct(Ad $ad)
    {
        $this->ad = $ad;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ad-card');
    }

    /**
     * Returns the price of the ad formatted to 2 decimal places.
     */
    public function formattedPrice(): string {
        return number_format($this->ad->price, 2) . ' RSD';
    }
}
