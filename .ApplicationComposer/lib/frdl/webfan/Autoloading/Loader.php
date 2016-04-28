<?php
/**
 * 
 * Copyright  (c) 2015, Till Wehowski
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 * 1. Redistributions of source code must retain the above copyright
 *    notice, this list of conditions and the following disclaimer.
 * 2. Redistributions in binary form must reproduce the above copyright
 *    notice, this list of conditions and the following disclaimer in the
 *    documentation and/or other materials provided with the distribution.
 * 3. All advertising materials mentioning features or use of this software
 *    must display the following acknowledgement:
 *    This product includes software developed by the frdl/webfan.
 * 4. Neither the name of frdl/webfan nor the
 *    names of its contributors may be used to endorse or promote products
 *    derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY frdl/webfan ''AS IS'' AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL frdl/webfan BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
namespace frdl\webfan\Autoloading;
 
abstract class Loader
{
     abstract function  autoload_register  ();
     abstract function  addLoader  ( $Autoloader ,  $throw  =  true ,  $prepend  =  true );
     abstract function  unregister  ( $Autoloader );
     abstract function  addPsr0  ( $prefix ,  $base_dir ,  $prepend  =  true );
     abstract function  addNamespace  ( $prefix ,  $base_dir ,  $prepend  =  true );
     abstract function  addPsr4  ( $prefix ,  $base_dir ,  $prepend  =  true ) ;
     abstract function  Psr4  ( $class ) ;
     abstract function  loadClass  ( $class );
     abstract function  Psr0  ( $class ) ;
     abstract function  routeLoadersPsr0  ( $prefix ,  $relative_class ) ;
     abstract function  setAutloadDirectory  ( $dir ) ;
     abstract function  routeLoaders  ( $prefix ,  $relative_class );
     abstract protected function  inc  ( $file );
     abstract function  classMapping  ( $class ) ;
     abstract function  class_mapping_add  ( $class ,  $file , & $success  =  null );
     abstract function  class_mapping_remove  ( $class ) ;
     abstract function  autoloadClassFromServer  ( $className ) ;
    
   
}