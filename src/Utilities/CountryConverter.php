<?php

namespace Datomatic\FattureInCloud\Utilities;

/**
 * Class FattureInCloudHelper.
 */
class CountryConverter
{
    private const ISOAlpha2Converter = [
        'AD' => 'Andorra',
        'AE' => 'Emirati Arabi Uniti',
        'AF' => 'Afghanistan',
        'AG' => 'Antigua e Barbuda',
        'AI' => 'Anguilla',
        'AL' => 'Albania',
        'AM' => 'Armenia',
        'AO' => 'Angola',
        'AQ' => 'Antartide',
        'AR' => 'Argentina',
        'AS' => 'Samoa Americane',
        'AT' => 'Austria',
        'AU' => 'Australia',
        'AW' => 'Aruba',
        'AX' => 'Isole Åland',
        'AZ' => 'Azerbaigian',
        'BA' => 'Bosnia ed Erzegovina',
        'BB' => 'Barbados',
        'BD' => 'Bangladesh',
        'BE' => 'Belgio',
        'BF' => 'Burkina Faso',
        'BG' => 'Bulgaria',
        'BH' => 'Bahrain',
        'BI' => 'Burundi',
        'BJ' => 'Benin',
        'BL' => 'Saint Barthelemy',
        'BM' => 'Bermuda',
        'BN' => 'Brunei',
        'BO' => 'Bolivia',
        'BQ' => 'Paesi Bassi',
        'BR' => 'Brasile',
        'BS' => 'Bahamas',
        'BT' => 'Bhutan',
        'BV' => 'Isola Bouvet',
        'BW' => 'Botswana',
        'BY' => 'Bielorussia',
        'BZ' => 'Belize',
        'CA' => 'Canada',
        'CC' => 'Isole Cocos e Keeling',
        'CD' => 'Repubblica Democratica del Congo',
        'CF' => 'Repubblica Centrafricana',
        'CG' => 'Repubblica del Congo',
        'CH' => 'Svizzera',
        'CI' => "Costa d'Avorio",
        'CK' => 'Isole Cook',
        'CL' => 'Cile',
        'CM' => 'Camerun',
        'CN' => 'Cina',
        'CO' => 'Colombia',
        'CR' => 'Costa Rica',
        'CU' => 'Cuba',
        'CV' => 'Capo Verde',
        'CW' => 'Paesi Bassi',
        'CX' => 'Isola Christmas',
        'CY' => 'Cipro',
        'CZ' => 'Repubblica Ceca',
        'DE' => 'Germania',
        'DJ' => 'Gibuti',
        'DK' => 'Danimarca',
        'DM' => 'Dominica',
        'DO' => 'Repubblica Dominicana',
        'DZ' => 'Algeria',
        'EC' => 'Ecuador',
        'EE' => 'Estonia',
        'EG' => 'Egitto',
        'EH' => 'Sahara Occidentale',
        'ER' => 'Eritrea',
        'ES' => 'Spagna',
        'ET' => 'Etiopia',
        'FI' => 'Finlandia',
        'FJ' => 'Fiji',
        'FK' => 'Isole Falkland',
        'FM' => 'Micronesia',
        'FO' => 'Isole Fær Øer',
        'FR' => 'Francia',
        'GA' => 'Gabon',
        'GB' => 'Regno Unito',
        'GD' => 'Grenada',
        'GE' => 'Georgia',
        'GF' => 'Guyana Francese',
        'GG' => 'Guernsey - Channel Islands',
        'GH' => 'Ghana',
        'GI' => 'Gibilterra',
        'GL' => 'Groenlandia',
        'GM' => 'Gambia',
        'GN' => 'Guinea',
        'GP' => 'Guadalupa',
        'GQ' => 'Guinea Equatoriale',
        'GR' => 'Grecia',
        'GS' => 'Georgia del Sud e isole Sandwich',
        'GT' => 'Guatemala',
        'GU' => 'Guam',
        'GW' => 'Guinea-Bissau',
        'GY' => 'Guyana',
        'HK' => 'Hong Kong',
        'HM' => 'Heard Island e McDonald Islands',
        'HN' => 'Honduras',
        'HR' => 'Croazia',
        'HT' => 'Haiti',
        'HU' => 'Ungheria',
        'IC' => 'Isole Canarie (Spagna)',
        'ID' => 'Indonesia',
        'IE' => 'Irlanda',
        'IL' => 'Israele',
        'IM' => 'Isola di Man',
        'IN' => 'India',
        'IO' => "Terr. Britannico dell'Oc. Ind.",
        'IQ' => 'Iraq',
        'IR' => 'Iran',
        'IS' => 'Islanda',
        'IT' => 'Italia',
        'JE' => 'Jersey - Channel Islands',
        'JM' => 'Giamaica',
        'JO' => 'Giordania',
        'JP' => 'Giappone',
        'KE' => 'Kenia',
        'KG' => 'Kirghizistan',
        'KH' => 'Cambogia',
        'KI' => 'Kiribati',
        'KM' => 'Comore',
        'KN' => 'Saint Kitts e Nevis',
        'KP' => 'Corea del Nord',
        'KR' => 'Corea del Sud',
        'KW' => 'Kuwait',
        'KY' => 'Isole Cayman',
        'KZ' => 'Kazakistan',
        'LA' => 'Laos',
        'LB' => 'Libano',
        'LC' => 'Santa Lucia',
        'LI' => 'Liechtenstein',
        'LK' => 'Sri Lanka',
        'LR' => 'Liberia',
        'LS' => 'Lesotho',
        'LT' => 'Lituania',
        'LU' => 'Lussemburgo',
        'LV' => 'Lettonia',
        'LY' => 'Libia',
        'MA' => 'Marocco',
        'MC' => 'Monaco',
        'MD' => 'Moldavia',
        'ME' => 'Montenegro',
        'MF' => 'Francia',
        'MG' => 'Madagascar',
        'MH' => 'Isole Marshall',
        'MK' => 'Macedonia del Nord',
        'ML' => 'Mali',
        'MM' => 'Myanmar',
        'MN' => 'Mongolia',
        'MO' => 'Macao',
        'MP' => 'Isole Marianne Settentrionali',
        'MQ' => 'Martinica',
        'MR' => 'Mauritania',
        'MS' => 'Montserrat',
        'MT' => 'Malta',
        'MU' => 'Mauritius',
        'MV' => 'Maldive',
        'MW' => 'Malawi',
        'MX' => 'Messico',
        'MY' => 'Malaysia',
        'MZ' => 'Mozambico',
        'NA' => 'Namibia',
        'NC' => 'Nuova Caledonia',
        'NE' => 'Niger',
        'NF' => 'Isola Norfolk',
        'NG' => 'Nigeria',
        'NI' => 'Nicaragua',
        'NL' => 'Paesi Bassi',
        'NO' => 'Norvegia',
        'NP' => 'Nepal',
        'NR' => 'Nauru',
        'NU' => 'Niue',
        'NZ' => 'Nuova Zelanda',
        'OM' => 'Oman',
        'PA' => 'Panama',
        'PE' => 'Perù',
        'PF' => 'Polinesia Francese',
        'PG' => 'Papua Nuova Guinea',
        'PH' => 'Filippine',
        'PK' => 'Pakistan',
        'PL' => 'Polonia',
        'PM' => 'Saint Pierre e Miquelon',
        'PN' => 'Isole Pitcairn',
        'PR' => 'Porto Rico',
        'PS' => 'Stato di Palestina',
        'PT' => 'Portogallo',
        'PW' => 'Palau',
        'PY' => 'Paraguay',
        'QA' => 'Qatar',
        'RE' => 'Riunione',
        'RO' => 'Romania',
        'RS' => 'Serbia',
        'RU' => 'Russia',
        'RW' => 'Ruanda',
        'SA' => 'Arabia Saudita',
        'SB' => 'Isole Salomone',
        'SC' => 'Seychelles',
        'SD' => 'Sudan',
        'SE' => 'Svezia',
        'SG' => 'Singapore',
        'SH' => "Sant'Elena",
        'SI' => 'Slovenia',
        'SJ' => 'Svalbard e Jan Mayen',
        'SK' => 'Slovacchia',
        'SL' => 'Sierra Leone',
        'SM' => 'San Marino',
        'SN' => 'Senegal',
        'SO' => 'Somalia',
        'SR' => 'Suriname',
        'SS' => 'Sud Sudan',
        'ST' => 'São Tomé e Príncipe',
        'SV' => 'El Salvador',
        'SX' => 'Paesi Bassi',
        'SY' => 'Siria',
        'SZ' => 'Swaziland',
        'TC' => 'Turks e Caicos',
        'TD' => 'Ciad',
        'TF' => 'Terre australi e ant. francesi',
        'TG' => 'Togo',
        'TH' => 'Thailandia',
        'TJ' => 'Tagikistan',
        'TK' => 'Tokelau',
        'TL' => 'Timor Est',
        'TM' => 'Turkmenistan',
        'TN' => 'Tunisia',
        'TO' => 'Tonga',
        'TR' => 'Turchia',
        'TT' => 'Trinidad e Tobago',
        'TV' => 'Tuvalu',
        'TW' => 'Taiwan',
        'TZ' => 'Tanzania',
        'UA' => 'Ucraina',
        'UG' => 'Uganda',
        'UM' => 'Isole Minori Esterne degli USA',
        'US' => 'Stati Uniti',
        'UY' => 'Uruguay',
        'UZ' => 'Uzbekistan',
        'VA' => 'Città del Vaticano',
        'VC' => 'Saint Vincent e Grenadine',
        'VE' => 'Venezuela',
        'VG' => 'Isole Vergini Britanniche',
        'VI' => 'Isole Vergini Americane',
        'VN' => 'Vietnam',
        'VU' => 'Vanuatu',
        'WF' => 'Wallis e Futuna',
        'WS' => 'Samoa',
        'XI' => 'Regno Unito',
        'XK' => 'Kosovo',
        'YE' => 'Yemen',
        'YT' => 'Mayotte',
        'ZA' => 'Sudafrica',
        'ZM' => 'Zambia',
        'ZW' => 'Zimbabwe',
    ];

    /**
     * @param  string  $isoCode
     * @return string
     */
    public static function fromAlpha2(string $isoCode): string
    {
        return self::ISOAlpha2Converter[strtoupper($isoCode)] ?? '';
    }

    /**
     * @param  string  $name
     * @return string
     */
    public static function fromName(string $name): string
    {
        return array_flip(self::ISOAlpha2Converter)[$name] ?? '';
    }
}
