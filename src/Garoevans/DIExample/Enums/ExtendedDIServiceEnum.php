<?php
/**
 * @author gareth.evans
 */

namespace Garoevans\DIExample\Enums;

class ExtendedDIServiceEnum extends BaseDIServiceEnum
{
  public function getConcrete()
  {
    switch($this->__toString())
    {
      case self::MAILER:
        return '\\Garoevans\\DIExample\\Mailers\\ExtendedMailer';
      default:
        return parent::getConcrete();
    }
  }
}
