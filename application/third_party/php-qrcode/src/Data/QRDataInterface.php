<?php
/**
 * Interface QRDataInterface
 *
 * @filesource   QRDataInterface.php
 * @created      01.12.2015
 * @package      chillerlan\QRCode\Data
 * @author       Smiley <smiley@chillerlan.net>
 * @copyright    2015 Smiley
 * @license      MIT
 */

namespace chillerlan\QRCode\Data;

/**
 *
 */
interface QRDataInterface
{
    /**
     * @link http://www.qrcode.com/en/about/version.html
     */
    public const MAX_LENGTH =[ null, // start at 1
    //	[NUMERIC => [L, M, Q, H ], ALPHANUM => [L, M, Q, H], BINARY => [L, M, Q, H  ], KANJI => [L, M, Q, H   ]]  // modules
        [[  41,   34,   27,   17], [  25,   20,   16,   10], [  17,   14,   11,    7], [  10,    8,    7,    4]], //  21
        [[  77,   63,   48,   34], [  47,   38,   29,   20], [  32,   26,   20,   14], [  20,   16,   12,    8]], //  25
        [[ 127,  101,   77,   58], [  77,   61,   47,   35], [  53,   42,   32,   24], [  32,   26,   20,   15]], //  29
        [[ 187,  149,  111,   82], [ 114,   90,   67,   50], [  78,   62,   46,   34], [  48,   38,   28,   21]], //  33
        [[ 255,  202,  144,  106], [ 154,  122,   87,   64], [ 106,   84,   60,   44], [  65,   52,   37,   27]], //  37
        [[ 322,  255,  178,  139], [ 195,  154,  108,   84], [ 134,  106,   74,   58], [  82,   65,   45,   36]], //  41
        [[ 370,  293,  207,  154], [ 224,  178,  125,   93], [ 154,  122,   86,   64], [  95,   75,   53,   39]], //  45
        [[ 461,  365,  259,  202], [ 279,  221,  157,  122], [ 192,  152,  108,   84], [ 118,   93,   66,   52]], //  49
        [[ 552,  432,  312,  235], [ 335,  262,  189,  143], [ 230,  180,  130,   98], [ 141,  111,   80,   60]], //  53
        [[ 652,  513,  364,  288], [ 395,  311,  221,  174], [ 271,  213,  151,  119], [ 167,  131,   93,   74]], //  57
        [[ 772,  604,  427,  331], [ 468,  366,  259,  200], [ 321,  251,  177,  137], [ 198,  155,  109,   85]], //  61
        [[ 883,  691,  489,  374], [ 535,  419,  296,  227], [ 367,  287,  203,  155], [ 226,  177,  125,   96]], //  65
        [[1022,  796,  580,  427], [ 619,  483,  352,  259], [ 425,  331,  241,  177], [ 262,  204,  149,  109]], //  69 NICE!
        [[1101,  871,  621,  468], [ 667,  528,  376,  283], [ 458,  362,  258,  194], [ 282,  223,  159,  120]], //  73
        [[1250,  991,  703,  530], [ 758,  600,  426,  321], [ 520,  412,  292,  220], [ 320,  254,  180,  136]], //  77
        [[1408, 1082,  775,  602], [ 854,  656,  470,  365], [ 586,  450,  322,  250], [ 361,  277,  198,  154]], //  81
        [[1548, 1212,  876,  674], [ 938,  734,  531,  408], [ 644,  504,  364,  280], [ 397,  310,  224,  173]], //  85
        [[1725, 1346,  948,  746], [1046,  816,  574,  452], [ 718,  560,  394,  310], [ 442,  345,  243,  191]], //  89
        [[1903, 1500, 1063,  813], [1153,  909,  644,  493], [ 792,  624,  442,  338], [ 488,  384,  272,  208]], //  93
        [[2061, 1600, 1159,  919], [1249,  970,  702,  557], [ 858,  666,  482,  382], [ 528,  410,  297,  235]], //  97
        [[2232, 1708, 1224,  969], [1352, 1035,  742,  587], [ 929,  711,  509,  403], [ 572,  438,  314,  248]], // 101
        [[2409, 1872, 1358, 1056], [1460, 1134,  823,  640], [1003,  779,  565,  439], [ 618,  480,  348,  270]], // 105
        [[2620, 2059, 1468, 1108], [1588, 1248,  890,  672], [1091,  857,  611,  461], [ 672,  528,  376,  284]], // 109
        [[2812, 2188, 1588, 1228], [1704, 1326,  963,  744], [1171,  911,  661,  511], [ 721,  561,  407,  315]], // 113
        [[3057, 2395, 1718, 1286], [1853, 1451, 1041,  779], [1273,  997,  715,  535], [ 784,  614,  440,  330]], // 117
        [[3283, 2544, 1804, 1425], [1990, 1542, 1094,  864], [1367, 1059,  751,  593], [ 842,  652,  462,  365]], // 121
        [[3517, 2701, 1933, 1501], [2132, 1637, 1172,  910], [1465, 1125,  805,  625], [ 902,  692,  496,  385]], // 125
        [[3669, 2857, 2085, 1581], [2223, 1732, 1263,  958], [1528, 1190,  868,  658], [ 940,  732,  534,  405]], // 129
        [[3909, 3035, 2181, 1677], [2369, 1839, 1322, 1016], [1628, 1264,  908,  698], [1002,  778,  559,  430]], // 133
        [[4158, 3289, 2358, 1782], [2520, 1994, 1429, 1080], [1732, 1370,  982,  742], [1066,  843,  604,  457]], // 137
        [[4417, 3486, 2473, 1897], [2677, 2113, 1499, 1150], [1840, 1452, 1030,  790], [1132,  894,  634,  486]], // 141
        [[4686, 3693, 2670, 2022], [2840, 2238, 1618, 1226], [1952, 1538, 1112,  842], [1201,  947,  684,  518]], // 145
        [[4965, 3909, 2805, 2157], [3009, 2369, 1700, 1307], [2068, 1628, 1168,  898], [1273, 1002,  719,  553]], // 149
        [[5253, 4134, 2949, 2301], [3183, 2506, 1787, 1394], [2188, 1722, 1228,  958], [1347, 1060,  756,  590]], // 153
        [[5529, 4343, 3081, 2361], [3351, 2632, 1867, 1431], [2303, 1809, 1283,  983], [1417, 1113,  790,  605]], // 157
        [[5836, 4588, 3244, 2524], [3537, 2780, 1966, 1530], [2431, 1911, 1351, 1051], [1496, 1176,  832,  647]], // 161
        [[6153, 4775, 3417, 2625], [3729, 2894, 2071, 1591], [2563, 1989, 1423, 1093], [1577, 1224,  876,  673]], // 165
        [[6479, 5039, 3599, 2735], [3927, 3054, 2181, 1658], [2699, 2099, 1499, 1139], [1661, 1292,  923,  701]], // 169
        [[6743, 5313, 3791, 2927], [4087, 3220, 2298, 1774], [2809, 2213, 1579, 1219], [1729, 1362,  972,  750]], // 173
        [[7089, 5596, 3993, 3057], [4296, 3391, 2420, 1852], [2953, 2331, 1663, 1273], [1817, 1435, 1024,  784]], // 177
    ];

