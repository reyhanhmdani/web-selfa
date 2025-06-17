<?php

use App\Models\SectionHeader;

if (!function_exists('sectionHeader')) {
    function sectionHeader(string $key): ?SectionHeader
    {
        return SectionHeader::where('section_key', $key)->first();
    }
}
