<?php
/**
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
 * 3. Neither the name of frdl/webfan nor the
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
 */
namespace frdl\ApplicationComposer;
 
class SInterface  extends \frdl\Crud {
		
		   const VERSION = '0.0.1';
		   const ALIAS = 'APIInterfaces';
		   
			# Your Table name 
			protected $table = 's_interfaces';
			
			# Primary Key of the Table
			protected $pk	 = 'id';
			

	
				
			public function shema(){
				return array(
				  'version' => self::VERSION,
				  'schema' => "(
				      `id` BIGINT(255) NOT NULL ,
				      `isInstallFinish` TINYINT(1) NOT NULL DEFAULT '0',
				      `id_host` BIGINT(255) NOT NULL,
				      `wid_host` BIGINT(255) NOT NULL,
				      `id_CERT`  BIGINT(255) NOT NULL DEFAULT '0', 
				      `time_expires` INT(11) NOT NULL DEFAULT '0', 
				      `REGISTRIERUNGSSCHLUESSEL`  varchar(128) COLLATE utf8_unicode_ci NOT NULL,
				      `registrationMethod` varchar(64) NOT NULL ,
				      `rp_nummer` varchar(128) NOT NULL ,
				      `API_KEY` BLOB,
				      `API_SECRET` BLOB,
				       PRIMARY KEY (`id`)
				     )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
				);
			}
			

	        public function field($label = null){
				$l = array(


				);
				if(null === $label){
					return $l;
				}
				
				return (isset($l[$label])) ? $l[$label] : null;
			}
			
			/*
	        public function label($field  = null){
				$f = array_flip($this->field(null));
				return (isset($f[$field])) ? $f[$field] : null;
			}
			*/
}