<?php

namespace App\Enums;

enum KycType: string {
    case GOVERNMENT_ISSUED_ID = 'Government Issued ID';
    case DRIVERS_LICENSE = 'Drivers License';
    case PASSPORT = 'Passport';
    case SOCIAL_SECURITY_CARD = 'Social Security Card';
}
