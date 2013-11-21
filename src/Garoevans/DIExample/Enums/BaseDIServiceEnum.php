<?php
/**
 * @author gareth.evans
 */

namespace Garoevans\DIExample\Enums;

use Garoevans\DIExample\Interfaces\IDIServicesEnum;
use Garoevans\PhpEnum\Enum;

/**
 * Class BaseDIServiceEnum
 * @package Garoevans\DIExample\Enums
 *
 * @method static MAILER
 * @method static SESSION
 */
class BaseDIServiceEnum extends Enum implements IDIServicesEnum
{
  const __default = '';

  const MAILER = 'mailer';
  const SESSION = 'session';

  public function getConcrete()
  {
    switch($this->__toString())
    {
      case self::MAILER:
        return '\\Garoevans\\DIExample\\Mailers\\DefaultMailer';
      case self::SESSION:
        return 'session class';
      default:
        throw new \Exception('No Concrete Class Found.');
    }
  }

  public function getAbstract()
  {
    switch($this->__toString())
    {
      case self::MAILER:
        return '\\Garoevans\\DIExample\\Interfaces\\IMailer';
      case self::SESSION:
        return 'session interface';
      default:
        throw new \Exception('No Abstract Class Found.');
    }
  }
}
