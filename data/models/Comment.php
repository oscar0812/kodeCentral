<?php

use Base\Comment as BaseComment;

/**
 * Skeleton subclass for representing a row from the 'comment' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Comment extends BaseComment
{
    public function setText($text)
    {
        if ($text == '') {
            $text = null;
        }
        parent::setText($text);
    }

    public function getSummary($max_length = 30)
    {

        $text = substr($this->getText(), 0, $max_length);
        if (strlen($text) == $max_length) {
            return $text.'...';
        }
        return $text;
    }
}
