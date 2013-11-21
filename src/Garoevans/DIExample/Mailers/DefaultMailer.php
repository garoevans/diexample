<?php
/**
 * @author gareth.evans
 */

namespace Garoevans\DIExample\Mailers;

use Garoevans\DIExample\Interfaces\IMailer;

class DefaultMailer implements IMailer
{
  public function send()
  {
    printf("\nSending from: %s", get_called_class());
  }
}
