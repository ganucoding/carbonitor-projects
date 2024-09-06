<?php

namespace App\Enums;

enum ProjectType: string
{
    case ENERGY_EFFICIENCY_DOMESTIC                     = 'energy-efficiency-domestic';
    case ENERGY_EFFICIENCY_COMMERCIAL_SECTOR            = 'energy-efficiency-commercial-sector';
    case BIOGAS_ELECTRICITY                             = 'biogas-electricity';
    case BIOMASS_OR_LIQUID_BIOFUEL                      = 'biomass-or-liquid-biofuel';
    case GEO_THERMAL                                    = 'geo-thermal';
    case SOLAR_THERMAL                                  = 'solar-thermal';
    case WIND                                           = 'wind';
    case BIOGAS                                         = 'biogas';
    case ENERGY_EFFICIENCY                              = 'energy-efficiency';
    case SMALL_LOW_IMPACT_HYDRO                         = 'small-low-impact-hydro';
    case WASTE_HANDLING_AND_DISPOSAL                    = 'waste-handling-and-disposal';
    case AGRICULTURE_FORESTRY_AND_OTHER_LAND_USE        = 'agriculture-forestry-and-other-land-use';
    case ENERGY_INDUSTRIES                              = 'energy-industries';
    case ENERGY_DEMAND                                  = 'energy-demand';
    case FUGITIVE_EMISSIONS_FROM_FUELS                  = 'fugitive-emissions-from-fuels';
    case METAL_PRODUCTION                               = 'metal-production';
    case OTHER                                          = 'other';

    public function label(): string
    {
        return match ($this) {
            self::ENERGY_EFFICIENCY_DOMESTIC                    => 'Energy Efficiency Domestic',
            self::ENERGY_EFFICIENCY_COMMERCIAL_SECTOR           => 'Energy Efficiency Commercial Sector',
            self::BIOGAS_ELECTRICITY                            => 'Biogas Electricity',
            self::BIOMASS_OR_LIQUID_BIOFUEL                     => 'Biomass, or Liquid Biofuel',
            self::GEO_THERMAL                                   => 'Geo Thermal',
            self::SOLAR_THERMAL                                 => 'Solar Thermal',
            self::WIND                                          => 'Wind',
            self::BIOGAS                                        => 'Biogas',
            self::ENERGY_EFFICIENCY                             => 'Energy Efficiency',
            self::SMALL_LOW_IMPACT_HYDRO                        => 'Small, Low - Impact Hydro',
            self::WASTE_HANDLING_AND_DISPOSAL                   => 'Waste handling and disposal',
            self::AGRICULTURE_FORESTRY_AND_OTHER_LAND_USE       => 'Agriculture Forestry and Other Land Use',
            self::ENERGY_INDUSTRIES                             => 'Energy industries',
            self::ENERGY_DEMAND                                 => 'Energy demand',
            self::FUGITIVE_EMISSIONS_FROM_FUELS                 => 'Fugitive emissions from fuels',
            self::METAL_PRODUCTION                              => 'Metal production',
            self::OTHER                                         => 'Other',
        };
    }
}
