<?php
Helix::load("external/SwiftMailer/lib/swift_required.php");
class Mail extends Object {
	protected $mailer;
	
	public static function testSwiftMailer($to){
		global $config;
		$message = Swift_Message::newInstance();
		$message->setSubject("Test Subject");
		$message->setFrom(array($config["smtp_from"]=>$config["smtp_from"]));
		$message->setTo(array($to=>"First Last"));
		$message->setBody("This is a test message using SwiftMailer from inside the Mail class in the new test of the Helix Framework...");
		
		$transport = Swift_SmtpTransport::newInstance($config["smtp_host"],$config["smtp_port"],"ssl")->setUsername($config["smtp_user"])->setPassword($config["smtp_password"]);
		
		$mailer = Swift_Mailer::newInstance($transport);
		$mailer->send($message);
	}

	public function __construct($__to=null, $__subject=null, $__message=null, $__from=null, $__cc=null, $__bcc=null)
	{
		$this->mailer = Swift_Message::newInstance();
		$this->setSubject($__subject);
		$this->setMessage($__message);
		$this->setFrom($__from);
		$this->setTo($__to);
	}

	public function attach($__path, $__disposition="attachment", $__name=null)
	{
		$this->mailer->attach(Swift_Attachment::fromPath($__path));
	}

	public function send()
	{
		global $config;
		
		$transport = Swift_SmtpTransport::newInstance($config["smtp_host"],$config["smtp_port"],"ssl")->setUsername($config["smtp_user"])->setPassword($config["smtp_password"]);
		$mailer = Swift_Mailer::newInstance($transport);
		$mailer->send($this->mailer);
	}

	public function get_message()
	{
		return $this->mailer->message;
	}

	public function get_mailer()
	{
		return $this->_mailer;
	}
	
	private function name($__address)
	{
		if (stristr($__address,"<"))
		{
			return trim(substr($__address,0,strpos($__address,"<")));
		}
		else
		{
			return null;
		}
	}

	private function address($__address)
	{
		if (stristr($__address,"<"))
		{
			return trim(substr($__address,strpos($__address,"<")+1,strpos($__address,">")-strpos($__address,"<")-1));
		}
		else
		{
			return $__address;
		}
	}
	
	public function setTo($emails) {
		$this->mailer->setTo($emails);
	}
	

	public function setFrom($from)
	{
		$this->mailer->setFrom(array($this->address($from) => $this->name($from)));
		$this->replyTo = $this->address($from);
	}
	public function getFrom()
	{
		return $this->mailer->getHeaders()->get('from')->toString();
	}

	public function setSubject($__v)
	{
		$this->mailer->setSubject($__v);
	}
	public function getSubject()
	{
		return $this->mailer->getHeaders()->get('subject')->toString();
	}

	public function setMessage($__v)
	{
		$this->_message = $__v;
		
		//Add the body
		$this->mailer->setBody($__v, 'text/html');

		//Add alternative parts
		$this->mailer->addPart($__v, 'text/plain');
	}
	
	public function setReplyTo($__v)
	{
		//Reply to takes an email address only, no name
		$this->mailer->setReturnPath($__v);
	}
}
?>
