<?php
require_once('lib.php');

$opts = getopt('r::',['ratefile::']);
$mrfilename = "market-rate.txt";

if(isset($opts['h']))
{
    echo "Usage: s1.php [-r 17.10]\n";
    echo "-r\tRates comma seperated - current market rate, old average rate, shares held currently\n";
    echo "--ratefile\tMarket rate file (default: market-rate.txt)\n";
    echo "\n";
    return;
}

if(!empty($opts['ratefile']))
{
    $mrfilename = $opts['f'];
}

if(empty($opts['r']))
{
    print "Loading from previous values\n";
    list($MR,$ASP1,$SH) = explode(',',trim(file_get_contents($mrfilename)));
}
else
{
    print "Loading from command line\n";
    list($MR,$ASP1,$SH) = explode(',',trim($opts['r']));
    if($MR>0 && $ASP1>0 && $SH>0);
    else
    {
        print "Values incorect? ($MR,$ASP1,$SH)\n";
        return;
    }
    file_put_contents($mrfilename,implode(',',[$MR,$ASP1,$SH]));
}

print "MR=$MR, ASP1=$ASP1, SH=$SH, ratefile=$mrfilename\n";
// 201708261926:Kovai:thevikas:Starting today
// market rate
$MR0 = $MR;
// old average share price
// old shares held
// new shares bought
$SB = 0;

whatif("At current market price");

$MR = $MR0 * (1 - 0.05);
whatif("If market price was lower by 5 %");

$MR = $MR0 * (1.05);
whatif("If market price was higher by 5%");


?>
