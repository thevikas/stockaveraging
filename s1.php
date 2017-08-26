<?php
#201708261926:Kovai:thevikas:Starting today
#market rate
$MR0 = $MR = 16.35;
#old average share price
$ASP1 = 55.03;
#old shares held
$SH = 3122;
#new shares bought
$SB = 0;

function set1()
{
global $ASP1, $ASP2, $SH, $MR, $SB;
# show 5 options of price APP price drop with 5 rs each
$m = intval($ASP1/5);
echo "Target Price |   Buy  | Buy Rate | Money Needed | Reduction % | Total Held\n";
echo "------------     ---    --------   ------------   -----------   ----------\n";
for($i=0; $i<5; $i++)
{
    $ASP2 = ($m - $i)*5;
    aspcalc();
}
$ASP2 = $ASP1 * .5;
aspcalc();
}

function aspcalc()
{
    global $ASP1, $ASP2, $SH, $MR, $SB;
    $SB = round(($ASP2*$SH - $SH*$ASP1)/($MR-$ASP2));
    display();
}

function display()
{
    global $ASP1, $ASP2, $SH, $MR, $SB;
    $SH2 = $SB + $SH;
    echo sprintf("%12d | %6d | %8.2f | Rs. %9.2f | %5.0f %% | %6d\n",$ASP2, $SB,$MR,$MR*$SB, (100*($ASP1-$ASP2)/$ASP1),$SH2);
}

set1();
$SB = 5000 - $SH;
display();
$SB = 10000 - $SH;
display();

$MR = $MR0 * (1 - 0.05);
echo "\nIf market price was lower by 5 %\n";
set1();
$SB = 5000 - $SH;
display();
$SB = 10000 - $SH;
display();

echo "\nIf market price was higher by 5%\n";
$MR = $MR0 * (1.05);
set1();
$SB = 5000 - $SH;
display();
$SB = 10000 - $SH;
display();

?>
