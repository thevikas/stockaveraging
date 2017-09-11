<?php

//writes a new table with header
function set1()
{
    global $ASP1, $ASP2, $SH, $MR, $SB;
    // show 5 options of price APP price drop with 5 rs each
    $m = intval ( $ASP1 / 5 );
    echo "Target Price |   Buy  | Buy Rate | Money Needed | Reduction % | Total Held\n";
    echo "------------     ---    --------   ------------   -----------   ----------\n";
    for($i = 0; $i < 5; $i ++)
    {
        $ASP2 = ($m - $i) * 5;
        aspcalc ();
    }
    $ASP2 = $ASP1 * .5;
    aspcalc ();
}

//pre calculates 1 row of data to formula in display can work
function aspcalc()
{
    global $ASP1, $ASP2, $SH, $MR, $SB;
    $SB = round ( ($ASP2 * $SH - $SH * $ASP1) / ($MR - $ASP2) );
    display ();
}

//calculates based on fixed formula and displayes 1 row of data
function display()
{
    global $ASP1, $ASP2, $SH, $MR, $SB;
    $SH2 = $SB + $SH;
    $ASP2 = (($SB * $MR) + ($SH * $ASP1)) / $SH2;
    echo sprintf ( "%12d | %6d | %8.2f | Rs. %9.2f | %5.0f %% | %6d\n", $ASP2, $SB, $MR, $MR * $SB,
            (100 * ($ASP1 - $ASP2) / $ASP1), $SH2 );
}

function whatif($title)
{
    global $SH,$SB,$MR;
    echo "\n$title\n";
    set1 ();
    $SB = 5000 - $SH;
    display ();
    $SB = 10000 - $SH;
    display ();
    $SB = 5000/$MR;
    display();
    $SB = 10000/$MR;
    display();
    $SB = 15000/$MR;
    display();
    $SB = 20000/$MR;
    display();
}

 ?>
