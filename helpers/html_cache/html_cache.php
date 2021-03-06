<?php
/*
 * HTML Cache CakePHP Helper
 * Copyright (c) 2008 Matt Curry
 * www.PseudoCoder.com
 * http://github.com/mcurry/cakephp/tree/master/helpers/html_cache
 * http://www.pseudocoder.com/archives/2008/09/03/cakephp-html-cache-helper/
 *
 * @author      mattc <matt@pseudocoder.com>
 * @license     MIT
 *
 */

class HtmlCacheHelper extends Helper {
  function afterLayout() {
    if(Configure::read('debug') > 0) {
      return;
    }
    
    $view =& ClassRegistry::getObject('view');
    $path = WWW_ROOT . 'cache' . DS
            . implode(DS, array_filter(explode('/', $this->here)))
            . DS . 'index.html';

    $file = new File($path, true);
    $file->write($view->output);
  }
}
?>