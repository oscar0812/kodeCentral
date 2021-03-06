<?php

use Base\Library as BaseLibrary;

/**
 * Skeleton subclass for representing a row from the 'library' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Library extends BaseLibrary
{
    public function setName($text)
    {
        if ($text == '') {
            $text = null;
        }
        parent::setName($text);
    }
}
