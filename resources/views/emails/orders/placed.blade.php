@component('mail::message')
# Order Received

Order inclusive of VAT 18%

**Order ID:** {{ $order->id }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

**Order Total:** UGX {{ round($order->billing_total) }}

**Items Ordered**

@foreach ($order->products as $product)
Name: {{ $product->name }} <br>
Price: UGX {{ round($product->price) }} <br>
Quantity: {{ $product->pivot->quantity }} <br>
@endforeach

You can get further details about your order by logging into our website.

@component('mail::button', ['url' => route('voyager.orders.index'), 'color' => 'green'])
View Order
@endcomponent

Regards,<br>
{{ config('app.name') }}
@endcomponent
