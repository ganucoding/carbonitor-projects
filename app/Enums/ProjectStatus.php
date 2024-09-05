<?php

namespace App\Enums;

enum ProjectStatus: string
{
    case PLANNED                                        = 'planned';
    case LISTED                                         = 'listed';
    case ONGOING                                        = 'ongoing';
    case CERTIFIED                                      = 'certified';
    case ESTIMATED                                      = 'estimated';
    case UNDER_VALIDATION                               = 'under-validation';
    case UNDER_DEVELOPMENT                              = 'under-development';
    case VERIFICATION_APPROVAL_REQUESTED                = 'verification-approval-requested';
    case REGISTERED                                     = 'registered';
    case LATE_TO_VERIFY                                 = 'late-to-verify';
    case INACTIVE                                       = 'inactive';
    case REJECTED_BY_ADMINISTRATOR                      = 'rejected-by-administrator';
    case REGISTRATION_REQUESTED                         = 'registration-requested';
    case WITHDRAWN                                      = 'withdrawn';
    case UNITS_TRANSFERRED_FROM_APPROVED_GHG_PROGRAM    = 'units-transferred-from-approved-ghg-program';
    case COMPLETED                                      = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PLANNED                                      => 'Planned',
            self::LISTED                                       => 'Listed',
            self::ONGOING                                      => 'Ongoing',
            self::CERTIFIED                                    => 'Certified',
            self::ESTIMATED                                    => 'Estimated',
            self::UNDER_VALIDATION                             => 'Under validation',
            self::UNDER_DEVELOPMENT                            => 'Under development',
            self::VERIFICATION_APPROVAL_REQUESTED              => 'Verification approval requested',
            self::REGISTERED                                   => 'Registered',
            self::LATE_TO_VERIFY                               => 'Late to verify',
            self::INACTIVE                                     => 'Inactive',
            self::REJECTED_BY_ADMINISTRATOR                    => 'Rejected by Administrator',
            self::REGISTRATION_REQUESTED                       => 'Registration requested',
            self::WITHDRAWN                                    => 'Withdrawn',
            self::UNITS_TRANSFERRED_FROM_APPROVED_GHG_PROGRAM  => 'Units Transferred from Approved GHG Program',
            self::COMPLETED                                    => 'Completed',
        };
    }
}
