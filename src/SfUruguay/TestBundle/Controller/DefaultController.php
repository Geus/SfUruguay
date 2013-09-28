<?php

namespace SfUruguay\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use SfUruguay\TestBundle\Entity\User;

class DefaultController extends Controller
{

	/**
	* @Route("/")
	* @Template
	*/
	public function indexAction()
	{
		//return new Response('Hello World!');
		$user = new User();
		$user->setName('Guillermo Bergengruen')
			->setEmail('gbergengruen@gmail.com')
			->setBirthday(new \DateTime('1986-05-27'));
		return array('user' => $user);
	}

	/**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }
}
