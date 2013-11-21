<?php
/**
 * @author gareth.evans
 */

namespace Garoevans\DIExample\Enums;

use Garoevans\DIExample\Interfaces\IDIServicesEnum;
use Garoevans\PhpEnum\Enum;

class MailerServiceEnum extends Enum implements IDIServicesEnum
{
  const __default = self::MAILER;

  const MAILER = 'mailer';

  public function getConcrete()
  {
    return '\\Garoevans\\DIExample\\Mailers\\LoneMailer';
  }

  public function getAbstract()
  {
    return '\\Garoevans\\DIExample\\Interfaces\\IMailer';
  }
}
