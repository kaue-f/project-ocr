<?php

namespace App\Enums;

enum Language: string
{
    case PT = 'Português';
    case EN = 'Inglês';
    case IT = 'Italiano';

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function array(): array
    {
        return array_combine(
            array_column(self::cases(), 'name'),
            array_column(self::cases(), 'value')
        );
    }

    public static function getValue($language)
    {
        return match ($language) {
            Language::EN->name => 0.20,
            Language::IT->name => 0.25,
        };
    }

    public static function getPrices()
    {
        $languages = [Language::EN->name, Language::IT->name];

        return array_combine(
            [Language::EN->value, Language::IT->value],
            array_map([self::class, 'getValue'], $languages)
        );
    }
}
