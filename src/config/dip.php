<?php

return [
    "unit_types" => [
        [
            "name" => "Army",
        ],
        [
            "name" => "Fleet",
        ],
    ],
    "phases" => [
        "Movement", "Retreat", "Adjustment"
    ],
    "order_types" => [
        "Moves", "SupportMoves", "SupportHolds", "Holds", "Convoy", "Builds", "Disbands"
    ],
    "phase_orders" => [
        "Movement" => [
            "Moves", "SupportMoves", "SupportHolds", "Holds", "Convoy"
        ],
        "Retreat" => [
            "Moves", "Disbands"
        ],
        "Adjustment" => [
            "Builds", "Disbands"
        ],
    ],
];
