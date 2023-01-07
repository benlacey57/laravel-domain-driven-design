<?php

final class BookingEnum {

    public const BOOKING_STATUS = [
        'pending' => 1,
        'confirmed' => 2,
        'cancelled' => 3,
        'completed' => 4,
        'no-show' => 5,
        'incomplete' => 6,
        'invoiced' => 7,
        'paid' => 8,
        'refunded' => 9,
        'partially-refunded' => 10,
        'partially-paid' => 11,
        'partially-invoiced' => 12,
        'partially-completed' => 13,
        'partially-cancelled' => 14,
        'partially-no-show' => 15,
        'partially-incomplete' => 16,
        'partially-pending' => 17,
        'partially-confirmed' => 18,
    ];

}
