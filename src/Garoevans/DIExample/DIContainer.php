<?php
/**
 * @author gareth.evans
 */

namespace Garoevans\DIExample;

use Garoevans\DIExample\Interfaces\IDIServicesEnum;
use Illuminate\Container\Container;

class DIContainer
{
  private $_container;

  /**
   * We can do something a bit nicer than this, but for the sake of an example
   * I just wanted to use the container we spoke about.
   */
  public function __construct()
  {
    $this->_container = new Container();
  }

  /**
   * @param IDIServicesEnum $serviceEnum
   * @param null            $concrete
   * @param bool            $shared
   */
  public function bind(
    IDIServicesEnum $serviceEnum,
    $concrete = null,
    $shared = false
  )
  {
    $concrete = $concrete ? : $serviceEnum->getConcrete();

    $this->_container->bind($serviceEnum->getAbstract(), $concrete, $shared);
  }

  /**
   * @param IDIServicesEnum $serviceEnum
   *
   * @return bool
   */
  public function bound(IDIServicesEnum $serviceEnum)
  {
    return $this->_container->bound($serviceEnum->getAbstract());
  }

  /**
   * @param IDIServicesEnum $serviceEnum
   * @param array           $parameters
   *
   * @return mixed
   */
  public function make(IDIServicesEnum $serviceEnum, $parameters = array())
  {
    return $this->_container->make($serviceEnum->getAbstract(), $parameters);
  }
}
