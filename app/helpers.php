<?php

function presentPrice($price)
{
    return 'UGX '.number_format($price);
}

function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.jpg');
}

function projectImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.jpg');
}

function categoryImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.jpg');
}

function slides($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.jpg');
}

function logo($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('images/not-found.jpg');
}

function getNumbers()
{
   $tax = config('cart.tax') / 100;
   $discount = session()->get('coupon')['discount'] ?? 0;
   $code = session()->get('coupon')['name'] ?? null;
   $newSubtotal = (Cart::subtotal() - $discount);
   if ($newSubtotal < 0) {
      $newSubtotal = 0;
   }
   $newTax = $newSubtotal * $tax;
   $newTotal = $newSubtotal * (1 + $tax);

   return collect([
      'tax' => $tax,
      'discount' => $discount,
      'code' => $code,
      'newSubtotal' => $newSubtotal,
      'newTax' => $newTax,
      'newTotal' => $newTotal,
   ]);
}
