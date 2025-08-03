<?php

use Illuminate\Http\RedirectResponse;

if (!function_exists('redirectIfCheckoutEmpty')) {
function redirectIfCheckoutEmpty($checkoutdata): RedirectResponse|null {
if (empty($checkoutdata)) {
return redirect()->route('dashboard'); // or your route name
}
return null;
}
}
