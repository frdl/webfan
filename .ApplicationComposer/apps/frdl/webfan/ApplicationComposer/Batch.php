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
 
class Batch  extends \frdl\Crud {
		
		   const VERSION = '0.0.3';
		   const ALIAS = 'Batch';
		   
			# Your Table name 
			protected $table = 'batches';
			
			# Primary Key of the Table
			protected $pk	 = 'uuid';
			

	
				
			public function shema(){
				return array(
				  'version' => self::VERSION,
				  'schema' => "(
  `pid` int(11) NOT NULL,
  `pos` int(11) NOT NULL DEFAULT '0',
  `errors` int(11) NOT NULL DEFAULT '0',
  `time` int(11) NOT NULL DEFAULT '0',
  `time_scheduled` int(11) NOT NULL DEFAULT '0',
  `time_interval` int(11) NOT NULL DEFAULT '0',
  `time_complete` int(11) NOT NULL DEFAULT '0',
  `time_start` int(11) NOT NULL DEFAULT '0',
  `time_expires` int(11) NOT NULL DEFAULT '0',
  `uuid` varchar(64) NOT NULL,
  `group_uuid` varchar(64) NOT NULL,
  `batch_uuid` varchar(64) NOT NULL,
  `previous_uuid` varchar(64) NOT NULL,
  `next_uuid` varchar(64) NOT NULL,
  `comment` varchar(128) NOT NULL,
  `out` varchar(128) NOT NULL,
  `file` varchar(1024) NOT NULL,
  `logfile` varchar(1024) NOT NULL,
  PRIMARY KEY (`uuid`),
  KEY `time_scheduled` (`time_scheduled`),
  KEY `time_complete` (`time_complete`),
  KEY `group_uuid` (`group_uuid`),
  KEY `batch_uuid` (`batch_uuid`),
  KEY `batch_uuid2` (`batch_uuid`, `pos`)
				     ) ENGINE=InnoDB DEFAULT CHARSET=latin1; ",
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
			
	
			
	}