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
 *  @role       example/test
 * 
 *  @cmd "frdl test -b -d"
 * 
 */
namespace frdl\ApplicationComposer\Command;

class utest extends CMD
{


    
    
    public function process()
    {
       $args = func_get_args();
       $this->result->out = 'test';
       $this->result->args = $this->argtoks;   
       
           if(!isset($this->aSess['isAdmin']) || true !== $this->aSess['isAdmin'] ){
                $this->result->out = 'set config ERROR: You are not logged in as Admin';
  	
	     	 return;
		  }     
       
       
         if(isset($this->argtoks['arguments'][0]) && intval($this->argtoks['arguments'][0]['pos']) === 1){
         	$test = $this->argtoks['arguments'][0]['cmd'];
         	$method = '_test_'.$test;
         	if(is_callable(array($this,$method))){
				return call_user_func_array(array($this,$method), func_get_args());
			}
         }   
         
        $this->result->out = 'No given testcase or unit! Usage: frdl test [unit]';
    }
    
     protected function _test_tables(){
     	
		if(true!== $this->loadConfigFromFile(true)){
                $this->result->out = 'config ERROR: cannot readf config file';
        	 return;			
		}	
		
		ini_set('display_errors', 0);
		error_reporting(E_ALL);
		
		try{

		 $_s = new \frdl\o;
		 $tables = array();
		 $S = new \frdl\ApplicationComposer\DBSchema();
		$db =  \frdl\DB::_(array(
		   'driver' => $this->data['config']['db-driver'],
		   'host' => $this->data['config']['db-host'],
		   'dbname' => $this->data['config']['db-dbname'],
		   'user' => $this->data['config']['db-user'],
		   'password' => $this->data['config']['db-pwd'],
		   'pfx' => $this->data['config']['db-pfx'],
		   
		), true);		
			
		  /*$S->check($_s, $tables,  null,  false,  false,  false,  $db, array(
		   'driver' => $this->data['config']['db-driver'],
		   'host' => $this->data['config']['db-host'],
		   'dbname' => $this->data['config']['db-dbname'],
		   'user' => $this->data['config']['db-user'],
		   'password' => $this->data['config']['db-pwd'],
		   'pfx' => $this->data['config']['db-pfx'],
		   
		));
			 $this->result->data = new \frdl\o;
	     $this->result->data->schema = $_s;
	     $this->result->data->tables = $tables;
	     */
		}catch(\Exception $e){
			die($e->getMessage());
			$this->result->out = $e->getMessage();
			return $this->result;
		}


		 $this->result->code = 200;
		 $this->result->out = 'Ok';
		 
	}
	
	   
    protected function _test_database(){
		if(true!== $this->loadConfigFromFile(true)){
                $this->result->out = 'set config ERROR: cannot readf config file';
        	 return;			
		}
		ini_set('display_errors', 0);
		error_reporting(E_ALL);

		try{
		
		
		$db =  \frdl\DB::_(array(
		   'driver' => $this->data['config']['db-driver'],
		   'host' => $this->data['config']['db-host'],
		   'dbname' => $this->data['config']['db-dbname'],
		   'user' => $this->data['config']['db-user'],
		   'password' => $this->data['config']['db-pwd'],
		   'pfx' => $this->data['config']['db-pfx'],
		   
		), true);			
		}catch(\Exception $e){
			die($e->getMessage());
			$this->result->out = $e->getMessage();
			return;
		}

		 $this->result->code = 200;
		 $this->result->out = 'Ok';
	}
    
    public function required()
    {
       $args = func_get_args();
    }
}