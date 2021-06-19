<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

use App\Models\Shop;

class ProfileComposer
{
    public function compose(View $view)
    {
        $shop = Shop::first();

        $view->with('toko_name', $shop->name ?? 'Toko')
            ->with('toko_description', $shop->description ?? 'Toko')
            ->with('toko_whatsapp', $shop->whatsapp ?? 'Toko')
            ->with('toko_facebook', $shop->facebook ?? 'Toko')
            ->with('toko_instagram', $shop->instagram ?? 'Toko');
    }
}
