<?php

use Felix\TwitterStream\Rule\RuleBuilder;
/** Do not edit manually; changes will be lost. */
it('compiles', function ($value, $arguments, $expected) {
    expect((new RuleBuilder())->{$value}(...$arguments)->compile())->toBe($expected);
})->with(array (
  0 => 
  array (
    0 => 'isRetweet',
    1 => 
    array (
    ),
    2 => 'is:retweet',
  ),
  1 => 
  array (
    0 => 'isNotRetweet',
    1 => 
    array (
    ),
    2 => '-is:retweet',
  ),
  2 => 
  array (
    0 => 'isNotRetweet',
    1 => 
    array (
    ),
    2 => '-is:retweet',
  ),
  3 => 
  array (
    0 => 'orIsRetweet',
    1 => 
    array (
    ),
    2 => 'OR is:retweet',
  ),
  4 => 
  array (
    0 => 'orIsNotRetweet',
    1 => 
    array (
    ),
    2 => 'OR -is:retweet',
  ),
  5 => 
  array (
    0 => 'andIsRetweet',
    1 => 
    array (
    ),
    2 => 'AND is:retweet',
  ),
  6 => 
  array (
    0 => 'andIsNotRetweet',
    1 => 
    array (
    ),
    2 => 'AND -is:retweet',
  ),
  7 => 
  array (
    0 => 'exceptRetweet',
    1 => 
    array (
    ),
    2 => '-is:retweet',
  ),
  8 => 
  array (
    0 => 'exceptNotRetweet',
    1 => 
    array (
    ),
    2 => 'is:retweet',
  ),
  9 => 
  array (
    0 => 'orExceptRetweet',
    1 => 
    array (
    ),
    2 => 'OR -is:retweet',
  ),
  10 => 
  array (
    0 => 'orExceptNotRetweet',
    1 => 
    array (
    ),
    2 => 'OR is:retweet',
  ),
  11 => 
  array (
    0 => 'andExceptRetweet',
    1 => 
    array (
    ),
    2 => 'AND -is:retweet',
  ),
  12 => 
  array (
    0 => 'andExceptNotRetweet',
    1 => 
    array (
    ),
    2 => 'AND is:retweet',
  ),
  13 => 
  array (
    0 => 'isReply',
    1 => 
    array (
    ),
    2 => 'is:reply',
  ),
  14 => 
  array (
    0 => 'isNotReply',
    1 => 
    array (
    ),
    2 => '-is:reply',
  ),
  15 => 
  array (
    0 => 'isNotReply',
    1 => 
    array (
    ),
    2 => '-is:reply',
  ),
  16 => 
  array (
    0 => 'orIsReply',
    1 => 
    array (
    ),
    2 => 'OR is:reply',
  ),
  17 => 
  array (
    0 => 'orIsNotReply',
    1 => 
    array (
    ),
    2 => 'OR -is:reply',
  ),
  18 => 
  array (
    0 => 'andIsReply',
    1 => 
    array (
    ),
    2 => 'AND is:reply',
  ),
  19 => 
  array (
    0 => 'andIsNotReply',
    1 => 
    array (
    ),
    2 => 'AND -is:reply',
  ),
  20 => 
  array (
    0 => 'exceptReply',
    1 => 
    array (
    ),
    2 => '-is:reply',
  ),
  21 => 
  array (
    0 => 'exceptNotReply',
    1 => 
    array (
    ),
    2 => 'is:reply',
  ),
  22 => 
  array (
    0 => 'orExceptReply',
    1 => 
    array (
    ),
    2 => 'OR -is:reply',
  ),
  23 => 
  array (
    0 => 'orExceptNotReply',
    1 => 
    array (
    ),
    2 => 'OR is:reply',
  ),
  24 => 
  array (
    0 => 'andExceptReply',
    1 => 
    array (
    ),
    2 => 'AND -is:reply',
  ),
  25 => 
  array (
    0 => 'andExceptNotReply',
    1 => 
    array (
    ),
    2 => 'AND is:reply',
  ),
  26 => 
  array (
    0 => 'isQuote',
    1 => 
    array (
    ),
    2 => 'is:quote',
  ),
  27 => 
  array (
    0 => 'isNotQuote',
    1 => 
    array (
    ),
    2 => '-is:quote',
  ),
  28 => 
  array (
    0 => 'isNotQuote',
    1 => 
    array (
    ),
    2 => '-is:quote',
  ),
  29 => 
  array (
    0 => 'orIsQuote',
    1 => 
    array (
    ),
    2 => 'OR is:quote',
  ),
  30 => 
  array (
    0 => 'orIsNotQuote',
    1 => 
    array (
    ),
    2 => 'OR -is:quote',
  ),
  31 => 
  array (
    0 => 'andIsQuote',
    1 => 
    array (
    ),
    2 => 'AND is:quote',
  ),
  32 => 
  array (
    0 => 'andIsNotQuote',
    1 => 
    array (
    ),
    2 => 'AND -is:quote',
  ),
  33 => 
  array (
    0 => 'exceptQuote',
    1 => 
    array (
    ),
    2 => '-is:quote',
  ),
  34 => 
  array (
    0 => 'exceptNotQuote',
    1 => 
    array (
    ),
    2 => 'is:quote',
  ),
  35 => 
  array (
    0 => 'orExceptQuote',
    1 => 
    array (
    ),
    2 => 'OR -is:quote',
  ),
  36 => 
  array (
    0 => 'orExceptNotQuote',
    1 => 
    array (
    ),
    2 => 'OR is:quote',
  ),
  37 => 
  array (
    0 => 'andExceptQuote',
    1 => 
    array (
    ),
    2 => 'AND -is:quote',
  ),
  38 => 
  array (
    0 => 'andExceptNotQuote',
    1 => 
    array (
    ),
    2 => 'AND is:quote',
  ),
  39 => 
  array (
    0 => 'isVerified',
    1 => 
    array (
    ),
    2 => 'is:verified',
  ),
  40 => 
  array (
    0 => 'isNotVerified',
    1 => 
    array (
    ),
    2 => '-is:verified',
  ),
  41 => 
  array (
    0 => 'isNotVerified',
    1 => 
    array (
    ),
    2 => '-is:verified',
  ),
  42 => 
  array (
    0 => 'orIsVerified',
    1 => 
    array (
    ),
    2 => 'OR is:verified',
  ),
  43 => 
  array (
    0 => 'orIsNotVerified',
    1 => 
    array (
    ),
    2 => 'OR -is:verified',
  ),
  44 => 
  array (
    0 => 'andIsVerified',
    1 => 
    array (
    ),
    2 => 'AND is:verified',
  ),
  45 => 
  array (
    0 => 'andIsNotVerified',
    1 => 
    array (
    ),
    2 => 'AND -is:verified',
  ),
  46 => 
  array (
    0 => 'exceptVerified',
    1 => 
    array (
    ),
    2 => '-is:verified',
  ),
  47 => 
  array (
    0 => 'exceptNotVerified',
    1 => 
    array (
    ),
    2 => 'is:verified',
  ),
  48 => 
  array (
    0 => 'orExceptVerified',
    1 => 
    array (
    ),
    2 => 'OR -is:verified',
  ),
  49 => 
  array (
    0 => 'orExceptNotVerified',
    1 => 
    array (
    ),
    2 => 'OR is:verified',
  ),
  50 => 
  array (
    0 => 'andExceptVerified',
    1 => 
    array (
    ),
    2 => 'AND -is:verified',
  ),
  51 => 
  array (
    0 => 'andExceptNotVerified',
    1 => 
    array (
    ),
    2 => 'AND is:verified',
  ),
  52 => 
  array (
    0 => 'hasHashtags',
    1 => 
    array (
    ),
    2 => 'has:hashtags',
  ),
  53 => 
  array (
    0 => 'hasNotHashtags',
    1 => 
    array (
    ),
    2 => '-has:hashtags',
  ),
  54 => 
  array (
    0 => 'hasNotHashtags',
    1 => 
    array (
    ),
    2 => '-has:hashtags',
  ),
  55 => 
  array (
    0 => 'orHasHashtags',
    1 => 
    array (
    ),
    2 => 'OR has:hashtags',
  ),
  56 => 
  array (
    0 => 'orHasNotHashtags',
    1 => 
    array (
    ),
    2 => 'OR -has:hashtags',
  ),
  57 => 
  array (
    0 => 'andHasHashtags',
    1 => 
    array (
    ),
    2 => 'AND has:hashtags',
  ),
  58 => 
  array (
    0 => 'andHasNotHashtags',
    1 => 
    array (
    ),
    2 => 'AND -has:hashtags',
  ),
  59 => 
  array (
    0 => 'hasCashtags',
    1 => 
    array (
    ),
    2 => 'has:cashtags',
  ),
  60 => 
  array (
    0 => 'hasNotCashtags',
    1 => 
    array (
    ),
    2 => '-has:cashtags',
  ),
  61 => 
  array (
    0 => 'hasNotCashtags',
    1 => 
    array (
    ),
    2 => '-has:cashtags',
  ),
  62 => 
  array (
    0 => 'orHasCashtags',
    1 => 
    array (
    ),
    2 => 'OR has:cashtags',
  ),
  63 => 
  array (
    0 => 'orHasNotCashtags',
    1 => 
    array (
    ),
    2 => 'OR -has:cashtags',
  ),
  64 => 
  array (
    0 => 'andHasCashtags',
    1 => 
    array (
    ),
    2 => 'AND has:cashtags',
  ),
  65 => 
  array (
    0 => 'andHasNotCashtags',
    1 => 
    array (
    ),
    2 => 'AND -has:cashtags',
  ),
  66 => 
  array (
    0 => 'hasLinks',
    1 => 
    array (
    ),
    2 => 'has:links',
  ),
  67 => 
  array (
    0 => 'hasNotLinks',
    1 => 
    array (
    ),
    2 => '-has:links',
  ),
  68 => 
  array (
    0 => 'hasNotLinks',
    1 => 
    array (
    ),
    2 => '-has:links',
  ),
  69 => 
  array (
    0 => 'orHasLinks',
    1 => 
    array (
    ),
    2 => 'OR has:links',
  ),
  70 => 
  array (
    0 => 'orHasNotLinks',
    1 => 
    array (
    ),
    2 => 'OR -has:links',
  ),
  71 => 
  array (
    0 => 'andHasLinks',
    1 => 
    array (
    ),
    2 => 'AND has:links',
  ),
  72 => 
  array (
    0 => 'andHasNotLinks',
    1 => 
    array (
    ),
    2 => 'AND -has:links',
  ),
  73 => 
  array (
    0 => 'hasMentions',
    1 => 
    array (
    ),
    2 => 'has:mentions',
  ),
  74 => 
  array (
    0 => 'hasNotMentions',
    1 => 
    array (
    ),
    2 => '-has:mentions',
  ),
  75 => 
  array (
    0 => 'hasNotMentions',
    1 => 
    array (
    ),
    2 => '-has:mentions',
  ),
  76 => 
  array (
    0 => 'orHasMentions',
    1 => 
    array (
    ),
    2 => 'OR has:mentions',
  ),
  77 => 
  array (
    0 => 'orHasNotMentions',
    1 => 
    array (
    ),
    2 => 'OR -has:mentions',
  ),
  78 => 
  array (
    0 => 'andHasMentions',
    1 => 
    array (
    ),
    2 => 'AND has:mentions',
  ),
  79 => 
  array (
    0 => 'andHasNotMentions',
    1 => 
    array (
    ),
    2 => 'AND -has:mentions',
  ),
  80 => 
  array (
    0 => 'hasMedia',
    1 => 
    array (
    ),
    2 => 'has:media',
  ),
  81 => 
  array (
    0 => 'hasNotMedia',
    1 => 
    array (
    ),
    2 => '-has:media',
  ),
  82 => 
  array (
    0 => 'hasNotMedia',
    1 => 
    array (
    ),
    2 => '-has:media',
  ),
  83 => 
  array (
    0 => 'orHasMedia',
    1 => 
    array (
    ),
    2 => 'OR has:media',
  ),
  84 => 
  array (
    0 => 'orHasNotMedia',
    1 => 
    array (
    ),
    2 => 'OR -has:media',
  ),
  85 => 
  array (
    0 => 'andHasMedia',
    1 => 
    array (
    ),
    2 => 'AND has:media',
  ),
  86 => 
  array (
    0 => 'andHasNotMedia',
    1 => 
    array (
    ),
    2 => 'AND -has:media',
  ),
  87 => 
  array (
    0 => 'hasImages',
    1 => 
    array (
    ),
    2 => 'has:images',
  ),
  88 => 
  array (
    0 => 'hasNotImages',
    1 => 
    array (
    ),
    2 => '-has:images',
  ),
  89 => 
  array (
    0 => 'hasNotImages',
    1 => 
    array (
    ),
    2 => '-has:images',
  ),
  90 => 
  array (
    0 => 'orHasImages',
    1 => 
    array (
    ),
    2 => 'OR has:images',
  ),
  91 => 
  array (
    0 => 'orHasNotImages',
    1 => 
    array (
    ),
    2 => 'OR -has:images',
  ),
  92 => 
  array (
    0 => 'andHasImages',
    1 => 
    array (
    ),
    2 => 'AND has:images',
  ),
  93 => 
  array (
    0 => 'andHasNotImages',
    1 => 
    array (
    ),
    2 => 'AND -has:images',
  ),
  94 => 
  array (
    0 => 'hasVideos',
    1 => 
    array (
    ),
    2 => 'has:videos',
  ),
  95 => 
  array (
    0 => 'hasNotVideos',
    1 => 
    array (
    ),
    2 => '-has:videos',
  ),
  96 => 
  array (
    0 => 'hasNotVideos',
    1 => 
    array (
    ),
    2 => '-has:videos',
  ),
  97 => 
  array (
    0 => 'orHasVideos',
    1 => 
    array (
    ),
    2 => 'OR has:videos',
  ),
  98 => 
  array (
    0 => 'orHasNotVideos',
    1 => 
    array (
    ),
    2 => 'OR -has:videos',
  ),
  99 => 
  array (
    0 => 'andHasVideos',
    1 => 
    array (
    ),
    2 => 'AND has:videos',
  ),
  100 => 
  array (
    0 => 'andHasNotVideos',
    1 => 
    array (
    ),
    2 => 'AND -has:videos',
  ),
  101 => 
  array (
    0 => 'hasGeo',
    1 => 
    array (
    ),
    2 => 'has:geo',
  ),
  102 => 
  array (
    0 => 'hasNotGeo',
    1 => 
    array (
    ),
    2 => '-has:geo',
  ),
  103 => 
  array (
    0 => 'hasNotGeo',
    1 => 
    array (
    ),
    2 => '-has:geo',
  ),
  104 => 
  array (
    0 => 'orHasGeo',
    1 => 
    array (
    ),
    2 => 'OR has:geo',
  ),
  105 => 
  array (
    0 => 'orHasNotGeo',
    1 => 
    array (
    ),
    2 => 'OR -has:geo',
  ),
  106 => 
  array (
    0 => 'andHasGeo',
    1 => 
    array (
    ),
    2 => 'AND has:geo',
  ),
  107 => 
  array (
    0 => 'andHasNotGeo',
    1 => 
    array (
    ),
    2 => 'AND -has:geo',
  ),
  108 => 
  array (
    0 => 'from',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'from:a',
  ),
  109 => 
  array (
    0 => 'notFrom',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-from:a',
  ),
  110 => 
  array (
    0 => 'orFrom',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR from:a',
  ),
  111 => 
  array (
    0 => 'orNotFrom',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -from:a',
  ),
  112 => 
  array (
    0 => 'andFrom',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND from:a',
  ),
  113 => 
  array (
    0 => 'andNotFrom',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -from:a',
  ),
  114 => 
  array (
    0 => 'from',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'from:b',
  ),
  115 => 
  array (
    0 => 'notFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-from:b',
  ),
  116 => 
  array (
    0 => 'orFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR from:b',
  ),
  117 => 
  array (
    0 => 'orNotFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -from:b',
  ),
  118 => 
  array (
    0 => 'andFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND from:b',
  ),
  119 => 
  array (
    0 => 'andNotFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -from:b',
  ),
  120 => 
  array (
    0 => 'from',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'from:a from:b',
  ),
  121 => 
  array (
    0 => 'notFrom',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-from:a -from:b',
  ),
  122 => 
  array (
    0 => 'orFrom',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'from:a OR from:b',
  ),
  123 => 
  array (
    0 => 'orNotFrom',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-from:a OR -from:b',
  ),
  124 => 
  array (
    0 => 'andFrom',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'from:a AND from:b',
  ),
  125 => 
  array (
    0 => 'andNotFrom',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-from:a AND -from:b',
  ),
  126 => 
  array (
    0 => 'from',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'from:a from:b',
  ),
  127 => 
  array (
    0 => 'notFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-from:a -from:b',
  ),
  128 => 
  array (
    0 => 'orFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'from:a OR from:b',
  ),
  129 => 
  array (
    0 => 'orNotFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-from:a OR -from:b',
  ),
  130 => 
  array (
    0 => 'andFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'from:a AND from:b',
  ),
  131 => 
  array (
    0 => 'andNotFrom',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-from:a AND -from:b',
  ),
  132 => 
  array (
    0 => 'to',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'to:a',
  ),
  133 => 
  array (
    0 => 'notTo',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-to:a',
  ),
  134 => 
  array (
    0 => 'orTo',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR to:a',
  ),
  135 => 
  array (
    0 => 'orNotTo',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -to:a',
  ),
  136 => 
  array (
    0 => 'andTo',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND to:a',
  ),
  137 => 
  array (
    0 => 'andNotTo',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -to:a',
  ),
  138 => 
  array (
    0 => 'to',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'to:b',
  ),
  139 => 
  array (
    0 => 'notTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-to:b',
  ),
  140 => 
  array (
    0 => 'orTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR to:b',
  ),
  141 => 
  array (
    0 => 'orNotTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -to:b',
  ),
  142 => 
  array (
    0 => 'andTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND to:b',
  ),
  143 => 
  array (
    0 => 'andNotTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -to:b',
  ),
  144 => 
  array (
    0 => 'to',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'to:a to:b',
  ),
  145 => 
  array (
    0 => 'notTo',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-to:a -to:b',
  ),
  146 => 
  array (
    0 => 'orTo',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'to:a OR to:b',
  ),
  147 => 
  array (
    0 => 'orNotTo',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-to:a OR -to:b',
  ),
  148 => 
  array (
    0 => 'andTo',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'to:a AND to:b',
  ),
  149 => 
  array (
    0 => 'andNotTo',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-to:a AND -to:b',
  ),
  150 => 
  array (
    0 => 'to',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'to:a to:b',
  ),
  151 => 
  array (
    0 => 'notTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-to:a -to:b',
  ),
  152 => 
  array (
    0 => 'orTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'to:a OR to:b',
  ),
  153 => 
  array (
    0 => 'orNotTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-to:a OR -to:b',
  ),
  154 => 
  array (
    0 => 'andTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'to:a AND to:b',
  ),
  155 => 
  array (
    0 => 'andNotTo',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-to:a AND -to:b',
  ),
  156 => 
  array (
    0 => 'url',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'url:a',
  ),
  157 => 
  array (
    0 => 'notUrl',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-url:a',
  ),
  158 => 
  array (
    0 => 'orUrl',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR url:a',
  ),
  159 => 
  array (
    0 => 'orNotUrl',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -url:a',
  ),
  160 => 
  array (
    0 => 'andUrl',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND url:a',
  ),
  161 => 
  array (
    0 => 'andNotUrl',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -url:a',
  ),
  162 => 
  array (
    0 => 'url',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'url:b',
  ),
  163 => 
  array (
    0 => 'notUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-url:b',
  ),
  164 => 
  array (
    0 => 'orUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR url:b',
  ),
  165 => 
  array (
    0 => 'orNotUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -url:b',
  ),
  166 => 
  array (
    0 => 'andUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND url:b',
  ),
  167 => 
  array (
    0 => 'andNotUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -url:b',
  ),
  168 => 
  array (
    0 => 'url',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'url:a url:b',
  ),
  169 => 
  array (
    0 => 'notUrl',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-url:a -url:b',
  ),
  170 => 
  array (
    0 => 'orUrl',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'url:a OR url:b',
  ),
  171 => 
  array (
    0 => 'orNotUrl',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-url:a OR -url:b',
  ),
  172 => 
  array (
    0 => 'andUrl',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'url:a AND url:b',
  ),
  173 => 
  array (
    0 => 'andNotUrl',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-url:a AND -url:b',
  ),
  174 => 
  array (
    0 => 'url',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'url:a url:b',
  ),
  175 => 
  array (
    0 => 'notUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-url:a -url:b',
  ),
  176 => 
  array (
    0 => 'orUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'url:a OR url:b',
  ),
  177 => 
  array (
    0 => 'orNotUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-url:a OR -url:b',
  ),
  178 => 
  array (
    0 => 'andUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'url:a AND url:b',
  ),
  179 => 
  array (
    0 => 'andNotUrl',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-url:a AND -url:b',
  ),
  180 => 
  array (
    0 => 'retweetsOf',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'retweets_of:a',
  ),
  181 => 
  array (
    0 => 'notRetweetsOf',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-retweets_of:a',
  ),
  182 => 
  array (
    0 => 'orRetweetsOf',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR retweets_of:a',
  ),
  183 => 
  array (
    0 => 'orNotRetweetsOf',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -retweets_of:a',
  ),
  184 => 
  array (
    0 => 'andRetweetsOf',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND retweets_of:a',
  ),
  185 => 
  array (
    0 => 'andNotRetweetsOf',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -retweets_of:a',
  ),
  186 => 
  array (
    0 => 'retweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'retweets_of:b',
  ),
  187 => 
  array (
    0 => 'notRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-retweets_of:b',
  ),
  188 => 
  array (
    0 => 'orRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR retweets_of:b',
  ),
  189 => 
  array (
    0 => 'orNotRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -retweets_of:b',
  ),
  190 => 
  array (
    0 => 'andRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND retweets_of:b',
  ),
  191 => 
  array (
    0 => 'andNotRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -retweets_of:b',
  ),
  192 => 
  array (
    0 => 'retweetsOf',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'retweets_of:a retweets_of:b',
  ),
  193 => 
  array (
    0 => 'notRetweetsOf',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-retweets_of:a -retweets_of:b',
  ),
  194 => 
  array (
    0 => 'orRetweetsOf',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'retweets_of:a OR retweets_of:b',
  ),
  195 => 
  array (
    0 => 'orNotRetweetsOf',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-retweets_of:a OR -retweets_of:b',
  ),
  196 => 
  array (
    0 => 'andRetweetsOf',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'retweets_of:a AND retweets_of:b',
  ),
  197 => 
  array (
    0 => 'andNotRetweetsOf',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-retweets_of:a AND -retweets_of:b',
  ),
  198 => 
  array (
    0 => 'retweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'retweets_of:a retweets_of:b',
  ),
  199 => 
  array (
    0 => 'notRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-retweets_of:a -retweets_of:b',
  ),
  200 => 
  array (
    0 => 'orRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'retweets_of:a OR retweets_of:b',
  ),
  201 => 
  array (
    0 => 'orNotRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-retweets_of:a OR -retweets_of:b',
  ),
  202 => 
  array (
    0 => 'andRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'retweets_of:a AND retweets_of:b',
  ),
  203 => 
  array (
    0 => 'andNotRetweetsOf',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-retweets_of:a AND -retweets_of:b',
  ),
  204 => 
  array (
    0 => 'context',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'context:a',
  ),
  205 => 
  array (
    0 => 'notContext',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-context:a',
  ),
  206 => 
  array (
    0 => 'orContext',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR context:a',
  ),
  207 => 
  array (
    0 => 'orNotContext',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -context:a',
  ),
  208 => 
  array (
    0 => 'andContext',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND context:a',
  ),
  209 => 
  array (
    0 => 'andNotContext',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -context:a',
  ),
  210 => 
  array (
    0 => 'context',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'context:b',
  ),
  211 => 
  array (
    0 => 'notContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-context:b',
  ),
  212 => 
  array (
    0 => 'orContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR context:b',
  ),
  213 => 
  array (
    0 => 'orNotContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -context:b',
  ),
  214 => 
  array (
    0 => 'andContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND context:b',
  ),
  215 => 
  array (
    0 => 'andNotContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -context:b',
  ),
  216 => 
  array (
    0 => 'context',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'context:a context:b',
  ),
  217 => 
  array (
    0 => 'notContext',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-context:a -context:b',
  ),
  218 => 
  array (
    0 => 'orContext',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'context:a OR context:b',
  ),
  219 => 
  array (
    0 => 'orNotContext',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-context:a OR -context:b',
  ),
  220 => 
  array (
    0 => 'andContext',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'context:a AND context:b',
  ),
  221 => 
  array (
    0 => 'andNotContext',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-context:a AND -context:b',
  ),
  222 => 
  array (
    0 => 'context',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'context:a context:b',
  ),
  223 => 
  array (
    0 => 'notContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-context:a -context:b',
  ),
  224 => 
  array (
    0 => 'orContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'context:a OR context:b',
  ),
  225 => 
  array (
    0 => 'orNotContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-context:a OR -context:b',
  ),
  226 => 
  array (
    0 => 'andContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'context:a AND context:b',
  ),
  227 => 
  array (
    0 => 'andNotContext',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-context:a AND -context:b',
  ),
  228 => 
  array (
    0 => 'entity',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'entity:a',
  ),
  229 => 
  array (
    0 => 'notEntity',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-entity:a',
  ),
  230 => 
  array (
    0 => 'orEntity',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR entity:a',
  ),
  231 => 
  array (
    0 => 'orNotEntity',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -entity:a',
  ),
  232 => 
  array (
    0 => 'andEntity',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND entity:a',
  ),
  233 => 
  array (
    0 => 'andNotEntity',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -entity:a',
  ),
  234 => 
  array (
    0 => 'entity',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'entity:b',
  ),
  235 => 
  array (
    0 => 'notEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-entity:b',
  ),
  236 => 
  array (
    0 => 'orEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR entity:b',
  ),
  237 => 
  array (
    0 => 'orNotEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -entity:b',
  ),
  238 => 
  array (
    0 => 'andEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND entity:b',
  ),
  239 => 
  array (
    0 => 'andNotEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -entity:b',
  ),
  240 => 
  array (
    0 => 'entity',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'entity:a entity:b',
  ),
  241 => 
  array (
    0 => 'notEntity',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-entity:a -entity:b',
  ),
  242 => 
  array (
    0 => 'orEntity',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'entity:a OR entity:b',
  ),
  243 => 
  array (
    0 => 'orNotEntity',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-entity:a OR -entity:b',
  ),
  244 => 
  array (
    0 => 'andEntity',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'entity:a AND entity:b',
  ),
  245 => 
  array (
    0 => 'andNotEntity',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-entity:a AND -entity:b',
  ),
  246 => 
  array (
    0 => 'entity',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'entity:a entity:b',
  ),
  247 => 
  array (
    0 => 'notEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-entity:a -entity:b',
  ),
  248 => 
  array (
    0 => 'orEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'entity:a OR entity:b',
  ),
  249 => 
  array (
    0 => 'orNotEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-entity:a OR -entity:b',
  ),
  250 => 
  array (
    0 => 'andEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'entity:a AND entity:b',
  ),
  251 => 
  array (
    0 => 'andNotEntity',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-entity:a AND -entity:b',
  ),
  252 => 
  array (
    0 => 'conversationId',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'conversation_id:a',
  ),
  253 => 
  array (
    0 => 'notConversationId',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-conversation_id:a',
  ),
  254 => 
  array (
    0 => 'orConversationId',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR conversation_id:a',
  ),
  255 => 
  array (
    0 => 'orNotConversationId',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -conversation_id:a',
  ),
  256 => 
  array (
    0 => 'andConversationId',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND conversation_id:a',
  ),
  257 => 
  array (
    0 => 'andNotConversationId',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -conversation_id:a',
  ),
  258 => 
  array (
    0 => 'conversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'conversation_id:b',
  ),
  259 => 
  array (
    0 => 'notConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-conversation_id:b',
  ),
  260 => 
  array (
    0 => 'orConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR conversation_id:b',
  ),
  261 => 
  array (
    0 => 'orNotConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -conversation_id:b',
  ),
  262 => 
  array (
    0 => 'andConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND conversation_id:b',
  ),
  263 => 
  array (
    0 => 'andNotConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -conversation_id:b',
  ),
  264 => 
  array (
    0 => 'conversationId',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'conversation_id:a conversation_id:b',
  ),
  265 => 
  array (
    0 => 'notConversationId',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-conversation_id:a -conversation_id:b',
  ),
  266 => 
  array (
    0 => 'orConversationId',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'conversation_id:a OR conversation_id:b',
  ),
  267 => 
  array (
    0 => 'orNotConversationId',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-conversation_id:a OR -conversation_id:b',
  ),
  268 => 
  array (
    0 => 'andConversationId',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'conversation_id:a AND conversation_id:b',
  ),
  269 => 
  array (
    0 => 'andNotConversationId',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-conversation_id:a AND -conversation_id:b',
  ),
  270 => 
  array (
    0 => 'conversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'conversation_id:a conversation_id:b',
  ),
  271 => 
  array (
    0 => 'notConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-conversation_id:a -conversation_id:b',
  ),
  272 => 
  array (
    0 => 'orConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'conversation_id:a OR conversation_id:b',
  ),
  273 => 
  array (
    0 => 'orNotConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-conversation_id:a OR -conversation_id:b',
  ),
  274 => 
  array (
    0 => 'andConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'conversation_id:a AND conversation_id:b',
  ),
  275 => 
  array (
    0 => 'andNotConversationId',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-conversation_id:a AND -conversation_id:b',
  ),
  276 => 
  array (
    0 => 'bio',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'bio:a',
  ),
  277 => 
  array (
    0 => 'notBio',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-bio:a',
  ),
  278 => 
  array (
    0 => 'orBio',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR bio:a',
  ),
  279 => 
  array (
    0 => 'orNotBio',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -bio:a',
  ),
  280 => 
  array (
    0 => 'andBio',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND bio:a',
  ),
  281 => 
  array (
    0 => 'andNotBio',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -bio:a',
  ),
  282 => 
  array (
    0 => 'bio',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'bio:b',
  ),
  283 => 
  array (
    0 => 'notBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-bio:b',
  ),
  284 => 
  array (
    0 => 'orBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR bio:b',
  ),
  285 => 
  array (
    0 => 'orNotBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -bio:b',
  ),
  286 => 
  array (
    0 => 'andBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND bio:b',
  ),
  287 => 
  array (
    0 => 'andNotBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -bio:b',
  ),
  288 => 
  array (
    0 => 'bio',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio:a bio:b',
  ),
  289 => 
  array (
    0 => 'notBio',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio:a -bio:b',
  ),
  290 => 
  array (
    0 => 'orBio',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio:a OR bio:b',
  ),
  291 => 
  array (
    0 => 'orNotBio',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio:a OR -bio:b',
  ),
  292 => 
  array (
    0 => 'andBio',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio:a AND bio:b',
  ),
  293 => 
  array (
    0 => 'andNotBio',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio:a AND -bio:b',
  ),
  294 => 
  array (
    0 => 'bio',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio:a bio:b',
  ),
  295 => 
  array (
    0 => 'notBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio:a -bio:b',
  ),
  296 => 
  array (
    0 => 'orBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio:a OR bio:b',
  ),
  297 => 
  array (
    0 => 'orNotBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio:a OR -bio:b',
  ),
  298 => 
  array (
    0 => 'andBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio:a AND bio:b',
  ),
  299 => 
  array (
    0 => 'andNotBio',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio:a AND -bio:b',
  ),
  300 => 
  array (
    0 => 'bioName',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'bio_name:a',
  ),
  301 => 
  array (
    0 => 'notBioName',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-bio_name:a',
  ),
  302 => 
  array (
    0 => 'orBioName',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR bio_name:a',
  ),
  303 => 
  array (
    0 => 'orNotBioName',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -bio_name:a',
  ),
  304 => 
  array (
    0 => 'andBioName',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND bio_name:a',
  ),
  305 => 
  array (
    0 => 'andNotBioName',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -bio_name:a',
  ),
  306 => 
  array (
    0 => 'bioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'bio_name:b',
  ),
  307 => 
  array (
    0 => 'notBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-bio_name:b',
  ),
  308 => 
  array (
    0 => 'orBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR bio_name:b',
  ),
  309 => 
  array (
    0 => 'orNotBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -bio_name:b',
  ),
  310 => 
  array (
    0 => 'andBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND bio_name:b',
  ),
  311 => 
  array (
    0 => 'andNotBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -bio_name:b',
  ),
  312 => 
  array (
    0 => 'bioName',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio_name:a bio_name:b',
  ),
  313 => 
  array (
    0 => 'notBioName',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio_name:a -bio_name:b',
  ),
  314 => 
  array (
    0 => 'orBioName',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio_name:a OR bio_name:b',
  ),
  315 => 
  array (
    0 => 'orNotBioName',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio_name:a OR -bio_name:b',
  ),
  316 => 
  array (
    0 => 'andBioName',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio_name:a AND bio_name:b',
  ),
  317 => 
  array (
    0 => 'andNotBioName',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio_name:a AND -bio_name:b',
  ),
  318 => 
  array (
    0 => 'bioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio_name:a bio_name:b',
  ),
  319 => 
  array (
    0 => 'notBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio_name:a -bio_name:b',
  ),
  320 => 
  array (
    0 => 'orBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio_name:a OR bio_name:b',
  ),
  321 => 
  array (
    0 => 'orNotBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio_name:a OR -bio_name:b',
  ),
  322 => 
  array (
    0 => 'andBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio_name:a AND bio_name:b',
  ),
  323 => 
  array (
    0 => 'andNotBioName',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio_name:a AND -bio_name:b',
  ),
  324 => 
  array (
    0 => 'bioLocation',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'bio_location:a',
  ),
  325 => 
  array (
    0 => 'notBioLocation',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-bio_location:a',
  ),
  326 => 
  array (
    0 => 'orBioLocation',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR bio_location:a',
  ),
  327 => 
  array (
    0 => 'orNotBioLocation',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -bio_location:a',
  ),
  328 => 
  array (
    0 => 'andBioLocation',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND bio_location:a',
  ),
  329 => 
  array (
    0 => 'andNotBioLocation',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -bio_location:a',
  ),
  330 => 
  array (
    0 => 'bioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'bio_location:b',
  ),
  331 => 
  array (
    0 => 'notBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-bio_location:b',
  ),
  332 => 
  array (
    0 => 'orBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR bio_location:b',
  ),
  333 => 
  array (
    0 => 'orNotBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -bio_location:b',
  ),
  334 => 
  array (
    0 => 'andBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND bio_location:b',
  ),
  335 => 
  array (
    0 => 'andNotBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -bio_location:b',
  ),
  336 => 
  array (
    0 => 'bioLocation',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio_location:a bio_location:b',
  ),
  337 => 
  array (
    0 => 'notBioLocation',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio_location:a -bio_location:b',
  ),
  338 => 
  array (
    0 => 'orBioLocation',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio_location:a OR bio_location:b',
  ),
  339 => 
  array (
    0 => 'orNotBioLocation',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio_location:a OR -bio_location:b',
  ),
  340 => 
  array (
    0 => 'andBioLocation',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'bio_location:a AND bio_location:b',
  ),
  341 => 
  array (
    0 => 'andNotBioLocation',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-bio_location:a AND -bio_location:b',
  ),
  342 => 
  array (
    0 => 'bioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio_location:a bio_location:b',
  ),
  343 => 
  array (
    0 => 'notBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio_location:a -bio_location:b',
  ),
  344 => 
  array (
    0 => 'orBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio_location:a OR bio_location:b',
  ),
  345 => 
  array (
    0 => 'orNotBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio_location:a OR -bio_location:b',
  ),
  346 => 
  array (
    0 => 'andBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'bio_location:a AND bio_location:b',
  ),
  347 => 
  array (
    0 => 'andNotBioLocation',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-bio_location:a AND -bio_location:b',
  ),
  348 => 
  array (
    0 => 'place',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'place:a',
  ),
  349 => 
  array (
    0 => 'notPlace',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-place:a',
  ),
  350 => 
  array (
    0 => 'orPlace',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR place:a',
  ),
  351 => 
  array (
    0 => 'orNotPlace',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -place:a',
  ),
  352 => 
  array (
    0 => 'andPlace',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND place:a',
  ),
  353 => 
  array (
    0 => 'andNotPlace',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -place:a',
  ),
  354 => 
  array (
    0 => 'place',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'place:b',
  ),
  355 => 
  array (
    0 => 'notPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-place:b',
  ),
  356 => 
  array (
    0 => 'orPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR place:b',
  ),
  357 => 
  array (
    0 => 'orNotPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -place:b',
  ),
  358 => 
  array (
    0 => 'andPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND place:b',
  ),
  359 => 
  array (
    0 => 'andNotPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -place:b',
  ),
  360 => 
  array (
    0 => 'place',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'place:a place:b',
  ),
  361 => 
  array (
    0 => 'notPlace',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-place:a -place:b',
  ),
  362 => 
  array (
    0 => 'orPlace',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'place:a OR place:b',
  ),
  363 => 
  array (
    0 => 'orNotPlace',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-place:a OR -place:b',
  ),
  364 => 
  array (
    0 => 'andPlace',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'place:a AND place:b',
  ),
  365 => 
  array (
    0 => 'andNotPlace',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-place:a AND -place:b',
  ),
  366 => 
  array (
    0 => 'place',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'place:a place:b',
  ),
  367 => 
  array (
    0 => 'notPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-place:a -place:b',
  ),
  368 => 
  array (
    0 => 'orPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'place:a OR place:b',
  ),
  369 => 
  array (
    0 => 'orNotPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-place:a OR -place:b',
  ),
  370 => 
  array (
    0 => 'andPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'place:a AND place:b',
  ),
  371 => 
  array (
    0 => 'andNotPlace',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-place:a AND -place:b',
  ),
  372 => 
  array (
    0 => 'placeCountry',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'place_country:a',
  ),
  373 => 
  array (
    0 => 'notPlaceCountry',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-place_country:a',
  ),
  374 => 
  array (
    0 => 'orPlaceCountry',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR place_country:a',
  ),
  375 => 
  array (
    0 => 'orNotPlaceCountry',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -place_country:a',
  ),
  376 => 
  array (
    0 => 'andPlaceCountry',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND place_country:a',
  ),
  377 => 
  array (
    0 => 'andNotPlaceCountry',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -place_country:a',
  ),
  378 => 
  array (
    0 => 'placeCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'place_country:b',
  ),
  379 => 
  array (
    0 => 'notPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-place_country:b',
  ),
  380 => 
  array (
    0 => 'orPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR place_country:b',
  ),
  381 => 
  array (
    0 => 'orNotPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -place_country:b',
  ),
  382 => 
  array (
    0 => 'andPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND place_country:b',
  ),
  383 => 
  array (
    0 => 'andNotPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -place_country:b',
  ),
  384 => 
  array (
    0 => 'placeCountry',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'place_country:a place_country:b',
  ),
  385 => 
  array (
    0 => 'notPlaceCountry',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-place_country:a -place_country:b',
  ),
  386 => 
  array (
    0 => 'orPlaceCountry',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'place_country:a OR place_country:b',
  ),
  387 => 
  array (
    0 => 'orNotPlaceCountry',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-place_country:a OR -place_country:b',
  ),
  388 => 
  array (
    0 => 'andPlaceCountry',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'place_country:a AND place_country:b',
  ),
  389 => 
  array (
    0 => 'andNotPlaceCountry',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-place_country:a AND -place_country:b',
  ),
  390 => 
  array (
    0 => 'placeCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'place_country:a place_country:b',
  ),
  391 => 
  array (
    0 => 'notPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-place_country:a -place_country:b',
  ),
  392 => 
  array (
    0 => 'orPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'place_country:a OR place_country:b',
  ),
  393 => 
  array (
    0 => 'orNotPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-place_country:a OR -place_country:b',
  ),
  394 => 
  array (
    0 => 'andPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'place_country:a AND place_country:b',
  ),
  395 => 
  array (
    0 => 'andNotPlaceCountry',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-place_country:a AND -place_country:b',
  ),
  396 => 
  array (
    0 => 'lang',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'lang:a',
  ),
  397 => 
  array (
    0 => 'notLang',
    1 => 
    array (
      0 => 'a',
    ),
    2 => '-lang:a',
  ),
  398 => 
  array (
    0 => 'orLang',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR lang:a',
  ),
  399 => 
  array (
    0 => 'orNotLang',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'OR -lang:a',
  ),
  400 => 
  array (
    0 => 'andLang',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND lang:a',
  ),
  401 => 
  array (
    0 => 'andNotLang',
    1 => 
    array (
      0 => 'a',
    ),
    2 => 'AND -lang:a',
  ),
  402 => 
  array (
    0 => 'lang',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'lang:b',
  ),
  403 => 
  array (
    0 => 'notLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => '-lang:b',
  ),
  404 => 
  array (
    0 => 'orLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR lang:b',
  ),
  405 => 
  array (
    0 => 'orNotLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'OR -lang:b',
  ),
  406 => 
  array (
    0 => 'andLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND lang:b',
  ),
  407 => 
  array (
    0 => 'andNotLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'b',
      ),
    ),
    2 => 'AND -lang:b',
  ),
  408 => 
  array (
    0 => 'lang',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'lang:a lang:b',
  ),
  409 => 
  array (
    0 => 'notLang',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-lang:a -lang:b',
  ),
  410 => 
  array (
    0 => 'orLang',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'lang:a OR lang:b',
  ),
  411 => 
  array (
    0 => 'orNotLang',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-lang:a OR -lang:b',
  ),
  412 => 
  array (
    0 => 'andLang',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => 'lang:a AND lang:b',
  ),
  413 => 
  array (
    0 => 'andNotLang',
    1 => 
    array (
      0 => 'a',
      1 => 'b',
    ),
    2 => '-lang:a AND -lang:b',
  ),
  414 => 
  array (
    0 => 'lang',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'lang:a lang:b',
  ),
  415 => 
  array (
    0 => 'notLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-lang:a -lang:b',
  ),
  416 => 
  array (
    0 => 'orLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'lang:a OR lang:b',
  ),
  417 => 
  array (
    0 => 'orNotLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-lang:a OR -lang:b',
  ),
  418 => 
  array (
    0 => 'andLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => 'lang:a AND lang:b',
  ),
  419 => 
  array (
    0 => 'andNotLang',
    1 => 
    array (
      0 => 
      array (
        0 => 'a',
        1 => 'b',
      ),
    ),
    2 => '-lang:a AND -lang:b',
  ),
));