    public const MAX_BITS = [ null, // start at 1
        // MAX_BITS => [L, M, Q, H ]
        [  152,   128,   104,    72],
        [  272,   224,   176,   128],
        [  440,   352,   272,   208],
        [  640,   512,   384,   288],
        [  864,   688,   496,   368],
        [ 1088,   864,   608,   480],
        [ 1248,   992,   704,   528],
        [ 1552,  1232,   880,   688],
        [ 1856,  1456,  1056,   800],
        [ 2192,  1728,  1232,   976],
        [ 2592,  2032,  1440,  1120],
        [ 2960,  2320,  1648,  1264],
        [ 3424,  2672,  1952,  1440],
        [ 3688,  2920,  2088,  1576],
        [ 4184,  3320,  2360,  1784],
        [ 4712,  3624,  2600,  2024],
        [ 5176,  4056,  2936,  2264],
        [ 5768,  4504,  3176,  2504],
        [ 6360,  5016,  3560,  2728],
        [ 6888,  5352,  3880,  3080],
        [ 7456,  5712,  4096,  3248],
        [ 8048,  6256,  4544,  3536],
        [ 8752,  6880,  4912,  3712],
        [ 9392,  7312,  5312,  4112],
        [10208,  8000,  5744,  4304],
        [10960,  8496,  6032,  4768],
        [11744,  9024,  6464,  5024],
        [12248,  9544,  6968,  5288],
        [13048, 10136,  7288,  5608],
        [13880, 10984,  7880,  5960],
        [14744, 11640,  8264,  6344],
        [15640, 12328,  8920,  6760],
        [16568, 13048,  7208,  9368],
        [17528, 13800,  9848,  7688],
        [18448, 14496, 10288,  7888],
        [19472, 15312, 10832,  8432],
        [20528, 15936, 11408,  8768],
        [21616, 16816, 12016,  9136],
        [22496, 17728, 12656,  9776],
        [23648, 18672, 13328, 10208],
    ];

