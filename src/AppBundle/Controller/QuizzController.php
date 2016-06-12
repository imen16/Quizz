<?php
namespace AppBundle\Controller;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Dunglas\ApiBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;

class QuizzController extends ResourceController{
    
    public function quizzAction(Request $request){
       
        $difficulte = $request->get('difficulte');
        $em = $this->getDoctrine()->getManager();
        $quizz = $em->getRepository('AppBundle:Quizz')->findOneBy(array('difficulte' => $difficulte) );
        return $this->getSuccessResponse(
                $this->get('resource.quizz'),
                $quizz,
                200,
                array(), 
                array()
            );
    }
    
    public function registerAction(Request $request){
        return $this->cpostAction($request);
    }
    
    
}