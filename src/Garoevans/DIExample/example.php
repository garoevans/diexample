<?php
/**
 * @author gareth.evans
 */
namespace Garoevans\DIExample;

use Garoevans\DIExample\Enums\BaseDIServiceEnum;
use Garoevans\DIExample\Enums\ExtendedDIServiceEnum;
use Garoevans\DIExample\Enums\MailerServiceEnum;
use Garoevans\DIExample\Interfaces\IMailer;

// Auto Loader
require_once dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

// Just for funzzies
function sendMail(IMailer $mailer) {
  $mailer->send();
}

$container = new DIContainer();

// Bind the default mailer
$container->bind(BaseDIServiceEnum::MAILER());
echo $container->bound(BaseDIServiceEnum::MAILER()) ? "\nBound" : "\nNot Bound";
sendMail($container->make(BaseDIServiceEnum::MAILER()));

// Bind from a concrete class
$container->bind(
  BaseDIServiceEnum::MAILER(),
  '\\Garoevans\\DIExample\\Mailers\\ConcreteMailer'
);
sendMail($container->make(BaseDIServiceEnum::MAILER()));

// Bind from an extended Enum
$container->bind(ExtendedDIServiceEnum::MAILER());
sendMail($container->make(ExtendedDIServiceEnum::MAILER()));

// Bind from a single Enum
$container->bind(new MailerServiceEnum());
sendMail($container->make(new MailerServiceEnum()));
