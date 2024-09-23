<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

namespace MediaWiki\Languages\Data;

/**
 * Language names in their own languages (known as "language autonyms").
 *
 * These determine things like interwikis, language selectors, and so on.
 * Safe to change without running scripts on the respective sites.
 *
 * See https://www.mediawiki.org/wiki/Manual:Adding_and_removing_languages
 * for detailed documentation about maintaining this file, especially:
 * - Finding the correct autonym.
 * - What other files may have to be updated when updating this one.
 * - Special handling for languages written in scripts of South
 *   and South-East Asia (Devanagari, Burmese, etc.).
 *
 * Do not use this class directly. Use LanguageNameUtils::getLanguageNames(), which
 * includes support for the CLDR extension.
 *
 * @ingroup Language
 */
class Names {
	/**
	 * @deprecated since 1.43
	 * @var string[]
	 */
	public static $names = self::NAMES;
	/**
	 * @internal Public for use by LanguageNameUtils, use LanguageNameUtils::getLanguageNames() instead.
	 * @phpcs-require-sorted-array
	 */
	public const NAMES = [
		'aa' => 'Qafár af', # Afar
		'aae' => 'Arbërisht', # Arbëresh
		'ab' => 'аԥсшәа', # Abkhaz
		'abs' => 'bahasa ambon', # Ambonese Malay, T193566
		'ace' => 'Acèh', # Aceh
		'acf' => 'Kwéyòl Sent Lisi', # Saint Lucian Creole
		'acm' => 'عراقي', # Iraqi (Mesopotamian) Arabic
		'ady' => 'адыгабзэ', # Adyghe
		'ady-cyrl' => 'адыгабзэ', # Adyghe
		'aeb' => 'تونسي / Tûnsî', # Tunisian Arabic (multiple scripts - defaults to Arabic)
		'aeb-arab' => 'تونسي', # Tunisian Arabic (Arabic Script)
		'aeb-latn' => 'Tûnsî', # Tunisian Arabic (Latin Script)
		'af' => 'Afrikaans', # Afrikaans
		'aln' => 'Gegë', # Gheg Albanian
		'als' => 'Alemannisch', # Alemannic -- not a valid code, for compatibility. See gsw.
		'alt' => 'алтай тил', # Altai, T254854
		'am' => 'አማርኛ', # Amharic
		'ami' => 'Pangcah', # Amis
		'an' => 'aragonés', # Aragonese
		'ang' => 'Ænglisc', # Old English, T25283
		'ann' => 'Obolo', # Obolo
		'anp' => 'अंगिका', # Angika
		'apc' => 'شامي', # Levantine Arabic
		'ar' => 'العربية', # Arabic
		'arc' => 'ܐܪܡܝܐ', # Aramaic
		'arn' => 'mapudungun', # Mapuche, Mapudungu, Araucanian (Araucano)
		'arq' => 'جازايرية', # Algerian Spoken Arabic
		'ary' => 'الدارجة', # Moroccan Spoken Arabic
		'arz' => 'مصرى', # Egyptian Spoken Arabic
		'as' => 'অসমীয়া', # Assamese
		'ase' => 'American sign language', # American sign language
		'ast' => 'asturianu', # Asturian
		'atj' => 'Atikamekw', # Atikamekw
		'av' => 'авар', # Avar
		'avk' => 'Kotava', # Kotava
		'awa' => 'अवधी', # Awadhi
		'ay' => 'Aymar aru', # Aymara
		'az' => 'azərbaycanca', # Azerbaijani
		'azb' => 'تۆرکجه', # South Azerbaijani
		'ba' => 'башҡортса', # Bashkir
		'ban' => 'Basa Bali', # Balinese (Latin script)
		'ban-bali' => 'ᬩᬲᬩᬮᬶ', # Balinese (Balinese script)
		'bar' => 'Boarisch', # Bavarian (Austro-Bavarian and South Tyrolean)
		'bat-smg' => 'žemaitėška', # Samogitian (deprecated code, 'sgs' in ISO 639-3 since 2010-06-30 )
		'bbc' => 'Batak Toba', # Batak Toba (falls back to bbc-latn)
		'bbc-latn' => 'Batak Toba', # Batak Toba
		'bcc' => 'جهلسری بلوچی', # Southern Balochi
		'bci' => 'wawle', # Baoulé
		'bcl' => 'Bikol Central', # Bikol: Central Bicolano language
		'bdr' => 'Bajau Sama', # West Coast Bajau
		'be' => 'беларуская', # Belarusian normative
		'be-tarask' => 'беларуская (тарашкевіца)', # Belarusian in Taraskievica orthography
		'be-x-old' => 'беларуская (тарашкевіца)', # (be-tarask compat)
		'bew' => 'Betawi', # Betawi
		'bg' => 'български', # Bulgarian
		'bgc' => 'हरियाणवी', # Haryanvi
		'bgn' => 'روچ کپتین بلوچی', # Western Balochi
		'bh' => 'भोजपुरी', # Bihari macro language. Falls back to Bhojpuri (bho)
		'bho' => 'भोजपुरी', # Bhojpuri
		'bi' => 'Bislama', # Bislama
		'bjn' => 'Banjar', # Banjarese
		'blk' => 'ပအိုဝ်ႏဘာႏသာႏ', # Pa'O
		'bm' => 'bamanankan', # Bambara
		'bn' => 'বাংলা', # Bengali
		'bo' => 'བོད་ཡིག', # Tibetan
		'bpy' => 'বিষ্ণুপ্রিয়া মণিপুরী', # Bishnupriya Manipuri
		'bqi' => 'بختیاری', # Bakthiari
		'br' => 'brezhoneg', # Breton
		'brh' => 'Bráhuí', # Brahui
		'bs' => 'bosanski', # Bosnian
		'btm' => 'Batak Mandailing', # Batak Mandailing
		'bto' => 'Iriga Bicolano', # Rinconada Bikol
		'bug' => 'Basa Ugi', # Buginese
		'bxr' => 'буряад', # Buryat (Russia)
		'ca' => 'català', # Catalan
		'cbk-zam' => 'Chavacano de Zamboanga', # Zamboanga Chavacano, T124657
		'ccp' => '𑄌𑄋𑄴𑄟𑄳𑄦', # Chakma
		'cdo' => '閩東語 / Mìng-dĕ̤ng-ngṳ̄', # Min-dong (multiple scripts - defaults to Latin)
		'ce' => 'нохчийн', # Chechen
		'ceb' => 'Cebuano', # Cebuano
		'ch' => 'Chamoru', # Chamorro
		'chn' => 'chinuk wawa', # Chinook Jargon
		'cho' => 'Chahta anumpa', # Choctaw
		'chr' => 'ᏣᎳᎩ', # Cherokee
		'chy' => 'Tsetsêhestâhese', # Cheyenne
		'ckb' => 'کوردی', # Central Kurdish
		'co' => 'corsu', # Corsican
		'cps' => 'Capiceño', # Capiznon
		'cpx' => '莆仙語 / Pó-sing-gṳ̂', # Puxian (multiple scripts - defaults to Traditional Han)
		'cpx-hans' => '莆仙语（简体）', # Puxian (Simplified Han script)
		'cpx-hant' => '莆仙語（繁體）', # Puxian (Traditional Han script)
		'cpx-latn' => 'Pó-sing-gṳ̂ (Báⁿ-uā-ci̍)', # Puxian (Latin script)
		'cr' => 'Nēhiyawēwin / ᓀᐦᐃᔭᐍᐏᐣ', # Cree
		'crh' => 'qırımtatarca', # Crimean Tatar (multiple scripts - defaults to Latin)
		'crh-cyrl' => 'къырымтатарджа (Кирилл)', # Crimean Tatar (Cyrillic)
		'crh-latn' => 'qırımtatarca (Latin)', # Crimean Tatar (Latin)
		'crh-ro' => 'tatarşa', # Crimean Tatar (Romania)
		'cs' => 'čeština', # Czech
		'csb' => 'kaszëbsczi', # Cassubian
		'cu' => 'словѣньскъ / ⰔⰎⰑⰂⰡⰐⰠⰔⰍⰟ', # Old Church Slavonic (ancient language)
		'cv' => 'чӑвашла', # Chuvash
		'cy' => 'Cymraeg', # Welsh
		'da' => 'dansk', # Danish
		'dag' => 'dagbanli', # Dagbani
		'de' => 'Deutsch', # German ("Du")
		'de-at' => 'Österreichisches Deutsch', # Austrian German
		'de-ch' => 'Schweizer Hochdeutsch', # Swiss Standard German
		'de-formal' => 'Deutsch (Sie-Form)', # German - formal address ("Sie")
		'dga' => 'Dagaare', # Southern Dagaare
		'din' => 'Thuɔŋjäŋ', # Dinka
		'diq' => 'Zazaki', # Zazaki
		'dsb' => 'dolnoserbski', # Lower Sorbian
		'dtp' => 'Dusun Bundu-liwan', # Central Dusun
		'dty' => 'डोटेली', # Doteli
		'dv' => 'ދިވެހިބަސް', # Dhivehi
		'dz' => 'ཇོང་ཁ', # Dzongkha (Bhutan)
		'ee' => 'eʋegbe', # Éwé
		'efi' => 'Efịk', # Efik
		'egl' => 'Emiliàn', # Emilian
		'el' => 'Ελληνικά', # Greek
		'eml' => 'emiliàn e rumagnòl', # Emiliano-Romagnolo / Sammarinese
		'en' => 'English', # English
		'en-ca' => 'Canadian English', # Canadian English
		'en-gb' => 'British English', # British English
		'en-x-piglatin' => 'Igpay Atinlay', # Pig Latin, for variant development
		'eo' => 'Esperanto', # Esperanto
		'es' => 'español', # Spanish
		'es-419' => 'español de América Latina', # Spanish for the Latin America and Caribbean region
		'es-formal' => 'español (formal)', # Spanish formal address
		'et' => 'eesti', # Estonian
		'eu' => 'euskara', # Basque
		'ext' => 'estremeñu', # Extremaduran
		'fa' => 'فارسی', # Persian
		'fat' => 'mfantse', # Fante
		'ff' => 'Fulfulde', # Fulfulde, Maasina
		'fi' => 'suomi', # Finnish
		'fit' => 'meänkieli', # Tornedalen Finnish
		'fiu-vro' => 'võro', # Võro (deprecated code, 'vro' in ISO 639-3 since 2009-01-16)
		'fj' => 'Na Vosa Vakaviti', # Fijian
		'fo' => 'føroyskt', # Faroese
		'fon' => 'fɔ̀ngbè', # Fon
		'fr' => 'français', # French
		'frc' => 'français cadien', # Cajun French
		'frp' => 'arpetan', # Franco-Provençal/Arpitan
		'frr' => 'Nordfriisk', # North Frisian
		'fur' => 'furlan', # Friulian
		'fy' => 'Frysk', # Frisian
		'ga' => 'Gaeilge', # Irish
		'gaa' => 'Ga', # Ga
		'gag' => 'Gagauz', # Gagauz
		'gan' => '贛語', # Gan (multiple scripts - defaults to Traditional Han)
		'gan-hans' => '赣语（简体）', # Gan (Simplified Han)
		'gan-hant' => '贛語（繁體）', # Gan (Traditional Han)
		'gcf' => 'kréyòl Gwadloup', # Guadeloupean Creole
		'gcr' => 'kriyòl gwiyannen', # Guianan Creole
		'gd' => 'Gàidhlig', # Scots Gaelic
		'gl' => 'galego', # Galician
		'gld' => 'на̄ни', # Nanai
		'glk' => 'گیلکی', # Gilaki
		'gn' => 'Avañe\'ẽ', # Guaraní, Paraguayan
		'gom' => 'गोंयची कोंकणी / Gõychi Konknni', # Goan Konkani
		'gom-deva' => 'गोंयची कोंकणी', # Goan Konkani (Devanagari script)
		'gom-latn' => 'Gõychi Konknni', # Goan Konkani (Latin script)
		'gor' => 'Bahasa Hulontalo', # Gorontalo
		'got' => '𐌲𐌿𐍄𐌹𐍃𐌺', # Gothic
		'gpe' => 'Ghanaian Pidgin', # Ghanaian Pidgin
		'grc' => 'Ἀρχαία ἑλληνικὴ', # Ancient Greek
		'gsw' => 'Alemannisch', # Alemannic
		'gu' => 'ગુજરાતી', # Gujarati
		'guc' => 'wayuunaiki', # Wayuu
		'gur' => 'farefare', # Farefare
		'guw' => 'gungbe', # Gun
		'gv' => 'Gaelg', # Manx
		'ha' => 'Hausa', # Hausa
		'hak' => '客家語 / Hak-kâ-ngî', # Hakka (multiple scripts)
		'hak-hans' => '客家语（简体）', # Hakka (Simplified Han script)
		'hak-hant' => '客家語（繁體）', # Hakka (Traditional Han script)
		'hak-latn' => 'Hak-kâ-ngî (Pha̍k-fa-sṳ)', # Hakka (Latin script)
		'haw' => 'Hawaiʻi', # Hawaiian
		'he' => 'עברית', # Hebrew
		'hi' => 'हिन्दी', # Hindi
		'hif' => 'Fiji Hindi', # Fijian Hindi (multiple scripts - defaults to Latin)
		'hif-latn' => 'Fiji Hindi', # Fiji Hindi (Latin script)
		'hil' => 'Ilonggo', # Hiligaynon
		'hno' => 'ہندکو', # Hindko
		'ho' => 'Hiri Motu', # Hiri Motu
		'hr' => 'hrvatski', # Croatian
		'hrx' => 'Hunsrik', # Riograndenser Hunsrückisch
		'hsb' => 'hornjoserbsce', # Upper Sorbian
		'hsn' => '湘語', # Xiang
		'ht' => 'Kreyòl ayisyen', # Haitian Creole French
		'hu' => 'magyar', # Hungarian
		'hu-formal' => 'magyar (formal)', # Hungarian formal address
		'hy' => 'հայերեն', # Armenian, T202611
		'hyw' => 'Արեւմտահայերէն', # Western Armenian, T201276, T219975
		'hz' => 'Otsiherero', # Herero
		'ia' => 'interlingua', # Interlingua (IALA)
		'iba' => 'Jaku Iban', # Iban
		'ibb' => 'ibibio', # Ibibio
		'id' => 'Bahasa Indonesia', # Indonesian
		'ie' => 'Interlingue', # Interlingue (Occidental)
		'ig' => 'Igbo', # Igbo
		'igl' => 'Igala', # Igala
		'ii' => 'ꆇꉙ', # Sichuan Yi
		'ik' => 'Iñupiatun', # Inupiaq
		'ike-cans' => 'ᐃᓄᒃᑎᑐᑦ', # Inuktitut, Eastern Canadian (Unified Canadian Aboriginal Syllabics)
		'ike-latn' => 'inuktitut', # Inuktitut, Eastern Canadian (Latin script)
		'ilo' => 'Ilokano', # Ilokano
		'inh' => 'гӀалгӀай', # Ingush
		'io' => 'Ido', # Ido
		'is' => 'íslenska', # Icelandic
		'isv-cyrl' => 'меджусловјанскы', # Interslavic (Cyrillic)
		'isv-latn' => 'medžuslovjansky', # Interslavic (Latin)
		'it' => 'italiano', # Italian
		'iu' => 'ᐃᓄᒃᑎᑐᑦ / inuktitut', # Inuktitut (macro language, see ike/ikt, falls back to ike-cans)
		'ja' => '日本語', # Japanese
		'jam' => 'Patois', # Jamaican Creole English
		'jbo' => 'la .lojban.', # Lojban
		'jut' => 'jysk', # Jutish / Jutlandic
		'jv' => 'Jawa', # Javanese
		'ka' => 'ქართული', # Georgian
		'kaa' => 'Qaraqalpaqsha', # Karakalpak
		'kab' => 'Taqbaylit', # Kabyle
		'kai' => 'Karai-karai', # Karekare
		'kbd' => 'адыгэбзэ', # Kabardian
		'kbd-cyrl' => 'адыгэбзэ', # Kabardian (Cyrillic)
		'kbp' => 'Kabɩyɛ', # Kabiyè
		'kcg' => 'Tyap', # Tyap
		'kea' => 'kabuverdianu', # Cape Verdean Creole
		'kg' => 'Kongo', # Kongo, (FIXME!) should probably be KiKongo or KiKoongo
		'kge' => 'Basa Kumoring', # Komering
		'khw' => 'کھوار', # Khowar
		'ki' => 'Gĩkũyũ', # Gikuyu
		'kiu' => 'Kırmancki', # Kirmanjki
		'kj' => 'Kwanyama', # Kwanyama
		'kjh' => 'хакас', # Khakas
		'kjp' => 'ဖၠုံလိက်', # Eastern Pwo
		'kk' => 'қазақша', # Kazakh (multiple scripts - defaults to Cyrillic)
		'kk-arab' => 'قازاقشا (تٴوتە)', # Kazakh Arabic
		'kk-cn' => 'قازاقشا (جۇنگو)', # Kazakh (China)
		'kk-cyrl' => 'қазақша (кирил)', # Kazakh Cyrillic
		'kk-kz' => 'қазақша (Қазақстан)', # Kazakh (Kazakhstan)
		'kk-latn' => 'qazaqşa (latın)', # Kazakh Latin
		'kk-tr' => 'qazaqşa (Türkïya)', # Kazakh (Turkey)
		'kl' => 'kalaallisut', # Inuktitut, Greenlandic/Greenlandic/Kalaallisut (kal)
		'km' => 'ភាសាខ្មែរ', # Khmer, Central
		'kn' => 'ಕನ್ನಡ', # Kannada
		'ko' => '한국어', # Korean
		'ko-kp' => '조선말', # Korean (DPRK), T190324
		'koi' => 'перем коми', # Komi-Permyak
		'kr' => 'kanuri', # Kanuri
		'krc' => 'къарачай-малкъар', # Karachay-Balkar
		'kri' => 'Krio', # Krio
		'krj' => 'Kinaray-a', # Kinaray-a
		'krl' => 'karjal', # Karelian
		'ks' => 'कॉशुर / کٲشُر', # Kashmiri (multiple scripts - defaults to Perso-Arabic)
		'ks-arab' => 'کٲشُر', # Kashmiri (Perso-Arabic script)
		'ks-deva' => 'कॉशुर', # Kashmiri (Devanagari script)
		'ksh' => 'Ripoarisch', # Ripuarian
		'ksw' => 'စှီၤ', # S'gaw Karen
		'ku' => 'kurdî', # Kurdish (multiple scripts - defaults to Latin)
		'ku-arab' => 'کوردی (عەرەبی)', # Northern Kurdish (Arabic script) (falls back to ckb; see also T368698)
		'ku-latn' => 'kurdî (latînî)', # Northern Kurdish (Latin script)
		'kum' => 'къумукъ', # Kumyk (Cyrillic, 'kum-latn' for Latin script)
		'kus' => 'Kʋsaal', # Kusaal
		'kv' => 'коми', # Komi-Zyrian (Cyrillic is common script but also written in Latin script)
		'kw' => 'kernowek', # Cornish
		'ky' => 'кыргызча', # Kirghiz
		'la' => 'Latina', # Latin
		'lad' => 'Ladino', # Ladino
		'lb' => 'Lëtzebuergesch', # Luxembourgish
		'lbe' => 'лакку', # Lak
		'lez' => 'лезги', # Lezgi
		'lfn' => 'Lingua Franca Nova', # Lingua Franca Nova
		'lg' => 'Luganda', # Ganda
		'li' => 'Limburgs', # Limburgian
		'lij' => 'Ligure', # Ligurian
		'liv' => 'Līvõ kēļ', # Livonian
		'lki' => 'لەکی', # Laki
		'lld' => 'Ladin', # Ladin
		'lmo' => 'lombard', # Lombard - T283423
		'ln' => 'lingála', # Lingala
		'lo' => 'ລາວ', # Laotian
		'loz' => 'Silozi', # Lozi
		'lrc' => 'لۊری شومالی', # Northern Luri
		'lt' => 'lietuvių', # Lithuanian
		'ltg' => 'latgaļu', # Latgalian
		'lus' => 'Mizo ţawng', # Mizo/Lushai
		'luz' => 'لئری دوٙمینی', # Southern Luri
		'lv' => 'latviešu', # Latvian
		'lzh' => '文言', # Literary Chinese, T10217
		'lzz' => 'Lazuri', # Laz
		'mad' => 'Madhurâ', # Madurese, T264582
		'mag' => 'मगही', # Magahi
		'mai' => 'मैथिली', # Maithili
		'map-bms' => 'Basa Banyumasan', # Banyumasan ('jv-x-bms')
		'mdf' => 'мокшень', # Moksha
		'mg' => 'Malagasy', # Malagasy
		'mh' => 'Ebon', # Marshallese
		'mhr' => 'олык марий', # Eastern Mari
		'mi' => 'Māori', # Maori
		'min' => 'Minangkabau', # Minangkabau
		'mk' => 'македонски', # Macedonian
		'ml' => 'മലയാളം', # Malayalam
		'mn' => 'монгол', # Halh Mongolian (Cyrillic) (ISO 639-3: khk)
		'mnc' => 'ᠮᠠᠨᠵᡠ ᡤᡳᠰᡠᠨ', # Manchu
		'mnc-latn' => 'manju gisun', # Manchu (Latin script)
		'mnc-mong' => 'ᠮᠠᠨᠵᡠ ᡤᡳᠰᡠᠨ', # Manchu (Mongolian script)
		'mni' => 'ꯃꯤꯇꯩ ꯂꯣꯟ', # Manipuri/Meitei
		'mnw' => 'ဘာသာမန်', # Mon
		'mo' => 'молдовеняскэ', # Moldovan, deprecated (ISO 639-2: ro-Cyrl-MD)
		'mos' => 'moore', # Mooré
		'mr' => 'मराठी', # Marathi
		'mrh' => 'Mara', # Mara
		'mrj' => 'кырык мары', # Hill Mari
		'ms' => 'Bahasa Melayu', # Malay
		'ms-arab' => 'بهاس ملايو', # Malay (Arabic Jawi script)
		'mt' => 'Malti', # Maltese
		'mui' => 'Baso Palembang', # Musi/Palembang
		'mus' => 'Mvskoke', # Muskogee/Creek
		'mwl' => 'Mirandés', # Mirandese
		'my' => 'မြန်မာဘာသာ', # Burmese
		'myv' => 'эрзянь', # Erzya
		'mzn' => 'مازِرونی', # Mazanderani
		'na' => 'Dorerin Naoero', # Nauruan
		'nah' => 'Nāhuatl', # Nahuatl (added to ISO 639-3 on 2006-10-31)
		'nan' => '閩南語 / Bân-lâm-gú', # Minnan (multiple scripts), T10217, T354937
		'nan-hant' => '閩南語（傳統漢字）', # Minnan (Traditional Han script), T354937
		'nan-latn-pehoeji' => 'Bân-lâm-gú (Pe̍h-ōe-jī)', # Minnan (Pe̍h-ōe-jī), T354937
		'nan-latn-tailo' => 'Bân-lâm-gú (Tâi-lô)', # Minnan (Tâi-lô), T354937
		'nap' => 'Napulitano', # Neapolitan, T45793
		'nb' => 'norsk bokmål', # Norwegian (Bokmal)
		'nds' => 'Plattdüütsch', # Low German ''or'' Low Saxon
		'nds-nl' => 'Nedersaksies', # aka Nedersaksisch: Dutch Low Saxon
		'ne' => 'नेपाली', # Nepali
		'new' => 'नेपाल भाषा', # Newar / Nepal Bhasha
		'ng' => 'Oshiwambo', # Ndonga
		'nia' => 'Li Niha', # Nias, T263968
		'nit' => 'కొలామి', # Southeastern Kolami
		'niu' => 'Niuē', # Niuean
		'nl' => 'Nederlands', # Dutch
		'nl-informal' => 'Nederlands (informeel)', # Dutch (informal address ("je"))
		'nmz' => 'nawdm', # Nawdm
		'nn' => 'norsk nynorsk', # Norwegian (Nynorsk)
		'no' => 'norsk', # Norwegian macro language (falls back to nb).
		'nod' => 'ᨣᩤᩴᨾᩮᩬᩥᨦ', # Northern Thai
		'nog' => 'ногайша', # Nogai
		'nov' => 'Novial', # Novial
		'nqo' => 'ߒߞߏ', # N'Ko
		'nrm' => 'Nouormand', # Norman (invalid code; 'nrf' in ISO 639 since 2014)
		'nso' => 'Sesotho sa Leboa', # Northern Sotho
		'nup' => 'Nupe', # Nupe
		'nv' => 'Diné bizaad', # Navajo
		'ny' => 'Chi-Chewa', # Chichewa
		'nyn' => 'runyankore', # Nkore
		'nyo' => 'Orunyoro', # Nyoro
		'nys' => 'Nyunga', # Nyungar
		'oc' => 'occitan', # Occitan
		'ojb' => 'Ojibwemowin', # Ojibwe
		'olo' => 'livvinkarjala', # Livvi-Karelian
		'om' => 'Oromoo', # Oromo
		'or' => 'ଓଡ଼ିଆ', # Oriya
		'os' => 'ирон', # Ossetic, T31091
		'pa' => 'ਪੰਜਾਬੀ', # Eastern Punjabi (Gurmukhi script) (pan)
		'pag' => 'Pangasinan', # Pangasinan
		'pam' => 'Kapampangan', # Pampanga
		'pap' => 'Papiamentu', # Papiamentu
		'pcd' => 'Picard', # Picard
		'pcm' => 'Naijá', # Nigerian Pidgin
		'pdc' => 'Deitsch', # Pennsylvania German
		'pdt' => 'Plautdietsch', # Plautdietsch/Mennonite Low German
		'pfl' => 'Pälzisch', # Palatinate German
		'pi' => 'पालि', # Pali
		'pih' => 'Norfuk / Pitkern', # Norfuk/Pitcairn/Norfolk
		'pl' => 'polski', # Polish
		'pms' => 'Piemontèis', # Piedmontese
		'pnb' => 'پنجابی', # Western Punjabi
		'pnt' => 'Ποντιακά', # Pontic/Pontic Greek
		'prg' => 'prūsiskan', # Prussian
		'ps' => 'پښتو', # Pashto
		'pt' => 'português', # Portuguese
		'pt-br' => 'português do Brasil', # Brazilian Portuguese
		'pwn' => 'pinayuanan', # Paiwan
		'qu' => 'Runa Simi', # Southern Quechua
		'qug' => 'Runa shimi', # Kichwa/Northern Quechua (temporarily used until Kichwa has its own)
		'rgn' => 'Rumagnôl', # Romagnol
		'rif' => 'Tarifit', # Tarifit
		'rki' => 'ရခိုင်', # Arakanese
		'rm' => 'rumantsch', # Raeto-Romance
		'rmc' => 'romaňi čhib', # Carpathian Romany
		'rmy' => 'romani čhib', # Vlax Romany
		'rn' => 'ikirundi', # Rundi (Kirundi)
		'ro' => 'română', # Romanian
		'roa-rup' => 'armãneashti', # Aromanian (deprecated code, 'rup' exists in ISO 639-3)
		'roa-tara' => 'tarandíne', # Tarantino ('nap-x-tara')
		'rsk' => 'руски', # Pannonian Rusyn
		'ru' => 'русский', # Russian
		'rue' => 'русиньскый', # Rusyn
		'rup' => 'armãneashti', # Aromanian
		'ruq' => 'Vlăheşte', # Megleno-Romanian (multiple scripts - defaults to Latin)
		'ruq-cyrl' => 'Влахесте', # Megleno-Romanian (Cyrillic script)
		'ruq-latn' => 'Vlăheşte', # Megleno-Romanian (Latin script)
		'rut' => 'мыхаӀбишды', # Rutul
		'rw' => 'Ikinyarwanda', # Kinyarwanda
		'ryu' => 'うちなーぐち', # Okinawan
		'sa' => 'संस्कृतम्', # Sanskrit
		'sah' => 'саха тыла', # Sakha
		'sat' => 'ᱥᱟᱱᱛᱟᱲᱤ', # Santali
		'sc' => 'sardu', # Sardinian
		'scn' => 'sicilianu', # Sicilian
		'sco' => 'Scots', # Scots
		'sd' => 'سنڌي', # Sindhi
		'sdc' => 'Sassaresu', # Sassarese
		'sdh' => 'کوردی خوارگ', # Southern Kurdish
		'se' => 'davvisámegiella', # Northern Sami
		'se-fi' => 'davvisámegiella (Suoma bealde)', # Northern Sami (Finland)
		'se-no' => 'davvisámegiella (Norgga bealde)', # Northern Sami (Norway)
		'se-se' => 'davvisámegiella (Ruoŧa bealde)', # Northern Sami (Sweden)
		'sei' => 'Cmique Itom', # Seri
		'ses' => 'Koyraboro Senni', # Koyraboro Senni
		'sg' => 'Sängö', # Sango/Sangho
		'sgs' => 'žemaitėška', # Samogitian
		'sh' => 'srpskohrvatski / српскохрватски', # Serbo-Croatian (multiple scripts - defaults to Latin)
		'sh-cyrl' => 'српскохрватски (ћирилица)', # Serbo-Croatian (Cyrillic script)
		'sh-latn' => 'srpskohrvatski (latinica)', # Serbo-Croatian (Latin script) (default)
		'shi' => 'Taclḥit', # Tachelhit, Shilha (multiple scripts - defaults to Latin)
		'shi-latn' => 'Taclḥit', # Tachelhit (Latin script)
		'shi-tfng' => 'ⵜⴰⵛⵍⵃⵉⵜ', # Tachelhit (Tifinagh script)
		'shn' => 'ၽႃႇသႃႇတႆး ', # Shan
		'shy' => 'tacawit', # Shawiya (Multiple scripts - defaults to Latin)
		'shy-latn' => 'tacawit', # Shawiya (Latin script) - T194047
		'si' => 'සිංහල', # Sinhalese
		'simple' => 'Simple English', # Simple English
		'sjd' => 'кӣллт са̄мь кӣлл', # Kildin Sami
		'sje' => 'bidumsámegiella', # Pite Sami
		'sk' => 'slovenčina', # Slovak
		'skr' => 'سرائیکی', # Saraiki (multiple scripts - defaults to Arabic)
		'skr-arab' => 'سرائیکی', # Saraiki (Arabic script)
		'sl' => 'slovenščina', # Slovenian
		'sli' => 'Schläsch', # Lower Silesian
		'sm' => 'Gagana Samoa', # Samoan
		'sma' => 'åarjelsaemien', # Southern Sami
		'smn' => 'anarâškielâ', # Inari Sami
		'sms' => 'nuõrttsääʹmǩiõll', # Skolt Sami
		'sn' => 'chiShona', # Shona
		'so' => 'Soomaaliga', # Somali
		'sq' => 'shqip', # Albanian
		'sr' => 'српски / srpski', # Serbian (multiple scripts - defaults to Cyrillic)
		'sr-ec' => 'српски (ћирилица)', # Serbian Cyrillic ekavian
		'sr-el' => 'srpski (latinica)', # Serbian Latin ekavian
		'srn' => 'Sranantongo', # Sranan Tongo
		'sro' => 'sardu campidanesu', # Campidanese Sardinian
		'ss' => 'SiSwati', # Swati
		'st' => 'Sesotho', # Southern Sotho
		'stq' => 'Seeltersk', # Saterland Frisian
		'sty' => 'себертатар', # Siberian Tatar
		'su' => 'Sunda', # Sundanese
		'sv' => 'svenska', # Swedish
		'sw' => 'Kiswahili', # Swahili
		'syl' => 'ꠍꠤꠟꠐꠤ', # Sylheti
		'szl' => 'ślůnski', # Silesian
		'szy' => 'Sakizaya', # Sakizaya - T174601
		'ta' => 'தமிழ்', # Tamil
		'tay' => 'Tayal', # Atayal
		'tcy' => 'ತುಳು', # Tulu
		'tdd' => 'ᥖᥭᥰ ᥖᥬᥲ ᥑᥨᥒᥰ', # Tai Nüa
		'te' => 'తెలుగు', # Telugu
		'tet' => 'tetun', # Tetun
		'tg' => 'тоҷикӣ', # Tajiki (falls back to tg-cyrl)
		'tg-cyrl' => 'тоҷикӣ', # Tajiki (Cyrllic script) (default)
		'tg-latn' => 'tojikī', # Tajiki (Latin script)
		'th' => 'ไทย', # Thai
		'ti' => 'ትግርኛ', # Tigrinya
		'tig' => 'ትግሬ', # Tigre
		'tk' => 'Türkmençe', # Turkmen
		'tl' => 'Tagalog', # Tagalog
		'tly' => 'tolışi', # Talysh
		'tly-cyrl' => 'толыши', # Talysh (Cyrillic)
		'tn' => 'Setswana', # Setswana
		'to' => 'lea faka-Tonga', # Tonga (Tonga Islands)
		'tok' => 'toki pona', # Toki Pona
		'tpi' => 'Tok Pisin', # Tok Pisin
		'tr' => 'Türkçe', # Turkish
		'tru' => 'Ṫuroyo', # Turoyo
		'trv' => 'Seediq', # Taroko
		'ts' => 'Xitsonga', # Tsonga
		'tt' => 'татарча / tatarça', # Tatar (multiple scripts - defaults to Cyrillic)
		'tt-cyrl' => 'татарча', # Tatar (Cyrillic script) (default)
		'tt-latn' => 'tatarça', # Tatar (Latin script)
		'ttj' => 'Orutooro', # Tooro
		'tum' => 'chiTumbuka', # Tumbuka
		'tw' => 'Twi', # Twi
		'ty' => 'reo tahiti', # Tahitian
		'tyv' => 'тыва дыл', # Tyvan
		'tzm' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ', # Tamazight
		'udm' => 'удмурт', # Udmurt
		'ug' => 'ئۇيغۇرچە / Uyghurche', # Uyghur (multiple scripts - defaults to Arabic)
		'ug-arab' => 'ئۇيغۇرچە', # Uyghur (Arabic script) (default)
		'ug-latn' => 'Uyghurche', # Uyghur (Latin script)
		'uk' => 'українська', # Ukrainian
		'ur' => 'اردو', # Urdu
		'uz' => 'oʻzbekcha / ўзбекча', # Uzbek (multiple scripts - defaults to Latin)
		'uz-cyrl' => 'ўзбекча', # Uzbek Cyrillic
		'uz-latn' => 'oʻzbekcha', # Uzbek Latin (default)
		've' => 'Tshivenda', # Venda
		'vec' => 'vèneto', # Venetian
		'vep' => 'vepsän kel’', # Veps
		'vi' => 'Tiếng Việt', # Vietnamese
		'vls' => 'West-Vlams', # West Flemish
		'vmf' => 'Mainfränkisch', # Upper Franconian, Main-Franconian
		'vmw' => 'emakhuwa', # Makhuwa
		'vo' => 'Volapük', # Volapük
		'vot' => 'Vaďďa', # Vod/Votian
		'vro' => 'võro', # Võro
		'wa' => 'walon', # Walloon
		'wal' => 'wolaytta', # Wolaytta
		'war' => 'Winaray', # Waray-Waray
		'wls' => 'Fakaʻuvea', # Wallisian
		'wo' => 'Wolof', # Wolof
		'wuu' => '吴语', # Wu (multiple scripts - defaults to Simplified Han)
		'wuu-hans' => '吴语（简体）', # Wu (Simplified Han)
		'wuu-hant' => '吳語（正體）', # Wu (Traditional Han)
		'xal' => 'хальмг', # Kalmyk-Oirat
		'xh' => 'isiXhosa', # Xhosan
		'xmf' => 'მარგალური', # Mingrelian
		'xsy' => 'saisiyat', # SaiSiyat - T216479
		'yi' => 'ייִדיש', # Yiddish
		'yo' => 'Yorùbá', # Yoruba
		'yrl' => 'Nhẽẽgatú', # Nheengatu
		'yue' => '粵語', # Cantonese (multiple scripts - defaults to Traditional Han)
		'yue-hans' => '粵语（简体）', # Cantonese (Simplified Han)
		'yue-hant' => '粵語（繁體）', # Cantonese (Traditional Han)
		'za' => 'Vahcuengh', # Zhuang
		'zea' => 'Zeêuws', # Zeeuws / Zeaws
		'zgh' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ ⵜⴰⵏⴰⵡⴰⵢⵜ', # Moroccan Amazigh (multiple scripts - defaults to Neo-Tifinagh)
		'zgh-latn' => 'tamaziɣt tanawayt', # Moroccan Amazigh (Latin script)
		'zh' => '中文', # (Zhōng Wén) - Chinese
		'zh-classical' => '文言', # Classical Chinese/Literary Chinese -- (see T10217)
		'zh-cn' => '中文（中国大陆）', # Chinese (PRC)
		'zh-hans' => '中文（简体）', # Mandarin Chinese (Simplified Chinese script) (cmn-hans)
		'zh-hant' => '中文（繁體）', # Mandarin Chinese (Traditional Chinese script) (cmn-hant)
		'zh-hk' => '中文（香港）', # Chinese (Hong Kong)
		'zh-min-nan' => 'Bân-lâm-gú', # Min-nan -- (see T10217)
		'zh-mo' => '中文（澳門）', # Chinese (Macau)
		'zh-my' => '中文（马来西亚）', # Chinese (Malaysia)
		'zh-sg' => '中文（新加坡）', # Chinese (Singapore)
		'zh-tw' => '中文（臺灣）', # Chinese (Taiwan)
		'zh-yue' => '粵語', # Cantonese -- (see T10217)
		'zu' => 'isiZulu' # Zulu
	];
}