    /**
     * @link http://www.thonky.com/qr-code-tutorial/error-correction-table
     */
    public const RSBLOCKS = [ null, // start at 1
        [[ 1,  0,  26,  19], [ 1,  0, 26, 16], [ 1,  0, 26, 13], [ 1,  0, 26,  9]], //  1
        [[ 1,  0,  44,  34], [ 1,  0, 44, 28], [ 1,  0, 44, 22], [ 1,  0, 44, 16]], //
        [[ 1,  0,  70,  55], [ 1,  0, 70, 44], [ 2,  0, 35, 17], [ 2,  0, 35, 13]], //
        [[ 1,  0, 100,  80], [ 2,  0, 50, 32], [ 2,  0, 50, 24], [ 4,  0, 25,  9]], //
        [[ 1,  0, 134, 108], [ 2,  0, 67, 43], [ 2,  2, 33, 15], [ 2,  2, 33, 11]], //  5
        [[ 2,  0,  86,  68], [ 4,  0, 43, 27], [ 4,  0, 43, 19], [ 4,  0, 43, 15]], //
        [[ 2,  0,  98,  78], [ 4,  0, 49, 31], [ 2,  4, 32, 14], [ 4,  1, 39, 13]], //
        [[ 2,  0, 121,  97], [ 2,  2, 60, 38], [ 4,  2, 40, 18], [ 4,  2, 40, 14]], //
        [[ 2,  0, 146, 116], [ 3,  2, 58, 36], [ 4,  4, 36, 16], [ 4,  4, 36, 12]], //
        [[ 2,  2,  86,  68], [ 4,  1, 69, 43], [ 6,  2, 43, 19], [ 6,  2, 43, 15]], // 10
        [[ 4,  0, 101,  81], [ 1,  4, 80, 50], [ 4,  4, 50, 22], [ 3,  8, 36, 12]], //
        [[ 2,  2, 116,  92], [ 6,  2, 58, 36], [ 4,  6, 46, 20], [ 7,  4, 42, 14]], //
        [[ 4,  0, 133, 107], [ 8,  1, 59, 37], [ 8,  4, 44, 20], [12,  4, 33, 11]], //
        [[ 3,  1, 145, 115], [ 4,  5, 64, 40], [11,  5, 36, 16], [11,  5, 36, 12]], //
        [[ 5,  1, 109,  87], [ 5,  5, 65, 41], [ 5,  7, 54, 24], [11,  7, 36, 12]], // 15
        [[ 5,  1, 122,  98], [ 7,  3, 73, 45], [15,  2, 43, 19], [ 3, 13, 45, 15]], //
        [[ 1,  5, 135, 107], [10,  1, 74, 46], [ 1, 15, 50, 22], [ 2, 17, 42, 14]], //
        [[ 5,  1, 150, 120], [ 9,  4, 69, 43], [17,  1, 50, 22], [ 2, 19, 42, 14]], //
        [[ 3,  4, 141, 113], [ 3, 11, 70, 44], [17,  4, 47, 21], [ 9, 16, 39, 13]], //
        [[ 3,  5, 135, 107], [ 3, 13, 67, 41], [15,  5, 54, 24], [15, 10, 43, 15]], // 20
        [[ 4,  4, 144, 116], [17,  0, 68, 42], [17,  6, 50, 22], [19,  6, 46, 16]], //
        [[ 2,  7, 139, 111], [17,  0, 74, 46], [ 7, 16, 54, 24], [34,  0, 37, 13]], //
        [[ 4,  5, 151, 121], [ 4, 14, 75, 47], [11, 14, 54, 24], [16, 14, 45, 15]], //
        [[ 6,  4, 147, 117], [ 6, 14, 73, 45], [11, 16, 54, 24], [30,  2, 46, 16]], //
        [[ 8,  4, 132, 106], [ 8, 13, 75, 47], [ 7, 22, 54, 24], [22, 13, 45, 15]], // 25
        [[10,  2, 142, 114], [19,  4, 74, 46], [28,  6, 50, 22], [33,  4, 46, 16]], //
        [[ 8,  4, 152, 122], [22,  3, 73, 45], [ 8, 26, 53, 23], [12, 28, 45, 15]], //
        [[ 3, 10, 147, 117], [ 3, 23, 73, 45], [ 4, 31, 54, 24], [11, 31, 45, 15]], //
        [[ 7,  7, 146, 116], [21,  7, 73, 45], [ 1, 37, 53, 23], [19, 26, 45, 15]], //
        [[ 5, 10, 145, 115], [19, 10, 75, 47], [15, 25, 54, 24], [23, 25, 45, 15]], // 30
        [[13,  3, 145, 115], [ 2, 29, 74, 46], [42,  1, 54, 24], [23, 28, 45, 15]], //
        [[17,  0, 145, 115], [10, 23, 74, 46], [10, 35, 54, 24], [19, 35, 45, 15]], //
        [[17,  1, 145, 115], [14, 21, 74, 46], [29, 19, 54, 24], [11, 46, 45, 15]], //
        [[13,  6, 145, 115], [14, 23, 74, 46], [44,  7, 54, 24], [59,  1, 46, 16]], //
        [[12,  7, 151, 121], [12, 26, 75, 47], [39, 14, 54, 24], [22, 41, 45, 15]], // 35
        [[ 6, 14, 151, 121], [ 6, 34, 75, 47], [46, 10, 54, 24], [ 2, 64, 45, 15]], //
        [[17,  4, 152, 122], [29, 14, 74, 46], [49, 10, 54, 24], [24, 46, 45, 15]], //
        [[ 4, 18, 152, 122], [13, 32, 74, 46], [48, 14, 54, 24], [42, 32, 45, 15]], //
        [[20,  4, 147, 117], [40,  7, 75, 47], [43, 22, 54, 24], [10, 67, 45, 15]], //
        [[19,  6, 148, 118], [18, 31, 75, 47], [34, 34, 54, 24], [20, 61, 45, 15]], // 40
    ];

    /**
     * @param string $data
     *
     * @return \chillerlan\QRCode\Data\QRDataInterface
     */
    public function setData(string $data);

    /**
     * @param int  $maskPattern
     * @param bool $test
     *
     * @return \chillerlan\QRCode\Data\QRMatrix
     */
    public function initMatrix(int $maskPattern, bool $test = null): QRMatrix;
}
