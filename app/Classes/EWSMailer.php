<?php namespace App\Classes;

use PhpEws\EwsConnection;
use PhpEws\DataType\MessageType;
use PhpEws\DataType\EmailAddressType;
use PhpEws\DataType\BodyType;
use PhpEws\DataType\SingleRecipientType;
use PhpEws\DataType\CreateItemType;
use PhpEws\DataType\NonEmptyArrayOfAllItemsType;
use PhpEws\DataType\ItemType;

class EWSMailer {
	public $Subject = '';
	public $Body = '';
	public $Recipients = array();
	public $response;

	public function send(){
		$server = "isa.ncr.com";
		$username = "vl185028";
		$password = "Mypassword3";

		$ews = new EwsConnection($server, $username, $password);

		$msg = new MessageType();

		$toAddresses = array();
		foreach($this->Recipients as $key => $value){
			$toAddresses[$key] = new EmailAddressType();
			$toAddresses[$key]->EmailAddress = $value;
		}

		$msg->ToRecipients = $toAddresses;
		
		$fromAddress = new EmailAddressType();
		$fromAddress->EmailAddress = 'vincent.lomocso@ncr.com';

		$msg->From = new SingleRecipientType();
		$msg->From->Mailbox = $fromAddress;
		
		$msg->Subject = $this->Subject;
		
		$msg->Body = new BodyType();
		$msg->Body->BodyType = 'HTML';
		$msg->Body->_ = $this->Body;
		
		$msgRequest = new CreateItemType();
		$msgRequest->Items = new NonEmptyArrayOfAllItemsType();
		$msgRequest->Items->Message = $msg;
		$msgRequest->MessageDisposition = 'SendAndSaveCopy';
		$msgRequest->MessageDispositionSpecified = true;
				
		$response = $ews->CreateItem($msgRequest);
		$this->response = $response;
		if( $response->ResponseMessages->CreateItemResponseMessage->ResponseClass == 'Success' &&
			$response->ResponseMessages->CreateItemResponseMessage->ResponseCode == 'NoError' )
			return true;
		else
			return false;
	}
}

?>